<?php 
$legend=$model->isNewRecord?'Create Office':'Update Office '.$model->shortname;
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'department-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'htmlOptions'=>array('class'=>'well'),
)); ?>
	<fieldset><legend><h1><?php echo $legend ?></h1></legend>
		<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'dept_code',array('class'=>'span4','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span4','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'shortname',array('class'=>'span4','maxlength'=>50)); ?>

	<?php echo $form->dropDownListRow($model,'supervisor',$supervisorList, array('class'=>'span4')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>$model->isNewRecord ? 'primary' : 'success',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			'icon'=>$model->isNewRecord ? 'plus white' : 'ok white',
		)); 

		echo "&nbsp";
		if(!$model->isNewRecord){
			$this->widget('bootstrap.widgets.TbButton', array(
	        'type'=>'',
	        'label'=>'Cancel',
	        'icon'=>'ban-circle',
	        'url'=>Yii::app()->createUrl("maintenance/department/index")
	       ));
	    }
		?>
	</div>
		
	</fieldset>

<?php $this->endWidget(); ?>