<?php

$this->breadcrumbs=array(
	'PMIS (Manage Employees)'=>array('employee/admin'),
	$employee->fullname=>array('employee/personalInfo&id='.$employee->emp_number),
	'Work Experience'
);

?>

<h3>Work Experience of <?php echo $employee->fullname;?></h3>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs',
	'tabs' => array(
		array('label' => 'List', 
			  'content' => $this->renderPartial('_view', array('dataProvider'=>$workExperience), true), 
			  'active' => (!$model->hasErrors()),
		),
		array('label' => 'Create', 
			  'content' => $this->renderPartial('_form', 
			   array('model'=>$model,'employee'=>$employee), true),
			  'active' => ($model->hasErrors()),
		),
)));
?>
