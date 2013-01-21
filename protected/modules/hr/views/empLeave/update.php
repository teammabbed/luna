<?php
$this->breadcrumbs=array(
	'Emp Leaves'=>array('index'),
	$model->leave_id=>array('view','id'=>$model->leave_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmpLeave','url'=>array('index')),
	array('label'=>'Create EmpLeave','url'=>array('create')),
	array('label'=>'View EmpLeave','url'=>array('view','id'=>$model->leave_id)),
	array('label'=>'Manage EmpLeave','url'=>array('admin')),
);
?>

<h1>Update EmpLeave <?php echo $model->leave_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>