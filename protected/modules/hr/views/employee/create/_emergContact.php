<div class="well span10">
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

    <div class="span4">
    	<?php echo $form->hiddenField($model,'emp_number'); ?>
        <?php echo $form->textFieldRow($model,'name',array('hint'=>'e.g. Philip Go')); ?>
        <?php echo $form->dropDownListRow($model,'relationship',$rel_type,array('empty'=>'--please select')); ?>
    </div>  

    <div class="span4">
        <?php echo $form->textFieldRow($model,'contact_no',array('maxlength'=>15)); ?>
        <?php echo $form->textAreaRow($model,'address'); ?>

    	<div class="offset2">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save','type'=>'primary')); ?><span style="width:5px"></span>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear','type'=>'warning')); ?>
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
        'name',
        'relationship',
        'contact_no',
        'address',
        array(
            'header'=>'Actions',
            'template'=>'{delete}',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'deleteButtonUrl'=>'Yii::app()->createUrl("hr/employee/deleteEmerContact", array("id"=>$data->eec_code))',
        ),
    ),

));

?>
</div>