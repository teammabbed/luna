<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'seminar-form',
    'type'=>'horizontal',
)); ?>


    <?php echo $form->hiddenField($model,'emp_number',array('value'=>$this->emp_number)); ?>

    <?php echo $form->textFieldRow($model,'title',array('maxlength'=>100)); ?>

    <?php echo $form->textFieldRow($model,'place',array('maxlength'=>120)); ?>

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
                ?>
                <?php echo $form->error($model, 'end_date'); ?>
        </div>
    </div>

    <?php echo $form->textAreaRow($model,'remarks'); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('icon'=>'ok white', 'buttonType'=>'submit', 'label'=>'Save','type'=>'primary')); ?><span style="width:5px"></span>
        <?php $this->widget('bootstrap.widgets.TbButton', array('icon'=>'ban-cirle white','buttonType'=>'reset', 'label'=>'Clear','type'=>'warning')); ?>
    </div>
<?php $this->endWidget(); ?>
