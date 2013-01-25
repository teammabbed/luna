
<?php 
$roles=array("user"=>"User","admin"=>"Admin");
$legend=$model->isNewRecord?'Create User':'Update User '.$model->username;

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'type'=>'horizontal',
	'htmlOptions'=>array('class'=>'well'),
)); ?>
	<fieldset><legend><h1><?php echo $legend ?></h1></legend>
		<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span4','maxlength'=>50)); ?>

	<?php //echo $form->textFieldRow($model,'emp_number',array('class'=>'span4','maxlength'=>50)); ?>

	<?php echo $form->dropDownListRow($model,'emp_number',Employee::model()->getEmployees(),array('empty'=>'--Select Employee--','class'=>'span4')); ?>

	<?php echo $form->dropDownListRow($model,'role',$roles, array('class'=>'span4')); ?>

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
			'url'=>Yii::app()->createUrl('/users/user/index'),
		)); 

		}
		?>
	</div>
		
	</fieldset>

<?php $this->endWidget(); ?>