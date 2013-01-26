<?php

$this->breadcrumbs=array(
	'PMIS (Manage Employees)'=>array('employee/admin'),
	$employee->fullname=>array('employee/basicInfo&id='.$employee->emp_number),
	'Licenses'
);

?>

<h3>Licenses of <?php echo $employee->fullname;?></h3>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs',
	'tabs' => array(
		array('label' => 'List', 
			  'content' => $this->renderPartial('_view', array('dataProvider'=>$dataProvider), true), 
			  'active' => (!$model->hasErrors()),
		),
		array('label' => 'Create', 
			  'content' => $this->renderPartial('_form', 
			   array('model'=>$model,'employee'=>$employee), true),
			  'active' => ($model->hasErrors()),
		),
)));
?>
