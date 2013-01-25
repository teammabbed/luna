<?php

class SiteController extends Controller
{

	public $layout='//layouts/column1';

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}


	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


	public function actionLogin()
	{
		$route=array(
			'hradmin'=>'/hr/default/',
			'head'=>'/user/default/',
			'superaccountant'=>'/accounting/default/',
			'accountant'=>'/accounting/default/',
			'user'=>'user/default/',
		);

		//check if a user already logged in
		if(isset(Yii::app()->user->id))
			$this->redirect(Yii::app()->createUrl($route[Yii::app()->user->getState('role')]));



		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				if(Yii::app()->user->returnUrl==Yii::app()->homeUrl)
					$this->redirect(Yii::app()->createUrl($route[Yii::app()->user->getState('role')]));
				else
					$this->redirect(Yii::app()->user->returnUrl);
			}
				
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}