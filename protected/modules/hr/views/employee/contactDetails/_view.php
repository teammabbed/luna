<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
	    'emp_address',
	    'emp_address_current',
	    'emp_hm_tel',
	    'emp_mobile',
	    'emp_work_tel',
	    'emp_work_email',
    ),
));