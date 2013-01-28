
<?php 
$roles=array(
	"user"=>"User",
	"head"=>"Head",
	"hradmin"=>"HR Admin",
	"accountant"=>"Accountant",
	"superaccountant"=>"Super Accountant"
);
?>

<div class="page-header">
	  <h2><?php echo $model->isNewRecord?'Create User':'Update User '.$model->username; ?></h2>
</div>



<?php
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'type'=>'horizontal',
)); ?>
	
	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'username',array('maxlength'=>50)); ?>

	<?php echo $form->dropDownListRow($model,'emp_number',Employee::model()->getEmployees(),array('empty'=>'--Select Employee--')); ?>

	<?php echo $form->dropDownListRow($model,'role',$roles); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>$model->isNewRecord ? 'primary' : 'success',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			'icon'=>$model->isNewRecord ? 'ok white' : 'ok white',
		)); ?>

		<?php
		if(!$model->isNewRecord){
			$this->widget('bootstrap.widgets.TbButton', array(
				'label'=>'Cancel',
				'icon'=>'ban-circle',
				'url'=>Yii::app()->createUrl('/hr/user/admin'),
			)); 
		}else{
			$this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'reset',
				'type'=>'warning',
				'label'=>'Cancel',
				'icon'=>'ban-circle white',
			));
		}
		?>
	</div>
		
<?php $this->endWidget(); ?>