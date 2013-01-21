<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'work-experience-form',
	'type'=>'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'emp_number',array('maxlength'=>10, 'value'=> $employee->emp_number)); ?>

	<?php echo $form->textFieldRow($model,'employer',array('maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'job_title',array('maxlength'=>120)); ?>

<div class="control-group">
    <div class="control-label">
        <?php echo $form->labelEx($model, 'from_date'); ?>
    </div>
    <div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'from_date',
                'value' => $model->from_date,
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fold',
                    'showButtonPanel' => true,
                    'autoSize' => true,
                    'dateFormat' => 'yy-mm-dd',
                    'defaultDate' => $model->from_date,
                ),
            ));
            echo '(yyyy-mm-dd)'
            ?>
            <?php echo $form->error($model, 'from_date'); ?>
    </div>
</div>

<div class="control-group">
    <div class="control-label">
        <?php echo $form->labelEx($model, 'to_date'); ?>
    </div>
    <div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'to_date',
                'value' => $model->to_date,
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fold',
                    'showButtonPanel' => true,
                    'autoSize' => true,
                    'dateFormat' => 'yy-mm-dd',
                    'defaultDate' => $model->to_date,
                ),
            ));
            echo '(yyyy-mm-dd)'
            ?>
            <?php echo $form->error($model, 'to_date'); ?>
    </div>
</div>

	<?php echo $form->textFieldRow($model,'remarks',array('maxlength'=>200)); ?>

	<?php echo $form->checkBoxRow($model,'internal'); ?>

	<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save','type'=>'primary')); ?><span style="width:5px"></span>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear','type'=>'warning')); ?>
    </div>

<?php $this->endWidget(); ?>
