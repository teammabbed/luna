<?php
/* @var $this EmployeeController */
/* @var $model Employee */
/* @var $form CActiveForm */

 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'job-details-form',
    'type'=>'horizontal',
)); ?>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model,'emp_number',array('readOnly'=>true));?>
<?php echo $form->textFieldRow($model,'item_no');?>
<?php echo $form->dropDownListRow($model,'emp_status',Status::model()->getStatuses(),array('empty'=>'--please select--')); ?>
<?php echo $form->dropDownListRow($model,'position_code',Position::model()->positions,array('empty'=>'--please select--')); ?>
<?php echo $form->dropDownListRow($model,'dept_code',Department::model()->departments,array('empty'=>'--please select--')); ?>
<?php echo $form->dropDownListRow($model,'emp_supervisor',Employee::model()->employeeHeads,array('empty'=>'--please select--')); ?>
<?php echo $form->textFieldRow($model,'sal_grade_code');?>
<?php echo $form->checkBoxRow($model,'isActive',array("value" => "Y",'uncheckValue'=>'N')); ?>

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
            ?>
            <?php echo $form->error($model, 'joined_date'); ?>
    </div>
</div>

<?php echo $form->textFieldRow($model,'orig_appointment');?>

<div class="control-group">
    <div class="control-label">
        <?php echo $form->labelEx($model, 'promoted_date'); ?>
    </div>
    <div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'promoted_date',
                'value' => $model->promoted_date,
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fold',
                    'showButtonPanel' => true,
                    'autoSize' => true,
                    'dateFormat' => 'yy-mm-dd',
                    'defaultDate' => $model->promoted_date,
                ),
            ));
            ?>
            <?php echo $form->error($model, 'promoted_date'); ?>
    </div>
</div>

<?php echo $form->textFieldRow($model,'promoted_position');?>

<div class="control-group">
    <div class="control-label">
        <?php echo $form->labelEx($model, 'termination_date'); ?>
    </div>
    <div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'termination_date',
                'value' => $model->termination_date,
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fold',
                    'showButtonPanel' => true,
                    'autoSize' => true,
                    'dateFormat' => 'yy-mm-dd',
                    'defaultDate' => $model->termination_date,
                ),
            ));
            ?>
            <?php echo $form->error($model, 'termination_date'); ?>
    </div>
</div>

<?php echo $form->textFieldRow($model,'termination_position');?>
<?php echo $form->textAreaRow($model,'termination_reason');?>


<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save','type'=>'primary','icon'=>'ok white')); ?><span style="width:5px"></span>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear','type'=>'warning','icon'=>'ban-circle white')); ?>
 </div>
<?php $this->endWidget(); ?>