<!--Contact Details-->

<?php echo $form->textFieldRow($model, 'emp_number',array('readonly'=>true,'hint'=>'This field is auto-generated (deptnum-itemnum')); ?>

<?php echo $form->dropDownListRow($model, 'dept_code',Department::model()->departments,array('empty'=>'--please select--','class'=>'emp_cmp')); ?>
<?php echo $form->textFieldRow($model, 'item_no',array('class'=>'emp_cmp')); ?>
<?php echo $form->dropDownListRow($model, 'emp_supervisor', Employee::model()->employeeHeads,array('empty'=>'--please selecte--')); ?>
<?php echo $form->dropDownListRow($model, 'position_code',Position::model()->positions,array('empty'=>'--please selecte--')); ?>
<?php echo $form->dropDownListRow($model, 'emp_status',Status::model()->statuses,array('empty'=>'--please selecte--')); ?>
<?php echo $form->textFieldRow($model, 'sal_grade_code'); ?>
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

<?php echo $form->textFieldRow($model, 'orig_appointment'); ?>


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

<?php echo $form->textFieldRow($model, 'promoted_position'); ?>
