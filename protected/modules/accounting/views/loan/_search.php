<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'loan_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'emp_number',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'type_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'amount',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'terms',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'payment_periods',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'monthly_amort',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'loan_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'payment_start',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'payment_end',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
