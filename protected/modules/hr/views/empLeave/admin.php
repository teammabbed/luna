<?php
$this->breadcrumbs=array(
	'Emp Leaves'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EmpLeave','url'=>array('index')),
	array('label'=>'Create EmpLeave','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('emp-leave-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Emp Leaves</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'emp-leave-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'leave_id',
		'leave_type',
		'emp_number',
		'leave_reason',
		'status',
		'leave_days',
		/*
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
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
