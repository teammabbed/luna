<?php

$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$leaveDetails,
	'template'=>"{items}",
	'columns'=>array(
		'leave_dates',
		'leave_credit',
		array(
			'header'=>'Action',
			'template'=>'{delete}',
			'deleteButtonUrl'=>'Yii::app()->createUrl("hr/leaveDetail/delete", array("id" => $data->detail_id))',
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),

)); 

?>