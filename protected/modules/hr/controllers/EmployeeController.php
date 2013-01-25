<?php

class EmployeeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout;
	public $emp_number=0;
	public $createActiveTab;

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
				'actions'=>array('create', 'contact','deleteFam','deleteWrkExp','deleteLinc','deleteEmerContact','deleteEduc','deleteTraining','job', 'basicInfo','dependent','admin','delete'),
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
		$model_fambg=new FamilyBackground;
		$model_lic=new License;
		$model_wrkExp=new WorkExperience;
		$model_training=new Training;
		$model_emerg=new EmpEmergContact;
		$model_educ=new Education;

		//$model->addError('emp_number','custom error');

		$this->performAjaxValidation($model);

		if(isset($_POST['Employee']))
		{
			$model->attributes=$_POST['Employee'];
			//formatting data
			$model->emp_lname=ucwords(strtolower($model->emp_lname));
			$model->emp_mname=ucwords(strtolower($model->emp_mname));
			$model->emp_fname=ucwords(strtolower($model->emp_fname));
			$model->emp_nickname=ucwords(strtolower($model->emp_nickname));
			$model->lastEdited=date('yyyy-mm-dd H:i:s');
			$model->lastEditedBy=Yii::app()->user->id;
			if($model->save()){
				$this->createActiveTab='fmbg';
				$this->emp_number=$model->emp_number;
				$model->unsetAttributes();
				$model_fambg->emp_number=$this->emp_number;
				$model_lic->emp_number=$this->emp_number;
				$model_wrkExp->emp_number=$this->emp_number;
				$model_training->emp_number=$this->emp_number;
				$model_emerg->emp_number=$this->emp_number;
				$model_educ->emp_number=$this->emp_number;
			}
		}


		if(isset($_POST['FamilyBackground'])){
			$this->createActiveTab='fmbg';
			$model_fambg->attributes=$_POST['FamilyBackground'];
			$model_fambg->fname=ucwords(strtolower($model_fambg->fname));
			$model_fambg->mi=ucwords(strtolower($model_fambg->mi));
			$model_fambg->lname=ucwords(strtolower($model_fambg->lname));
			if($model_fambg->save()){
				$this->emp_number=$model_fambg->emp_number;
				$model_fambg->unsetAttributes();
				$model_fambg->emp_number=$this->emp_number;
			}
		}
		if(isset($_POST['License'])){
			$this->createActiveTab='lic';
			$model_lic->attributes=$_POST['License'];
			if($model_lic->save()){
				$this->emp_number=$model_lic->emp_number;
				$model_lic->unsetAttributes();
				$model_lic->emp_number=$this->emp_number;
			}
		}
		if(isset($_POST['WorkExperience'])){
			$this->createActiveTab='wrk';
			$model_wrkExp->attributes=$_POST['WorkExperience'];
			if($model_wrkExp->save()){
				$this->emp_number=$model_wrkExp->emp_number;
				$model_wrkExp->unsetAttributes();
				$model_wrkExp->emp_number=$this->emp_number;
			}
		}
		if(isset($_POST['Training'])){
			$this->createActiveTab='train';
			$model_training->attributes=$_POST['Training'];
			if($model_training->save()){
				$this->emp_number=$model_training->emp_number;
				$model_training->unsetAttributes();
				$model_training->emp_number=$this->emp_number;
			}
		}
		if(isset($_POST['EmpEmergContact'])){
			$this->createActiveTab='emerg';
			$model_emerg->attributes=$_POST['EmpEmergContact'];
			if($model_emerg->save()){
				$this->emp_number=$model_emerg->emp_number;
				$model_emerg->unsetAttributes();
				$model_emerg->emp_number=$this->emp_number;
			}
		}
		if(isset($_POST['Education'])){
			$this->createActiveTab='educ';
			$model_educ->attributes=$_POST['Education'];
			$model_educ->degree_course=ucfirst($model_educ->degree_course);
			$model_educ->school=ucfirst($model_educ->school);
			if($model_educ->save()){
				$this->emp_number=$model_educ->emp_number;
				$model_educ->unsetAttributes();
				$model_educ->emp_number=$this->emp_number;
			}
		}

		//DataProviders
		$dataProvider_fambg =FamilyBackground::model()->getFamBgByEmp($this->emp_number);
        $dataProvider_lic= License::model()->getLicensesByEmp($this->emp_number);
        $dataProvider_wrk= WorkExperience::model()->getWorkExpByEmp($this->emp_number);
        $dataProvider_training= Training::model()->getTrainingByEmp($this->emp_number);
        $dataProvider_emerg= EmpEmergContact::model()->getEmerContactByEmp($this->emp_number);
        $dataProvider_educ= Education::model()->getEducationByEmp($this->emp_number);


		$this->render('create/index',array(
			'model'	=>	$model,
			'model_fambg'=>$model_fambg,
			'model_lic'=>$model_lic,
			'model_wrkExp'=>$model_wrkExp,
			'model_training'=>$model_training,
			'model_emerg'=>$model_emerg,
			'model_educ'=>$model_educ,
			'dataProvider_educ'=>$dataProvider_educ,
			'dataProvider_emerg'=>$dataProvider_emerg,
			'dataProvider_training'=>$dataProvider_training,
			'dataProvider_wrk'=>$dataProvider_wrk,
			'dataProvider_lic'=>$dataProvider_lic,
			'dataProvider_fambg'=>$dataProvider_fambg,
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


		$this->render('jobDetails/index',array(
			'model'				=>	$model,
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
		$model=Employee::model()->with(array('supervisor','position','status'))->findByPk($id);

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


	//Misc functions 
	public function actionDeleteFam($id){
		$model=FamilyBackground::model()->findByPk($id);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	public function actionDeleteEduc($id){
		$model=Education::model()->findByPk($id);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	public function actionDeleteLinc($id){
		$model=License::model()->findByPk($id);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	public function actionDeleteTraining($id){
		$model=Training::model()->findByPk($id);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	public function actionDeleteEmerContact($id){
		$model=EmpEmergContact::model()->findByPk($id);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	public function actionDeleteWrkExp($id){
		$model=WorkExperience::model()->findByPk($id);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

}
