<?php
$this->breadcrumbs=array(
	'Loans'=>array('index'),
	$model->loan_id=>array('view','id'=>$model->loan_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Loan','url'=>array('index')),
	array('label'=>'Create Loan','url'=>array('create')),
	array('label'=>'View Loan','url'=>array('view','id'=>$model->loan_id)),
	array('label'=>'Manage Loan','url'=>array('admin')),
);
?>

<h1>Update Loan <?php echo $model->loan_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>