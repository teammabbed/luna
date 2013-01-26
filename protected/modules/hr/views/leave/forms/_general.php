<div class="span5">
	<?php echo $form->dropDownListRow($model,'emp_number', CHtml::listData(Employee::model()->findAll(array('order' => 'emp_lname')),'emp_number','fullname'), array('empty' => '--please select--')); ?>
	<?php echo $form->dropDownListRow($model,'head1', Chtml::listData(Employee::model()->getDeptHeads(),'emp_number','fullname'), array('empty' => '--please select--')); ?>
	<?php echo $form->dropDownListRow($model,'head2', Chtml::listData(Employee::model()->getDeptHeads(),'emp_number','fullname'),array('empty' => '--please select--')); ?>
	<?php echo $form->dropDownListRow($model,'leave_type', $leaveTypes, array('empty' => '--please select--')); ?>
	<div class="control-group">
	    <div class="control-label">
	        <?php echo $form->labelEx($model, 'date_filed'); ?>
	    </div>
	    <div class="controls">
			<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model' => $model,
			    'attribute' => 'date_filed',
			    'value' => $model->date_filed,
			    // additional javascript options for the date picker plugin
			    'options' => array(
			        'showAnim' => 'fold',
			        'showButtonPanel' => true,
			        'autoSize' => true,
			        'dateFormat' => 'yy-mm-dd',
			        'maxDate' => 0,
			    ),
			    'htmlOptions'=>array(
			        'style'=>'height:20px;'
			    ),
			));
			?>
		</div>
	</div>
	<?php echo $form->dropDownListRow($model,'approved_for', $approveTypes, array('empty' => '--please select--')); ?>
</div>

<div class="span6">
	<i class="help-block" style="margin-left:40px;"><span class="required">State Where to Spend</span></i>
	<?php echo $form->checkBoxRow($model,'is_outofcountry'); ?>  
	<?php echo $form->textAreaRow($model,'additional_details',array('maxlength'=>100)); ?>
	<i class="help-block" style="margin-left:40px;"><span class="required">Others</span></i>
	<?php echo $form->textAreaRow($model,'leave_reason',array('maxlength'=>100)); ?>
	<?php echo $form->textAreaRow($model,'remarks',array('maxlength'=>100)); ?> 
</div>





