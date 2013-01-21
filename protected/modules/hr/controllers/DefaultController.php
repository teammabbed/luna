<?php

class DefaultController extends Controller
{
	public $layout='/layouts/column1';
	public function actionIndex()
	{
		$layout='/layouts/column1';
		$this->render('index');
	}
}