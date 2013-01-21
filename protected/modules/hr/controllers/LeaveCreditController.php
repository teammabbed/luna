<?php

class LeaveCreditController extends Controller
{

	public $layout;

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('generate'),
				'roles'=>array('hradmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	public function actionGenerate(){
		$this->layout='/layouts/column1';
		$model = new LeaveCredit();

		if (isset($_POST['selectedItems'])) {
			set_time_limit(1000);
			$model->attributes=$_POST['LeaveCredit'];
			foreach($_POST['selectedItems'] as $deptCode):
				$employees=Employee::model()->findAll(array(
					'condition' => 'dept_code = :deptCode and isActive = :isActive',
                    'params' => array(':deptCode' => $deptCode, 'isActive' => 'Y'),
				));

				foreach($employees as $employee):
					if(!LeaveCredit::model()->find('emp_number=:emp_number and leave_year=:leave_year',array(':emp_number'=>$employee->emp_number,':leave_year'=>$model->leave_year))){
						$this->createLeaveCredits($employee->emp_number,$model->leave_year);
					}
				endforeach;



			endforeach;
		}

        $dataProvider = new CActiveDataProvider('Department', array(
	        'criteria' => array('order' => 'name'),
	        'pagination' => array(
	            'pageSize' => 50,
            ),
        ));

        $this->render('generate',array(
        	'model'=>$model,
        	'dataProvider'=>$dataProvider,
        ));
	}

	 public function createLeaveCredits($empNumber, $leave_year) {

        $model = new LeaveCredit;
        $model->leave_credit_id = uniqid();
        $model->emp_number = $empNumber;
        $model->leave_allocated_sl = 15;
        $model->leave_allocated_vl = 15;
        $model->leave_year = $leave_year;
        if ($model->save()) {
            
        } else {
            print_r($model->getErrors());
        }
    }

	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}


	public function loadModel($id)
	{
		$model=WorkExperience::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='work-experience-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
