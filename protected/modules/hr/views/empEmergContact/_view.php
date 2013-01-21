<?php

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'emp-emerg-contact-grid',
	'dataProvider'=>$emergencyContacts,
	'columns'=>array(
		'name',
		'relationship',
		'home_no',
		'mobile_no',
		'office_no',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{delete}',
		),
	),
)); 

?>
