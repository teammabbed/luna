<?php
$this->breadcrumbs=array(
	'Emp Leaves'=>array('index'),
	$model->leave_id,
);

$this->menu=array(
	array('label'=>'List EmpLeave','url'=>array('index')),
	array('label'=>'Create EmpLeave','url'=>array('create')),
	array('label'=>'Update EmpLeave','url'=>array('update','id'=>$model->leave_id)),
	array('label'=>'Delete EmpLeave','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->leave_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmpLeave','url'=>array('admin')),
);
?>

<h1>View EmpLeave #<?php echo $model->leave_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'leave_id',
		'leave_type',
		'emp_number',
		'leave_reason',
		'status',
		'leave_days',
		'date_filed',
		'head1',
		'head2',
		'head1_action_date',
		'head2_action_date',
		'head1_action',
		'head2_action',
		'remarks',
		'date_created',
		'leave_year',
	),
)); ?>
