<?php
$this->breadcrumbs=array(
	'Loans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Loan','url'=>array('index')),
	array('label'=>'Manage Loan','url'=>array('admin')),
);
?>

<h3>Create Loan</h3>

<hr>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>