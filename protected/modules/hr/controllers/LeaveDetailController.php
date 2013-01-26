<?php

class LeaveDetailController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			$leaveDetail = $this->loadModel($id);
			$leave = Leave::model()->findByPk($leaveDetail->leave_id,array('select'=>array('emp_number,leave_type,leave_days,leave_year')));
			$credit = LeaveCredit::model()->findByAttributes(array('emp_number'=>$leave->emp_number,'leave_year'=>$leave->leave_year));
			
			$leave->leave_days -= $leaveDetail->leave_credit;

			/* bad trip! ayaw gumana neto for update!! I don't understand, I have it all planned so perfectly!
			** $leave->save();
			*/

			/* for the meantime, i'll update Leave this way, even if i know there is a better way on doing this! crap! */
			$sqlString = 'UPDATE tbl_emp_leave SET leave_days='.$leave->leave_days.' WHERE leave_id="'.$leaveDetail->leave_id.'"';
			Yii::app()->db->createCommand($sqlString)->execute();

			switch ($leave->leave_type) {
				case 'sl':
					$credit->leave_used_sl -= $leaveDetail->leave_credit;
					break;
				case 'vl':
					$credit->leave_used_vl -= $leaveDetail->leave_credit;
					break;
				default:
					$credit->leave_used_others -= $leaveDetail->leave_credit;
					break;
			}

			$credit->save();
			$leaveDetail->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=LeaveDetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
