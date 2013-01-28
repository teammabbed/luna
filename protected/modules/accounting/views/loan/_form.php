<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'loan-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal'
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListRow($model,'emp_number',CHtml::listData(Employee::model()->findAll(array('order' => 'emp_lname')),'emp_number','fullname'), array('empty' => '--please select--'));?>

	<?php echo $form->dropDownListRow($model,'type_id',CHtml::listData(Employee::model()->findAll(array('order' => 'emp_lname')),'emp_number','fullname'), array('empty' => '--please select--'));?>

	<?php echo $form->textFieldRow($model,'amount'); ?>

	<?php echo $form->textFieldRow($model,'terms',array('maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'payment_periods'); ?>

	<?php echo $form->textFieldRow($model,'monthly_amort'); ?>

	<?php echo $form->textFieldRow($model,'loan_date'); ?>

	<?php echo $form->textFieldRow($model,'payment_start'); ?>

	<?php echo $form->textFieldRow($model,'payment_end'); ?>

	<?php echo $form->textFieldRow($model,'status',array('maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'white ok',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
