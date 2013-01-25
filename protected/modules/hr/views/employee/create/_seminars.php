<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'seminar-form',
	'type'=>'horizontal',
)); ?>

<div class="well span10">
    <div class="span4">
	<?php echo $form->hiddenField($model,'emp_number',array('maxlength'=>10,)); ?>

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

    </div>  

    <div class="span4">
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
        'title',
        'place',
        'start_date'=>array('name'=>'start_date','value'=>'date("F d, Y",strtotime($data->start_date))'),
        'end_date'=>array('name'=>'end_date','value'=>'date("F d, Y",strtotime($data->end_date))'),
        'remarks',
        array(
            'header'=>'Actions',
            'template'=>'{delete}',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'Yii::app()->createUrl("hr/employee/deleteTraining", array("id"=>$data->tra_code))',
                    ''
                )
            )
        ),
    ),

));

?>
</div>