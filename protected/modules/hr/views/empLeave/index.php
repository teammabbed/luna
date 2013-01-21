<?php
$this->breadcrumbs=array(
	'Emp Leaves',
);

$this->menu=array(
	array('label'=>'Create EmpLeave','url'=>array('create')),
	array('label'=>'Manage EmpLeave','url'=>array('admin')),
);
?>

<h1>Emp Leaves</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
