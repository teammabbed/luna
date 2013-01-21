<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs=array(
	'PMIS (Manage Employees)'=>array('employee/admin'),
	(Employee::model()->findByPk($this->emp_number)->fullname)=>array('employee/personalInfo&id='.$model->emp_number),
	'Dependents'
);

?>

<h3>Dependents of <?php echo Employee::model()->findByPk($this->emp_number)->fullname; ?></h3>

<?php 

$this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs',
	'tabs' => array(
		array('label' => 'Create', 'content' => $this->renderPartial('dependent/_form', array(
			'model'=>$model), true), 'active' => true
		),
		array('label' => 'View', 'content' => $this->renderPartial('dependent/_view', array(
				'dataProvider'=>$dataProvider,
			), true)),
)));

