<?php
$rel_type=array(
	'Spouse'=>'Spouse',
	'Child'=>'Child',
	'Mother'=>'Mother',
	'Father'=>'Father',
	'Sibling'=>'Sibling',
	'Other'=>'Other',
);
?>

<?php 
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'fambg-form',
	'type'=>'horizontal',
)); ?>

	<?php echo $form->hiddenField($model,'emp_number');?>
	<?php echo $form->textFieldRow($model,'fname');?>
	<?php echo $form->textFieldRow($model,'mi');?>
	<?php echo $form->textFieldRow($model,'lname');?>
	<?php echo $form->dropDownListRow($model,'relationship',$rel_type,array('empty'=>'--please select--')); ?>
	<div class="control-group">
	    <div class="control-label">
	        <?php echo $form->labelEx($model, 'date_of_birth'); ?>
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

	<?php echo $form->textFieldRow($model,'occupation');?>
	<?php echo $form->dropDownListRow($model,'status',array('alive'=>'Alive','deceased'=>'Deceased'));?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('icon'=>'ok white', 'buttonType'=>'submit', 'label'=>'Save','type'=>'primary')); ?><span style="width:5px"></span>
		<?php $this->widget('bootstrap.widgets.TbButton', array('icon'=>'ban-circle white','buttonType'=>'reset', 'label'=>'Clear','type'=>'warning')); ?>
	 </div>
	

<?php $this->endWidget(); ?>
