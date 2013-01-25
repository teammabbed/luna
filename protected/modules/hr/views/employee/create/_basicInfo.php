<!--Personal Details-->

<?php //echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model, 'emp_fname'); ?>
<?php echo $form->textFieldRow($model, 'emp_mname'); ?>
<?php echo $form->textFieldRow($model, 'emp_lname'); ?>
	<?php
		$name_ext=array('Jr'=>'Jr','Sr'=>'Sr',
			'II'=>'II','III'=>'III','IV'=>'IV',
			'V'=>'V','VI'=>'VI');
	?>
<?php echo $form->dropDownListRow($model, 'emp_name_ext',$name_ext,array('empty'=>'None')); ?>
<?php echo $form->textFieldRow($model, 'emp_nickname'); ?>

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
                'htmlOptions'=>array('hint'=>'yyyy-mm-dd'),
            ));
            ?>
            <?php echo $form->error($model, 'emp_birthday'); ?>
    </div>
</div>

<?php echo $form->textAreaRow($model, 'emp_birthplace'); ?>
<?php echo $form->dropDownListRow($model, 'emp_gender',array('Male'=>'Male','Female'=>'Female'),array('empty'=>'--please select--')); ?>
<?php echo $form->dropDownListRow($model, 'emp_marital_status',array('Single'=>'Single','Married'=>'Married','Annuled'=>'Annuled','Widowed'=>'Widowed','Separated'=>'Separated','Married'=>'Married'),array('empty'=>'--please select--')); ?>




<div class="control-group">
    <div class="control-label">
        <?php echo $form->labelEx($model, 'emp_gsis_num'); ?>
    </div>
    <div class="controls">
        <?php
            $this->widget('CMaskedTextField', array(
                'model' => $model, 'attribute' => 'emp_gsis_num',
                'mask' => '99-9999999-9'
            ));
        ?>  
        <?php echo $form->error($model, 'emp_gsis_num'); ?>
    </div>
</div>

<div class="control-group">
    <div class="control-label">
        <?php echo $form->labelEx($model, 'emp_policy_num'); ?>
    </div>
    <div class="controls">
        <?php
            $this->widget('CMaskedTextField', array(
                'model' => $model, 'attribute' => 'emp_policy_num',
                'mask' => '99-9999999-9'
            ));
        ?>  
        <?php echo $form->error($model, 'emp_policy_num'); ?>
    </div>
</div>

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
