<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
	    'emp_number',
	    'emp_lname',
	    'emp_fname',
	    'emp_mname',
	    'emp_nickname',
	    'emp_gender',
	    'emp_birthday',
	    'emp_birthplace',
	    'emp_marital_status',
	    'emp_sss_num',
	    'emp_gsis_num',
	    'emp_philhealth_num',
	    'emp_hdmf_num',
	    'emp_unified_num',
	    'emp_tin_num',
    ),
));