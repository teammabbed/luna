<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs=array(
	'PMIS (Manage Employees)'=>array('employee/admin'),
	$model->fullname,
);

?>

<h3>Personal Information of <?php echo $model->fullname; ?></h3>

<?php 

$this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs',
	'tabs' => array(
		array('label' => 'Update', 'content' => $this->renderPartial('personalInfo/_form', array(
				'model'=>$model,
			), true), 'active' => true
		),
		array('label' => 'View', 'content' => $this->renderPartial('personalInfo/_view', array(
				'model'=>$model,
			), true)),
)));

