
	<?php
	$rel_type=array(
		'Spouse'=>'Spouse',
		'Child'=>'Child',
		'Mother'=>'Mother',
		'Father'=>'Father',
		'Sibling'=>'Sibling',
		'Other'=>'Other',
	);

	 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	    'id'=>'fambg-form',
	    'type'=>'horizontal',
	)); ?>
<div class="well span10">
<div class="span4">
	<?php echo $form->hiddenField($model,'emp_number');?>
	<?php echo $form->textFieldRow($model,'fname');?>
	<?php echo $form->textFieldRow($model,'mi');?>
	<?php echo $form->textFieldRow($model,'lname');?>
	<?php echo $form->dropDownListRow($model,'relationship',$rel_type,array('empty'=>'--please select--')); ?>
</div>
<div class="span4">
	<div class="control-group">
	    <div class="control-label">
	        <?php echo $form->labelEx($model, 'date_of_birth'); ?>
	    </div>
	    <div class="controls">
			<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model' => $model,
			    'attribute' => 'date_of_birth',
			    'value' => $model->date_of_birth,
			    // additional javascript options for the date picker plugin
			    'options' => array(
			        'showAnim' => 'fold',
			        'showButtonPanel' => true,
			        'autoSize' => true,
			        'dateFormat' => 'yy-mm-dd',
			    ),
			    'htmlOptions'=>array(
			        'style'=>'height:20px;'
			    ),
			));
			?>
		</div>
	</div>

	<?php echo $form->textFieldRow($model,'occupation');?>
	<?php echo $form->dropDownListRow($model,'status',array('alive'=>'Alive','deceased'=>'Deceased'));?>


	<div class="offset2">
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save','type'=>'primary','icon'=>'ok white')); ?><span style="width:5px"></span>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear','type'=>'warning','icon'=>'ban-circle white')); ?>
	 </div>
	<?php $this->endWidget(); ?>
</div>

</div>
<div class="span10">
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'template'=>"{items}",
	'columns'=>array(
		array('header'=>'No','value'=>'$row+1'),
		'lname',
		'fname',
		'relationship',
		'date_of_birth'=>array('name'=>'date_of_birth','value'=>'date("F d, Y",strtotime($data->date_of_birth))'),
		'occupation',
		'status',
		array(
			'header'=>'Actions',
			'template'=>'{delete}',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'buttons'=>array(
				'delete'=>array(
					'url'=>'Yii::app()->createUrl("hr/employee/deleteFam", array("id"=>$data->faf_id))',
					''
				)
			)
		),
	),

));

?>
</div>