
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

    <?php echo $form->hiddenField($model,'emp_number',array('value'=>$this->emp_number));?>
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

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('icon'=>'ok white', 'buttonType'=>'submit', 'label'=>'Save','type'=>'primary')); ?><span style="width:5px"></span>
        <?php $this->widget('bootstrap.widgets.TbButton', array('icon'=>'ban-circle white','buttonType'=>'reset', 'label'=>'Clear','type'=>'warning')); ?>
    </div>


<?php $this->endWidget(); ?>