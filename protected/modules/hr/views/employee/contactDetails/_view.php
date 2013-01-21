<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
	    'emp_address',
	    'emp_address_current',
		array(
			'label'=>'Town',
            'value'=>($model->emp_town !== null) ? $model['town']['name'] : '',
        ),
		array(
			'label'=>'Province',
            'value'=>($model->emp_province !== null) ? $model['province']['name'] : '',
        ),
	    'emp_hm_tel',
	    'emp_mobile',
	    'emp_work_tel',
	    'emp_work_email',
	    'emp_oth_email',
    ),
));