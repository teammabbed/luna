<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'work-experience-grid',
	'dataProvider'=>$workExperience,
	'columns'=>array(
		'employer',
		'job_title',
		'from_date',
		'to_date',
		array(
			'header'=>'w/in Organization',
			'value'=>'($data->internal) ? "Yes" : "No"',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{delete}'
		),
	),
)); ?>
