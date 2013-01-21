<?php

class DepartmentController extends Controller
{

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
			array('allow',
				'actions'=>array('index'),
				'roles'=>array('admin')
			),
			array('allow', 
				'actions'=>array('create','update','index'),
				'roles'=>array('admin'),
			),
			array('allow', 
				'actions'=>array('admin','delete','user'),
				'roles'=>array('admin'),
			),
			array('deny',  
				'roles'=>array('*'),
			),

		);
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->layout='/layouts/column1';
		$model_new=$this->loadModel($id);

		//$this->performAjaxValidation($model_new);

		if(isset($_POST['Department']))
		{
			$model_new->attributes=$_POST['Department'];
			if($model_new->save())
				$this->redirect(array('index'));
		}

		$model=new Department('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Department']))
			$model->attributes=$_GET['Department'];

		$this->render('index',array(
			'model'=>$model,
			'model_new'=>$model_new,
			'supervisorList'=>$this->getSupervisors(),
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
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	
	public function actionIndex()
	{
		$this->layout='/layouts/column1';
		$model_new=new Department;
		
		if(isset($_POST['Department']))
		{
			$model_new->attributes=$_POST['Department'];
			if($model_new->save()){
				$this->refresh();
			}
		}

		$model=new Department('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Department']))
			$model->attributes=$_GET['Department'];

		$this->render('index',array(
			'model'=>$model,
			'model_new'=>$model_new,
			'supervisorList'=>$this->getSupervisors(),
		));
	}

	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Department::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='department-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function getSupervisors()
	{
		$supervisors = Employee::model()->findAll(
			array(
				'order'=>'emp_lname, emp_fname',
			)
		);

        $supervisorList = CHtml::listData($supervisors, 'emp_number', 'fullname');
        return $supervisorList;
	}
}

