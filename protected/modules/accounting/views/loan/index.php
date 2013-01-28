<?php
$this->breadcrumbs=array(
	'Loans',
);

$this->menu=array(
	array('label'=>'Create Loan','url'=>array('create')),
	array('label'=>'Manage Loan','url'=>array('admin')),
);
?>

<h1>Loans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
