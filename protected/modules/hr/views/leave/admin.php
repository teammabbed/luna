<?php
$this->breadcrumbs=array(
	'Leaves (Manage)'
);

?>

<h3>Manage Leaves</h3>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'leave-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'fullname',
			'header'=>'Employee',
			'value'=>'isset($data->emp_number) ? $data->employee->fullname : ""',
		),
		array(
			'name'=>'leave_type',
			'header'=>'Leave Type',
			'value'=>'$data->getLeaveDesc()',
		),
		'leave_days',
		'date_filed',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{delete}'
		),
	),
)); ?>