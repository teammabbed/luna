<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'emergcontact-form',
	'type'=>'horizontal',
)); ?>


<?php
    $rel_type=array(
        'Spouse'=>'Spouse',
        'Child'=>'Child',
        'Mother'=>'Mother',
        'Father'=>'Father',
        'Sibling'=>'Sibling',
        'Other'=>'Other',
    );
?>

<div class="well span10">
    <div class="span4">
    	<?php echo $form->hiddenField($model,'emp_number'); ?>
        <?php echo $form->textFieldRow($model,'name',array('hint'=>'e.g. Philip Go')); ?>
        <?php echo $form->dropDownListRow($model,'relationship',$rel_type,array('empty'=>'--please select')); ?>
        <?php echo $form->textFieldRow($model,'home_no',array('maxlength'=>15)); ?>
    </div>  

    <div class="span4">
        <?php echo $form->textFieldRow($model,'mobile_no',array('maxlength'=>15)); ?>
        <?php echo $form->textFieldRow($model,'office_no',array('maxlength'=>15)); ?>

	<div class="offset2">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save','type'=>'primary','icon'=>'ok white')); ?><span style="width:5px"></span>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear','type'=>'warning','icon'=>'ban-circle white')); ?>
    </div>

    </div>
</div>
<?php $this->endWidget(); ?>

<div class="span10">
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('header'=>'No','value'=>'$row+1'),
        'name',
        'home_no',
        'relationship',
        'mobile_no',
        'office_no',
        array(
            'header'=>'Actions',
            'template'=>'{delete}',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'Yii::app()->createUrl("hr/employee/deleteEmerContact", array("id"=>$data->eec_code))',
                    ''
                )
            )
        ),
    ),

));

?>
</div>