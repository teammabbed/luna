<?php
/* @var $this EmployeeController */
/* @var $model Employee */
/* @var $form CActiveForm */

 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'personal-form',
    'type'=>'horizontal',
)); ?>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model, 'emp_number', array('readOnly' => true)); ?>
<?php echo $form->textFieldRow($model, 'emp_lname'); ?>
<?php echo $form->textFieldRow($model, 'emp_fname'); ?>
<?php echo $form->textFieldRow($model, 'emp_mname'); ?>
<?php echo $form->textFieldRow($model, 'emp_nickname'); ?>
<?php echo $form->dropDownListRow($model, 'emp_gender', 
			array(
				'male'=>'Male', 
				'female'=>'Female'
			), 
			array('empty'=>'--please select--')); 
?>
<?php echo $form->dropDownListRow($model, 'emp_marital_status', 
			array(
				'single'=>'Single', 
				'married'=>'Married', 
				'separated'=>'Separated', 
				'widowed'=>'Widowed',
				'divorce'=>'Divorce',
				'others'=>'Others'
			), 
			array('empty'=>'--please select--')); 
?>
<div class="control-group">
    <div class="control-label">
        <?php echo $form->labelEx($model, 'emp_birthday'); ?>
    </div>
    <div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'emp_birthday',
                'value' => $model->emp_birthday,
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fold',
                    'showButtonPanel' => true,
                    'autoSize' => true,
                    'dateFormat' => 'yy-mm-dd',
                    'defaultDate' => $model->emp_birthday,
                ),
            ));
            echo '(yyyy-mm-dd)'
            ?>
            <?php echo $form->error($model, 'emp_birthday'); ?>
    </div>
</div>

<?php echo $form->textAreaRow($model, 'emp_birthplace'); ?>

<div class="control-group">
    <div class="control-label">
        <?php echo $form->labelEx($model, 'emp_sss_num'); ?>
    </div>
    <div class="controls">
        <?php
            $this->widget('CMaskedTextField', array(
            	'model' => $model, 'attribute' => 'emp_sss_num',
                'mask' => '99-9999999-9'
            ));
        ?>  
        <?php echo $form->error($model, 'emp_sss_num'); ?>
    </div>
</div>

<div class="control-group">
    <div class="control-label">
       <?php echo $form->labelEx($model, 'emp_gsis_num'); ?>
    </div>
    <div class="controls">
            <?php
            $this->widget('CMaskedTextField', array('model' => $model, 'attribute' => 'emp_gsis_num',
                'mask' => '99999999999'));
            ?>  
            <?php echo $form->error($model, 'emp_gsis_num'); ?>
    </div>
</div>

<div class="control-group">
    <div class="control-label">
            <?php echo $form->labelEx($model, 'emp_philhealth_num'); ?>
    </div>
    <div class="controls">
            <?php
            $this->widget('CMaskedTextField', array('model' => $model, 'attribute' => 'emp_philhealth_num',
                'mask' => '999999999999'));
            ?>  
            <?php echo $form->error($model, 'emp_philhealth_num'); ?>
    </div>
</div>

<div class="control-group">
    <div class="control-label">
        <?php echo $form->labelEx($model, 'emp_hdmf_num'); ?>
    </div>
    <div class="controls">
        <?php
            $this->widget('CMaskedTextField', array('model' => $model, 'attribute' => 'emp_hdmf_num',
                'mask' => '99-99999999-99'));
            ?>  
        <?php echo $form->error($model, 'emp_hdmf_num'); ?>
    </div>
</div>

<div class="control-group">
    <div class="control-label">
            <?php echo $form->labelEx($model, 'emp_unified_num'); ?>
    </div>
    <div class="controls">
        <?php
        $this->widget('CMaskedTextField', array('model' => $model, 'attribute' => 'emp_unified_num',
                'mask' => '999-9999-999-9'));
        ?>  
        <?php echo $form->error($model, 'emp_unified_num'); ?>
   </div>
</div>

<div class="control-group">
    <div class="control-label">
            <?php echo $form->labelEx($model, 'emp_tin_num'); ?>
    </div>
    <div class="controls">
       <?php
           $this->widget('CMaskedTextField', array('model' => $model, 'attribute' => 'emp_tin_num',
               'mask' => '999-999-999'));
           ?>  
      <?php echo $form->error($model, 'emp_tin_num'); ?>
    </div>
</div>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save','type'=>'primary')); ?><span style="width:5px"></span>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear','type'=>'warning')); ?>
 </div>
<?php $this->endWidget(); ?>