<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'license-form',
	'type'=>'horizontal',
)); ?>

<div class="well span10">
    <div class="span4">
	<?php echo $form->hiddenField($model,'emp_number',array('maxlength'=>10,)); ?>

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

    </div>  

    <div class="span4">
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
        'license_description',
        'license_number',
        'license_date'=>array('name'=>'license_date','value'=>'date("F d, Y",strtotime($data->license_date))'),
        'renewal_date'=>array('name'=>'renewal_date','value'=>'date("F d, Y",strtotime($data->renewal_date))'),
        array(
            'header'=>'Actions',
            'template'=>'{delete}',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'Yii::app()->createUrl("hr/employee/deleteLinc", array("id"=>$data->license_code))',
                    ''
                )
            )
        ),
    ),

));

?>
</div>