<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('loan_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->loan_id),array('view','id'=>$data->loan_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_number')); ?>:</b>
	<?php echo CHtml::encode($data->emp_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('terms')); ?>:</b>
	<?php echo CHtml::encode($data->terms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_periods')); ?>:</b>
	<?php echo CHtml::encode($data->payment_periods); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monthly_amort')); ?>:</b>
	<?php echo CHtml::encode($data->monthly_amort); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('loan_date')); ?>:</b>
	<?php echo CHtml::encode($data->loan_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_start')); ?>:</b>
	<?php echo CHtml::encode($data->payment_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_end')); ?>:</b>
	<?php echo CHtml::encode($data->payment_end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>