<?php
/* @var $this EmployeeController */
/* @var $model Employee */
/* @var $form CActiveForm */

 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'personal-form',
    'type'=>'horizontal',
)); ?>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model, 'emp_number'); ?>
<?php echo $form->textFieldRow($model, 'emp_lname'); ?>
<?php echo $form->textFieldRow($model, 'emp_fname'); ?>
<?php echo $form->dropDownListRow($model, 'dept_code', $departmentList); ?>
<?php echo $form->dropDownListRow($model, 'emp_supervisor', $supervisorList); ?>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save','type'=>'primary')); ?><span style="width:5px"></span>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear','type'=>'warning')); ?>
 </div>
<?php $this->endWidget(); ?>