
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'license-form',
    'type'=>'horizontal',
)); ?>

        <?php echo $form->textFieldRow($model,'description',array('maxlength'=>100)); ?>

        <?php echo $form->textAreaRow($model,'agency',array('maxlength'=>120)); ?>

    <div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>$model->isNewRecord ? 'primary' : 'success','label'=>$model->isNewRecord ? 'Create' : 'Save','icon'=>$model->isNewRecord ? 'ok white' : 'ok white')); ?>

		<?php
		if(!$model->isNewRecord){
			$this->widget('bootstrap.widgets.TbButton', array('label'=>'Cancel','icon'=>'ban-circle','url'=>Yii::app()->createUrl('/accounting/loanType/index'),)); 
		}else{
			$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset','type'=>'warning','label'=>'Cancel','icon'=>'ban-circle white',));
		}
		?>
<?php $this->endWidget(); ?>
