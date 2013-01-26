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
    	<?php echo $form->hiddenField($model,'emp_number',array('value'=>$this->emp_number)); ?>
        <?php echo $form->textFieldRow($model,'name',array('hint'=>'e.g. Philip Go')); ?>
        <?php echo $form->dropDownListRow($model,'relationship',$rel_type,array('empty'=>'--please select')); ?>
        <?php echo $form->textFieldRow($model,'contact_no',array('maxlength'=>15)); ?> 

        <?php echo $form->textAreaRow($model,'address',array('maxlength'=>15)); ?>

    	<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save','type'=>'primary','icon'=>'ok white')); ?><span style="width:5px"></span>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear','type'=>'warning','icon'=>'ban-circle white')); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>