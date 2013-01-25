<?php
$level= array(
	'Elementary'=>'Elementary',
	'Secondary'=>'Secondary',
	'Vocational'=>'Vocational',
	'College'=>'College',
	'Graduate Studies'=>'Graduate Studies');
?>


<?php
	 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	    'id'=>'educ-form',
	    'type'=>'horizontal',
	)); ?>
<div class="well span10">
<div class="span4">
	<?php echo $form->hiddenField($model,'emp_number');?>
	<?php echo $form->textFieldRow($model,'degree_course');?>
	<?php echo $form->dropDownListRow($model,'level',$level);?>
	<?php echo $form->textFieldRow($model,'school',array('hint'=>'Write in full'));?>

	<div class="control-group">
	    <div class="control-label">
	        <?php echo $form->labelEx($model, 'yr_start'); ?>
	    </div>
	    <div class="controls">
	        <?php
	            $this->widget('CMaskedTextField', array('model' => $model, 'attribute' => 'yr_start',
	                'mask' => '9999'));
	            ?>  
	        <?php echo $form->error($model, 'yr_start'); ?>
	    </div>
	</div>
</div>

<div class="span4">

	<div class="control-group">
	    <div class="control-label">
	        <?php echo $form->labelEx($model, 'yr_end'); ?>
	    </div>
	    <div class="controls">
	        <?php
	            $this->widget('CMaskedTextField', array('model' => $model, 'attribute' => 'yr_end',
	                'mask' => '9999'));
	            ?>  
	        <?php echo $form->error($model, 'yr_end'); ?>
	    </div>
	</div>
	
	<?php echo $form->textAreaRow($model,'remarks',array('hint'=>'Place here awards received, scholarship grants and other remarks if there\'s any'));?>

	<div class="offset2">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save','type'=>'primary','icon'=>'ok white')); ?><span style="width:5px"></span>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear','type'=>'warning','icon'=>'ban-circle white')); ?>
	</div>
</div>

<?php $this->endWidget(); ?>
</div>

<div class="span10">
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'template'=>"{items}",
	'columns'=>array(
		array('header'=>'No','value'=>'$row+1'),
		'degree_course',
		'level',
		'school',
		'yr_start',
		'yr_end',
		'remarks',
		array(
			'header'=>'Actions',
			'template'=>'{delete}',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'buttons'=>array(
				'delete'=>array(
					'url'=>'Yii::app()->createUrl("hr/employee/deleteEduc", array("id"=>$data->edu_code))',
					''
				)
			)
		),
	),

));

?>
</div>