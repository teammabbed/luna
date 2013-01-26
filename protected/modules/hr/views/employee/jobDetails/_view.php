<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
    	'emp_number',
    	'item_no',
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
	    'sal_grade_code',
	    array(
	    	'label'=>'Activity',
	    	'value'=> ($model->isActive=='Y') ? 'Active' : 'In-active',
	    ),
	    'joined_date',
	    'orig_appointment',
	    'promoted_date',
	    'termination_date',
	    'termination_position',
	    'termination_reason',
    ),
));