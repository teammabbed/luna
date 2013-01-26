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
		array('header'=>'No','value'=>'$row+1'),
		'emp_number',
		'emp_lname',
		'emp_fname',
		array('name'=>'deptname','value'=>'$data->department->name'),
		//array('name'=>'position','value'=>'($data->position->description==null)?"":$data->position->description'),
		'isActive',
        array(
        	'header'=>'Action',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view}{delete}',
			'viewButtonUrl'=>'Yii::app()->createUrl("hr/employee/basicInfo", array("id"=>$data->emp_number))',
		),
	),
)); 

?>
