<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Main',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('department-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php echo $this->renderPartial('_form', array('model'=>$model_new,'supervisorList'=>$supervisorList)); ?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'department-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>'bordered',
	'columns'=>array(
		array('header'=>'No.','value'=>'$row+1'),
		'dept_code',
		'name',
		'shortname',
		array('header'=>'Office Head','name'=>'fullname','value'=>'$data->deptSupervisor->fullname'),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
			'header'=>'Action',
		),
	),
)); ?>
