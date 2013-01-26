
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'license-form',
    'type'=>'horizontal',
)); ?>

        <?php echo $form->hiddenField($model,'emp_number',array('value'=>$this->emp_number,)); ?>

        <?php echo $form->textFieldRow($model,'license_description',array('maxlength'=>100)); ?>

        <?php echo $form->textFieldRow($model,'license_number',array('maxlength'=>120)); ?>

        <div class="control-group">
            <div class="control-label">
                <?php echo $form->labelEx($model, 'license_date'); ?>
            </div>
            <div class="controls">
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'license_date',
                        'value' => $model->license_date,
                        // additional javascript options for the date picker plugin
                        'options' => array(
                            'showAnim' => 'fold',
                            'showButtonPanel' => true,
                            'autoSize' => true,
                            'dateFormat' => 'yy-mm-dd',
                            'defaultDate' => $model->license_date,
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'from_date'); ?>
            </div>
        </div>


        <div class="control-group">
            <div class="control-label">
                <?php echo $form->labelEx($model, 'renewal_date'); ?>
            </div>
            <div class="controls">
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'renewal_date',
                        'value' => $model->renewal_date,
                        // additional javascript options for the date picker plugin
                        'options' => array(
                            'showAnim' => 'fold',
                            'showButtonPanel' => true,
                            'autoSize' => true,
                            'dateFormat' => 'yy-mm-dd',
                            'defaultDate' => $model->renewal_date,
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'renewal_date'); ?>
            </div>
        </div>


    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('icon'=>'ok white', 'buttonType'=>'submit', 'label'=>'Save','type'=>'primary')); ?><span style="width:5px"></span>
        <?php $this->widget('bootstrap.widgets.TbButton', array('icon'=>'ban-cirle white','buttonType'=>'reset', 'label'=>'Clear','type'=>'warning')); ?>
    </div>

<?php $this->endWidget(); ?>
