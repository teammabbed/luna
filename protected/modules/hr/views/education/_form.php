<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'education-form',
	'type'=>'horizontal'
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'emp_number',array('maxlength'=>10, 'value'=> $employee->emp_number)); ?>

	<?php echo $form->textFieldRow($model,'degree',array('maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'school',array('maxlength'=>100)); ?>

	<div class="control-group">
	    <div class="control-label">
	        <?php echo $form->labelEx($model, 'start_date'); ?>
	    </div>
	    <div class="controls">
	            <?php
	            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	                'model' => $model,
	                'attribute' => 'start_date',
	                'value' => $model->start_date,
	                // additional javascript options for the date picker plugin
	                'options' => array(
	                    'showAnim' => 'fold',
	                    'showButtonPanel' => true,
	                    'autoSize' => true,
	                    'dateFormat' => 'yy-mm-dd',
	                    'defaultDate' => $model->start_date,
	                ),
	            ));
	            echo '(yyyy-mm-dd)'
	            ?>
	            <?php echo $form->error($model, 'start_date'); ?>
	    </div>
	</div>

	<div class="control-group">
	    <div class="control-label">
	        <?php echo $form->labelEx($model, 'end_date'); ?>
	    </div>
	    <div class="controls">
	            <?php
	            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	                'model' => $model,
	                'attribute' => 'end_date',
	                'value' => $model->end_date,
	                // additional javascript options for the date picker plugin
	                'options' => array(
	                    'showAnim' => 'fold',
	                    'showButtonPanel' => true,
	                    'autoSize' => true,
	                    'dateFormat' => 'yy-mm-dd',
	                    'defaultDate' => $model->end_date,
	                ),
	            ));
	            echo '(yyyy-mm-dd)'
	            ?>
	            <?php echo $form->error($model, 'end_date'); ?>
	    </div>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
