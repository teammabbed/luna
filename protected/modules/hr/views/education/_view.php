<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'template'=>"{items}",
	'columns'=>array(
		array('header'=>'No','value'=>'$row+1'),
		'degree_course',
		'level',
		'school',
		'yr_start',
		'yr_end',
		'remarks',
		array(
			'header'=>'Actions',
			'template'=>'{delete}',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'deleteButtonUrl'=>'Yii::app()->createUrl("hr/employee/deleteEduc", array("id"=>$data->edu_code))',
		),
	),

));

?>