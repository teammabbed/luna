<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs=array(
	'PMIS (Create Employee)'
);

?>

<h3>Create Employee</h3>

<?php echo $this->renderPartial('create/_createEmployeeForm', array(
	'model'=>$model,
	'departmentList'=>$departmentList,
	'supervisorList'=>$supervisorList,
)); ?>