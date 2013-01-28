<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'loan-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal'
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListRow($model,'emp_number',CHtml::listData(Employee::model()->findAll(array('order' => 'emp_lname')),'emp_number','fullname'), array('empty' => '--please select--'));?>

	<?php echo $form->dropDownListRow($model,'type_id',CHtml::listData(LoanType::model()->findAll(array('order' => 'description')),'type_id','description'), array('empty' => '--please select--'));?>

	<?php echo $form->textFieldRow($model,'amount'); ?>

	<?php echo $form->textFieldRow($model,'apr'); ?>

	<?php echo $form->dropDownListRow($model,'terms',array('monthly'=>'Monthly','bi-monthly'=>'Bi-Monthly','weekly'=>'Weekly','annually'=>'Annually')); ?>

	<?php echo $form->textFieldRow($model,'payment_periods', array('value'=>$model->isNewRecord ? 0 : $model->payment_periods)); ?>

	<?php echo $form->textFieldRow($model,'monthly_amort'); ?>

	<div class="control-group">
	    <div class="control-label">
	        <?php echo $form->labelEx($model, 'loan_date'); ?>
	    </div>
	    <div class="controls">
	            <?php
	            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	                'model' => $model,
	                'attribute' => 'loan_date',
	                'value' => $model->loan_date,
	                // additional javascript options for the date picker plugin
	                'options' => array(
	                    'showAnim' => 'fold',
	                    'showButtonPanel' => true,
	                    'autoSize' => true,
	                    'dateFormat' => 'yy-mm-dd',
	                    'defaultDate' => $model->loan_date,
	                ),
	            ));
	            ?>
	            <?php echo $form->error($model, 'loan_date'); ?>
	    </div>
	</div>

	<div class="control-group">
	    <div class="control-label">
	        <?php echo $form->labelEx($model, 'payment_start'); ?>
	    </div>
	    <div class="controls">
	            <?php
	            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	                'model' => $model,
	                'attribute' => 'payment_start',
	                'value' => $model->payment_start,
	                // additional javascript options for the date picker plugin
	                'options' => array(
	                    'showAnim' => 'fold',
	                    'showButtonPanel' => true,
	                    'autoSize' => true,
	                    'dateFormat' => 'yy-mm-dd',
	                    'defaultDate' => $model->payment_start,
	                ),
	            ));
	            ?>
	            <?php echo $form->error($model, 'payment_start'); ?>
	    </div>
	</div>

	<div class="control-group">
	    <div class="control-label">
	        <?php echo $form->labelEx($model, 'payment_end'); ?>
	    </div>
	    <div class="controls">
	            <?php
	            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	                'model' => $model,
	                'attribute' => 'payment_end',
	                'value' => $model->payment_end,
	                // additional javascript options for the date picker plugin
	                'options' => array(
	                    'showAnim' => 'fold',
	                    'showButtonPanel' => true,
	                    'autoSize' => true,
	                    'dateFormat' => 'yy-mm-dd',
	                    'defaultDate' => $model->payment_end,
	                ),
	            ));
	            ?>
	            <?php echo $form->error($model, 'payment_end'); ?>
	    </div>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'white ok',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
