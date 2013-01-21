<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'education-grid',
	'dataProvider'=>$education,
	'columns'=>array(
		'degree',
		'school',
		'start_date',
		'end_date',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{delete}'
		),
	),
)); ?>
