<?php

class UserController extends Controller
{

	public $layout='/layouts/column2';
	
	public $dept=0;

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
				'actions'=>array('index','update','admin','delete', 'changeRole','updateRole'),
				'roles'=>array('hradmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
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
		$model_edit=$this->loadModel($id);

		$old_password=$model_edit->password;
		//$this->performAjaxValidation($model_new);

		if(isset($_POST['User']))
		{
			$model_edit->attributes=$_POST['User'];
			$model_edit->password=$old_password;
			$model_edi->password_repeat=$old_password;
			$model_edit->new_password=$old_password;
			$model_edit->new_password_repeat=$old_password;
			if($model_edit->save())
				$this->redirect(array('index'));
		}

		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('index',array(
			'model'=>$model,
			'model_new'=>$model_edit,
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
		$model_new=new User;
		
		$this->performAjaxValidation($model_new);

		if(isset($_POST['User']))
		{
			$model_new->attributes=$_POST['User'];
			$model_new->password=md5("luna");
			if($model_new->save())
				$model_new=new User;
		}

		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('index',array(
			'model'=>$model,
			'model_new'=>$model_new,
		));
	}

	public function actionchangeRole()
	{
		$this->layout = '/layouts/column2';
        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->dept=$id;
        }

        $dataProvider = new CActiveDataProvider('User', array(
                    'criteria' => array(
                        'with' => array('employee'),
                        'together' => true,
                        'condition' => '(dept_code=:deptCode and isActive=:isActive)',
                        'params' => array(':deptCode' => $id, ':isActive' => 'Y'),
                    ),
                    'pagination' => array(
                        'pageSize' => 31,
                    ),
                ));

        $this->render('changeRole', array( 'dataProvider' => $dataProvider));
	}


	public function actionUpdateRole()
	{
		if (Yii::app()->request->isAjaxRequest && isset($_POST['id'])) {
            $id = trim($_POST['id']);
            $model = $this->loadModel($id);
            $model->role = trim($_POST['role']);
            $model->save();
        }
	}

	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
