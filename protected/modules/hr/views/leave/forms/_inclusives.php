<?php
$dates = array();
$currentYear = date("Y");
$years= array();
for ($i = $currentYear; $i >= $currentYear - 1; $i--) {  $years[$i] = $i; }

if(isset($model->datesList)) {
    foreach ($model->datesList as $key) {
        $dates[$key] = $key;
    }
}

?>

<div class="control-group"> 
    <div class="control-label">
        <?php echo CHtml::label('Select Date(s)', 'dpDate'); ?>
    </div>
           
    <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'dpDate',
            // additional javascript options for the date picker plugin
            'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'yy-mm-dd',
                      
            ),
            'htmlOptions' => array(
                        'style' => 'height:20px;'
            ),
        ));
        ?>
        <?php echo CHtml::dropDownList('meridiem', 'v', array('wd' => 'Whole Day', 'am' => 'A.M.', 'pm' => 'P.M.'), array('class' => 'span2')); ?>
        <?php echo CHtml::button('add', array('class' => 'btn btn-primary', 'id'=>'add')); ?>
        <?php echo $form->error($model, 'leave_details_date'); ?>
     </div>
</div>

       
<div class="control-group">
    <div class="control-label">
        <?php echo CHtml::label('Leave Days', 'datesList'); ?>
    </div>     
    <div class="controls">
        <?php echo CHtml::listBox('Leave[datesList]', 'selected', $dates , array('id'=>'datesList','multiple'=>true)); ?>
    </div>
</div>

<div class="control-group">
    <div class="control-label">
        <?php echo CHtml::label('Click to remove', 'remove'); ?>
    </div>
    <div class="controls">
        <?php echo CHtml::button('Remove Item', array('id' => 'remove', 'class' => 'btn btn-danger')); ?>
    </div>
</div>

<?php echo $form->textFieldRow($model, 'leave_days', array('value' => isset($model->leave_days) ? $model->leave_days : 0,'readonly' => 'true')) ?>
<?php echo $form->dropDownListRow($model, 'leave_year', $years);?>


