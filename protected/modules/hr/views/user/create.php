<?php
$this->breadcrumbs=array(
	'User'=>array('admin'),
	($model->isNewRecord)?'New User':'Update User',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>



