<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
	    array(
	    	'label'=>'Status',
	    	'value'=> ($model->emp_status) ? $model['status']['description'] : '',
	    ),
	    array(
	    	'label'=>'Position',
	    	'value'=> ($model->position_code) ? $model['position']['description'] : '',
	    ),
	    array(
	    	'label'=>'Department',
	    	'value'=> ($model->dept_code) ? $model['department']['name'] : '',
	    ),
	    array(
	    	'label'=>'Supervisor',
	    	'value'=> ($model->emp_supervisor) ? $model['supervisor']['fullname'] : '',
	    ),
	    'joined_date',
    ),
));