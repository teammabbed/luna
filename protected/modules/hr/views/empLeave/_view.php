<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('leave_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->leave_id),array('view','id'=>$data->leave_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leave_type')); ?>:</b>
	<?php echo CHtml::encode($data->leave_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_number')); ?>:</b>
	<?php echo CHtml::encode($data->emp_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leave_reason')); ?>:</b>
	<?php echo CHtml::encode($data->leave_reason); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leave_days')); ?>:</b>
	<?php echo CHtml::encode($data->leave_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_filed')); ?>:</b>
	<?php echo CHtml::encode($data->date_filed); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('head1')); ?>:</b>
	<?php echo CHtml::encode($data->head1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('head2')); ?>:</b>
	<?php echo CHtml::encode($data->head2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('head1_action_date')); ?>:</b>
	<?php echo CHtml::encode($data->head1_action_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('head2_action_date')); ?>:</b>
	<?php echo CHtml::encode($data->head2_action_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('head1_action')); ?>:</b>
	<?php echo CHtml::encode($data->head1_action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('head2_action')); ?>:</b>
	<?php echo CHtml::encode($data->head2_action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leave_year')); ?>:</b>
	<?php echo CHtml::encode($data->leave_year); ?>
	<br />

	*/ ?>

</div>