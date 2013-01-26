<?php
/* @var $this EmployeeController */
/* @var $model Employee */
/* @var $form CActiveForm */

 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'contact-details-form',
    'type'=>'horizontal',
)); ?>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textAreaRow($model, 'emp_address'); ?>
<?php echo $form->textAreaRow($model, 'emp_address_current'); ?>
<?php echo $form->textFieldRow($model, 'emp_hm_tel'); ?>
<?php echo $form->textFieldRow($model, 'emp_mobile'); ?>
<?php echo $form->textFieldRow($model, 'emp_work_tel'); ?>
<?php echo $form->textFieldRow($model, 'emp_work_email'); ?>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save','type'=>'primary','icon'=>'ok white')); ?><span style="width:5px"></span>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear','type'=>'warning','icon'=>'ban-circle white')); ?>
 </div>
<?php $this->endWidget(); ?>