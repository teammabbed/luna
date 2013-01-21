<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs=array(
	'PMIS (Manage Employees)',
);

?>

<h3>Manage Employees</h3>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'employee-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>'bordered striped',
	'columns'=>array(
		'emp_number',
		'emp_lname',
		'emp_fname',
		'emp_mname',
		array(
	        'type' => 'raw',
	        'value' => 'CHtml::link("[Profile]", array("employee/basicInfo&id=".$data->emp_number))',
        ),
        array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{delete}',
		),
	),
)); 

?>
