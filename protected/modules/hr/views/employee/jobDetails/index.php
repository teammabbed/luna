<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs=array(
	'PMIS (Manage Employees)'=>array('employee/admin'),
	$model->fullname=>array('employee/personalInfo&id='.$model->emp_number),
	'Contact Details'
);

?>

<h3>Job Details of <?php echo $model->fullname; ?></h3>

<?php 

$this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs',
	'tabs' => array(
		array('label' => 'Update', 'content' => $this->renderPartial('jobDetails/_form', array(
				'model'=>$model,
			), true), 'active' => true
		),
		array('label' => 'View', 'content' => $this->renderPartial('jobDetails/_view', array(
				'model'=>$model,
			), true)),
)));

