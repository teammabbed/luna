<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'work-experience-form',
	'type'=>'horizontal',
)); ?>

<div class="well span10">
    <div class="span4">
	<?php echo $form->hiddenField($model,'emp_number',array('maxlength'=>10,)); ?>

	<?php echo $form->textFieldRow($model,'employer',array('maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'job_title',array('maxlength'=>120)); ?>

    <div class="control-group">
        <div class="control-label">
            <?php echo $form->labelEx($model, 'from_date'); ?>
        </div>
        <div class="controls">
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'from_date',
                    'value' => $model->from_date,
                    // additional javascript options for the date picker plugin
                    'options' => array(
                        'showAnim' => 'fold',
                        'showButtonPanel' => true,
                        'autoSize' => true,
                        'dateFormat' => 'yy-mm-dd',
                        'defaultDate' => $model->from_date,
                    ),
                ));
                ?>
                <?php echo $form->error($model, 'from_date'); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <?php echo $form->labelEx($model, 'to_date'); ?>
        </div>
        <div class="controls">
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'to_date',
                    'value' => $model->to_date,
                    // additional javascript options for the date picker plugin
                    'options' => array(
                        'showAnim' => 'fold',
                        'showButtonPanel' => true,
                        'autoSize' => true,
                        'dateFormat' => 'yy-mm-dd',
                        'defaultDate' => $model->to_date,
                    ),
                ));
                ?>
                <?php echo $form->error($model, 'to_date'); ?>
        </div>
    </div>

    </div>  
    <div class="span4">

	<?php echo $form->textAreaRow($model,'remarks',array('maxlength'=>200)); ?>
	<?php echo $form->checkBoxRow($model,'internal',array("value" => "Y", "uncheckValue"=>"N")); ?>
    <?php echo $form->checkBoxRow($model,'isgovernment',array("value" => "Y", "uncheckValue"=>"N")); ?>


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
        'employer',
        'job_title',
        'from_date'=>array('name'=>'from_date','value'=>'date("F d, Y",strtotime($data->from_date))'),
        'to_date'=>array('name'=>'to_date','value'=>'date("F d, Y",strtotime($data->to_date))'),
        'remarks',
        'internal'=>array('name'=>'internal','value'=>'($data->internal=="Y")?"Yes":"No"'),
        'isgovernment'=>array('name'=>'isgovernment','value'=>'($data->internal=="Y")?"Yes":"No"'),
        array(
            'header'=>'Actions',
            'template'=>'{delete}',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'Yii::app()->createUrl("hr/employee/deleteWrkExp", array("id"=>$data->wexp_code))',
                    ''
                )
            )
        ),
    ),

));

?>
</div>