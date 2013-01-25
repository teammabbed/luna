<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	($model_new->isNewRecord)?'New User':'Update User',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model_new)); ?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>'bordered',
	'columns'=>array(
		array('header'=>'No.','value'=>'$row+1'),
		'username',
		array('header'=>'Emp Number', 'name'=>'emp_number','value'=>'$data->emp_number'),
		array('header'=>'Emp Name','name'=>'fullname', 'value'=>'$data->employee->fullname'),
		array('name'=>'role','value'=>'ucfirst($data->role)'),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
			'header'=>'Action',
		),
	),
)); ?>
