<?php

$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'template'=>"{items}",
	'columns'=>array(
		'name',
		'relationship',
		'date_of_birth',
		array(
			'header'=>'Actions',
			'template'=>'{delete}',
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),

));

?>