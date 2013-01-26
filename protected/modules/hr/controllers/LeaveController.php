<?php

class LeaveController extends Controller
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
				'actions'=>array('create','update','admin','delete'),
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id)->with('employee','head10','head20');

		$leaveDetails = new CActiveDataProvider('LeaveDetail',array(
			'criteria'=>array(
				'condition' => 'leave_id = :leave_id',
				'params'	=> array(':leave_id' => $model->leave_id),
			),
		));

		$this->render('view',array(
			'model'			=>	$model,
			'leaveDetails'	=>	$leaveDetails,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Leave;

		$data = Yii::app()->request->getPost('Leave');
		if ($data)
		{
			$model->setAttributes($data);
			$model->leave_id = uniqid('LVE');
			$model->status = 'AP';
			if ($model->validate())
			{
				/* Get employee's leave credits */
				$leaveCredit = LeaveCredit::model()->findByAttributes(array('emp_number'=>$model->emp_number,'leave_year'=>$model->leave_year));
				if (!empty($leaveCredit))
				{
					if ($model->save())
					{
						if ($model->datesList)
						{
							$filedDates = $model->datesList;
							/* save all dates filed */
							foreach ($filedDates as $key) 
							{
								$leaveDetail = new leaveDetail;
								$details = explode('/', $key);

								$leaveDetail->detail_id = uniqid('LVD');
								$leaveDetail->leave_id = $model->getPrimaryKey();
								$leaveDetail->leave_dates = $details[0];
								$leaveDetail->leave_duration = $details[1];
								$leaveDetail->leave_credit = ($details[1] == 'wd') ? 1 : 0.5;

								$leaveDetail->save();
							}
						}

						/* selects leave type to be updated */
						switch ($model->leave_type) {
							case 'sl':
								$leaveCredit->leave_used_sl += $model->leave_days;
								break;
							case 'vl':
								$leaveCredit->leave_used_vl += $model->leave_days;
								break;
							default:
								$leaveCredit->leave_used_others += $model->leave_days;
								break;
						}
						/* updates the credit of the chosen leave type */
						$leaveCredit->save();

						Yii::app()->user->setFlash('success', 'Leave successfully added. You may view it <a href="index.php?r=hr/leave/view&id='.$model->getPrimaryKey().'">here</a>');
						$model->unsetAttributes();
						unset($model->datesList);
					}
				}
				else
				{
					Yii::app()->user->setFlash('error', 'Unable to find generated leave credits for the specified model.');
				}
			}
			else
			{
				Yii::app()->user->setFlash('error', 'Please fill up the form correctly.');
			}
		}

		$approveTypes = $model->getApproveTypes();
		$leaveTypes = $model->getTypes();
		
		$this->render('create',array(
			'approveTypes'	=>	$approveTypes,
			'model'			=>	$model,
			'leaveTypes'	=>	$leaveTypes,
		));
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
			// get leave and credit model by 
			$leave = $this->loadModel($id);
			$credit = LeaveCredit::model()->findByAttributes(array('emp_number'=>$leave->emp_number,'leave_year'=>$leave->leave_year));
	
			/* selects leave type to be updated */
			switch ($leave->leave_type) {
				case 'sl':
					$credit->leave_used_sl -= $leave->leave_days;
					break;
				case 'vl':
					$credit->leave_used_vl -= $leave->leave_days;
					break;
				default:
					$credit->leave_used_others -= $leave->leave_days;
					break;
			}
			/* updates the credit of the chosen leave type */
			$credit->save();
			// only POST request is allowed on deletion
			$leave->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Leave('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Leave']))
			$model->attributes=$_GET['Leave'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Leave::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='leave-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
