<?php

class EmployeeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout;
	public $emp_number;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create', 'contact', 'job', 'basicInfo','dependent','admin','delete'),
				'roles'=>array('hradmin'),
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->layout='/layouts/column1';
		$model=new Employee;

		if(isset($_POST['Employee']))
		{
			$model->attributes=$_POST['Employee'];
			$model->save();
		}

		$departments = Department::model()->findAll(
                array('order' => 'name'));
		$departmentList = CHtml::listData($departments, 'dept_code', 'name');
  
        $supervisorList = CHtml::listData(Employee::model()->getDeptHeads(), 'emp_number', 'fullname');

		$this->render('create/index',array(
			'model'				=>	$model,
			'departmentList'	=>	$departmentList,
			'supervisorList'	=>	$supervisorList,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionBasicInfo($id)
	{
		$this->layout='/layouts/profile';
		$model=$this->loadModel($id);
		$this->emp_number=$model->emp_number;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Employee']))
		{
			$model->attributes=$_POST['Employee'];
			if($model->save()){
				Controller::refresh();
			}
		}

		$this->render('personalInfo/index',array(
			'model'		=> $model,
		));
	}

	public function actionContact($id)
	{
		$this->layout='/layouts/profile';
		$model=$this->loadModel($id);		
		$this->emp_number=$model->emp_number;

		if(isset($_POST['Employee']))
		{
			$model->attributes=$_POST['Employee'];
			if($model->save()){
				Controller::refresh();
			}
		}

		$provinces=CHtml::listData(Province::model()->findAll(), 'province_code', 'name');
		$towns=CHtml::listData(Town::model()->findAll(), 'town_code', 'name');

		$this->render('contactDetails/index',array(
			'model'		=> $model,
			'provinces'	=> $provinces,
			'towns'		=> $towns,
		));
	}

	public function actionJob($id)
	{
		$this->layout='/layouts/profile';
		$model=$this->loadModel($id);
		$this->emp_number=$model->emp_number;

		if(isset($_POST['Employee']))
		{
			$model->attributes=$_POST['Employee'];
			if($model->save()){
				Controller::refresh();
			}
		}

		$departmentList = CHtml::listData(Department::model()->findAll(array('order' => 'name',)),'dept_code','name');
		$statusList = CHtml::listData(Status::model()->findAll(array('order' => 'description')),'status_code','description');
		$positionList = CHtml::listData(Position::model()->findAll(array('order' => 'description',)),'position_code','description');
		$supervisorList = CHtml::listData(Employee::model()->getDeptHeads(), 'emp_number', 'fullname');

		$this->render('jobDetails/index',array(
			'model'				=>	$model,
			'departmentList'	=>	$departmentList,
			'positionList'		=>	$positionList,
			'statusList'		=>	$statusList,
			'supervisorList'	=>  $supervisorList,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->layout='/layouts/column1';

		$model=new Employee('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Employee']))
			$model->attributes=$_GET['Employee'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionDependent($id){
		$this->layout = '/layouts/profile';
        $model = new Dependent;
		$this->emp_number=$this->loadModel($id)->emp_number;
       
        if (isset($_POST['Dependent'])) {
            $model->attributes = $_POST['Dependent'];
            $model->emp_number=$this->emp_number;
            $model->name = ucwords(strtolower($model->name));
            if ($model->save()){
            	$model->unsetAttributes();
            }
               
        }

        $dataProvider = new CActiveDataProvider('Dependent', array(
                    'criteria' => array(
                        'condition' => 'emp_number=:emp_number',
                        'params' => array(':emp_number' => $this->emp_number),
                    ),
                    'pagination' => array(
                        'pageSize' => 31,
                    ),
        ));

        $this->render('dependent/index', array(
            'model' => $model,'dataProvider' => $dataProvider,
        ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Employee::model()->with(array('province','town','supervisor','position','status'))->findByPk($id);

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
		if(isset($_POST['ajax']) && $_POST['ajax']==='employee-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
