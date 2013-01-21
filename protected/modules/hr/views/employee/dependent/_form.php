<?php
/* @var $this EmployeeController */
/* @var $model Employee */
/* @var $form CActiveForm */
$rel_type=array(
	'child'=>'Child',
	'parent'=>'Parent',
	'sibling'=>'Sibling',
	'other'=>'Other',
);

 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'contact-details-form',
    'type'=>'horizontal',
)); ?>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model,'name');?>
<?php echo $form->dropDownListRow($model,'relationship',$rel_type,array('empty'=>'--please select--')); ?>
<div class="control-group">
    <div class="control-label">
        <?php echo $form->labelEx($model, 'emp_birthday'); ?>
    </div>
    <div class="controls">
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model' => $model,
		    'attribute' => 'date_of_birth',
		    'value' => $model->date_of_birth,
		    // additional javascript options for the date picker plugin
		    'options' => array(
		        'showAnim' => 'fold',
		        'showButtonPanel' => true,
		        'autoSize' => true,
		        'dateFormat' => 'yy-mm-dd',
		    ),
		    'htmlOptions'=>array(
		        'style'=>'height:20px;'
		    ),
		));
		?>
	</div>
</div>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save','type'=>'primary')); ?><span style="width:5px"></span>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear','type'=>'warning')); ?>
 </div>
<?php $this->endWidget(); ?>