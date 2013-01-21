<?php 
$category=array("Head"=>"Head","Staff"=>"Staff");
$legend=$model->isNewRecord?'Create Position':'Update Position'.$model->description;
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'position-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'htmlOptions'=>array('class'=>'well'),
)); ?>
	<fieldset><legend><h1><?php echo $legend ?></h1></legend>
		<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span4','maxlength'=>50)); ?>

	<?php echo $form->dropDownListRow($model,'category',$category,array('class'=>'span4','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'shortname',array('class'=>'span4','maxlength'=>50)); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>$model->isNewRecord ? 'primary' : 'success',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			'icon'=>$model->isNewRecord ? 'plus white' : 'ok white',
		)); ?>

		<?php
		if(!$model->isNewRecord){
			$this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'Cancel',
			'icon'=>'ban-circle',
			'url'=>Yii::app()->createUrl('/maintenance/position/index'),
		)); 

		}
		?>
	</div>
		
	</fieldset>

<?php $this->endWidget(); ?>