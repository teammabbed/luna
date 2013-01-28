<<<<<<< HEAD

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'license-form',
    'type'=>'horizontal',
)); ?>

        <?php echo $form->textFieldRow($model,'description',array('maxlength'=>100)); ?>

        <?php echo $form->textAreaRow($model,'agency',array('maxlength'=>120)); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('icon'=>'ok white', 'buttonType'=>'submit', 'label'=>'Save','type'=>'primary')); ?><span style="width:5px"></span>
        <?php $this->widget('bootstrap.widgets.TbButton', array('icon'=>'ban-circle white','buttonType'=>'reset', 'label'=>'Clear','type'=>'warning')); ?>
    </div>

<?php $this->endWidget(); ?>
=======

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'license-form',
    'type'=>'horizontal',
)); ?>

        <?php echo $form->textFieldRow($model,'description',array('maxlength'=>100)); ?>

        <?php echo $form->textAreaRow($model,'agency',array('maxlength'=>120)); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('icon'=>'ok white', 'buttonType'=>'submit', 'label'=>'Save','type'=>'primary')); ?><span style="width:5px"></span>
        <?php $this->widget('bootstrap.widgets.TbButton', array('icon'=>'ban-circle white','buttonType'=>'reset', 'label'=>'Clear','type'=>'warning')); ?>
    </div>

<?php $this->endWidget(); ?>
>>>>>>> mamaw
