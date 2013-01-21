<?php
/* @var $this EmployeeController */
/* @var $model Employee */
/* @var $form CActiveForm */

 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'job-details-form',
    'type'=>'horizontal',
)); ?>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->dropDownListRow($model,'emp_status',$statusList,array('empty'=>'--please select--')); ?>
<?php echo $form->dropDownListRow($model,'position_code',$positionList,array('empty'=>'--please select--')); ?>
<?php echo $form->dropDownListRow($model,'dept_code',$departmentList,array('empty'=>'--please select--')); ?>
<?php echo $form->dropDownListRow($model,'emp_supervisor',$supervisorList,array('empty'=>'--please select--')); ?>
<div class="control-group">
    <div class="control-label">
        <?php echo $form->labelEx($model, 'joined_date'); ?>
    </div>
    <div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'joined_date',
                'value' => $model->joined_date,
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fold',
                    'showButtonPanel' => true,
                    'autoSize' => true,
                    'dateFormat' => 'yy-mm-dd',
                    'defaultDate' => $model->joined_date,
                ),
            ));
            echo '(yyyy-mm-dd)'
            ?>
            <?php echo $form->error($model, 'joined_date'); ?>
    </div>
</div>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save','type'=>'primary')); ?><span style="width:5px"></span>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear','type'=>'warning')); ?>
 </div>
<?php $this->endWidget(); ?>