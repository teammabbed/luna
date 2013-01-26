<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'label'=>'Employee',
            'value'=>($model->emp_number !== null) ? $model->employee->fullname : '',
        ),
		array(
			'label'=>'Leave Type',
            'value'=>$model->getLeaveDesc(),
        ),
		'additional_details',
		'leave_reason',
		array(
			'label'=>'Status',
            'value'=>$model->getStatus(),
        ),
		'leave_days',
		'date_filed',
		array(
			'label'=>'Head1',
            'value'=>($model->head1 !== null) ? $model->head10->fullname : '',
        ),
		array(
			'label'=>'Head2',
            'value'=>($model->head2 !== null) ? $model->head20->fullname : '',
        ),
		'remarks',
		'date_created',
		'leave_year',
	),
)); ?>

