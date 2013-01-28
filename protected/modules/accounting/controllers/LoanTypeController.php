<?php
class LoanTypeController extends Controller
{

	public $layout='/layouts/column1';
	public $tab='admin';

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

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','update'),
				'roles'=>array('accountant','superaccountant'),
			),
			array('deny',  // deny all users
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
		$model=$this->loadModel($id);

		//$this->performAjaxValidation($model_new);

		if(isset($_POST['LoanType']))
		{
			$model->attributes=$_POST['LoanType'];
			$model->agency=ucwords($model->agency);
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$model_new=new LoanType;
		
		if(isset($_POST['LoanType']))
		{
			$model_new->attributes=$_POST['LoanType'];
			$modelnew->agency=ucwords($model_new->agency);
			if($model_new->save()){
				$this->refresh();
			}
		}

		$model=new LoanType('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LoanType']))
			$model->attributes=$_GET['LoanType'];

		$this->render('index',array(
			'model'=>$model,
			'model_new'=>$model_new,
		));
	}

	public function actionUpdateCategory(){
		if (Yii::app()->request->isAjaxRequest && isset($_POST['id'])) {
            $id = trim($_POST['id']);
            $model = $this->loadModel($id);
            $model->category = trim($_POST['category']);
            $model->save();
        }
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=LoanType::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='LoanType-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}

