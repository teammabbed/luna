<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'template'=>"{items}",
	'columns'=>array(
		array('header'=>'No','value'=>'$row+1'),
		'lname',
		'fname',
		'relationship',
		'date_of_birth'=>array('name'=>'date_of_birth','value'=>'date("F d, Y",strtotime($data->date_of_birth))'),
		'occupation',
		'status',
		array(
			'header'=>'Actions',
			'template'=>'{delete}',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'deleteButtonUrl'=>'Yii::app()->createUrl("hr/employee/deleteFam", array("id"=>$data->faf_code))',
			'buttons'=>array(
				'delete'=>array(
					'url'=>'Yii::app()->createUrl("hr/employee/deleteFam", array("id"=>$data->faf_id))',
				)
			)
		),
	),

));

?>