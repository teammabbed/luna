<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'emp-emerg-contact-form',
	'type'=>'horizontal',
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'emp_number',array('maxlength'=>10, 'value'=> $employee->emp_number)); ?>

	<?php echo $form->textFieldRow($model,'name',array('maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'relationship',array('maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'home_no',array('maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'mobile_no',array('maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'office_no',array('maxlength'=>15)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
