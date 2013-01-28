<?php
$this->breadcrumbs=array(
	'Loans'=>array('index'),
	$model->loan_id,
);

$this->menu=array(
	array('label'=>'List Loan','url'=>array('index')),
	array('label'=>'Create Loan','url'=>array('create')),
	array('label'=>'Update Loan','url'=>array('update','id'=>$model->loan_id)),
	array('label'=>'Delete Loan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->loan_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Loan','url'=>array('admin')),
);
?>

<h1>View Loan #<?php echo $model->loan_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'loan_id',
		'emp_number',
		'type_id',
		'amount',
		'terms',
		'payment_periods',
		'monthly_amort',
		'loan_date',
		'payment_start',
		'payment_end',
		'status',
	),
)); ?>
