<?php
$this->breadcrumbs=array(
	'Leaves (Create)'
);
?>

<h3>New Leave Credits</h3>

<?php echo $this->renderPartial('_form', array(
	'model'		=>$model,
	'employees' =>$employees,
	'leaveTypes'=>$leaveTypes
)); ?>