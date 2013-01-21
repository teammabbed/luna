<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'leave_id',array('class'=>'span5','maxlength'=>13)); ?>

	<?php echo $form->textFieldRow($model,'leave_type',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'emp_number',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'leave_reason',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'leave_days',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_filed',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'head1',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'head2',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'head1_action_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'head2_action_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'head1_action',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'head2_action',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'remarks',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'date_created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'leave_year',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
