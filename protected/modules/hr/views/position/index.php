<?php
$this->breadcrumbs=array(
	'Position'=>array('index'),
	($model_new->isNewRecord)?'New Position':'Update Position',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model_new,)); ?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'position-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>'bordered',
	'columns'=>array(
		array('header'=>'No.','value'=>'$row+1'),
		'description',
		'shortname',
		'category' => array(
			'header'=>'Category',
			'type'=>'raw',
			'name'=>'category',
			'value'=>'CHtml::dropDownList("category",$data->category, array("Head"=>"Head","Staff"=>"Staff"),
					array("id"=>$data->position_code,
						"ajax"=>array(
							"type"=>"POST",
							"url"=>Yii::app()->createUrl("maintenance/position/updateCategory"),
							"data"=>"js:\"category=\" +$(this).val() + \"&id=\"+$(this).attr(\'id\').trim()",
							"success"=>"function(data){}"
						),
						"class"=>"span2",
					));'
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
			'header'=>'Action',
		),
	),
)); ?>
