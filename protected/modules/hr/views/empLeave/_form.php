<?php 
$currentYear = date("Y");
$yearList = array();
for ($i = $currentYear; $i >= $currentYear - 1; $i--) {  $yearList[$i] = $i; }
    
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'emp-leave-form',
	'type'=>'horizontal'
)); 
?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="span5" style="margin-left:0;">
        <?php echo $form->dropDownListRow($model,'emp_number', $employees, array('empty' => '--please select--')); ?>
        <?php echo $form->dropDownListRow($model,'leave_type', $leaveTypes, array('empty' => '--please select--')); ?>
        <?php echo $form->textAreaRow($model,'leave_reason',array('maxlength'=>100)); ?>   
        <?php echo $form->textAreaRow($model,'remarks',array('maxlength'=>100)); ?>
        <div class="control-group">
            <div class="control-label">
                <?php echo $form->labelEx($model, 'date_filed'); ?>
            </div>
            <div class="controls">
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'date_filed',
                        // additional javascript options for the date picker plugin
                        'options' => array(
                            'showAnim' => 'fold',
                            'showButtonPanel' => true,
                            'autoSize' => true,
                            'dateFormat' => 'yy-mm-dd',
                            'maxDate' => 0,
                            'defaultDate' => $model->date_filed,
                        ),
                        'htmlOptions'=>array(
                            'value'=> date('Y-m-d'),
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'date_filed'); ?>
            </div>
        </div>   
    </div>
	
    <div class="span7">
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
                <?php echo CHtml::listBox('datesList', 'selected', array(), array('multiple' => 'true',)); ?>
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

        <?php echo $form->textFieldRow($model, 'leave_days', array('value' => 0,'readonly' => 'true')) ?>
        <?php echo $form->dropDownListRow($model,'leave_year', $yearList); ?>
    </div>
	
    <div class="span12" style="margin-left:0;">
        <div class="form-actions">
    		<?php $this->widget('bootstrap.widgets.TbButton', array(
    			'buttonType'=>'submit',
    			'type'=>'primary',
    			'label'=>$model->isNewRecord ? 'Create' : 'Save',
    		)); ?>
    	</div>
    </div>

<?php 

$this->endWidget(); 

Yii::app()->clientScript->registerScript('addOption', '
$(function(){
        
    $("#add").bind("click",function(){
        var leaveDate,
            dateEntry = $("#dpDate").val(),
            meridiem = $("#meridiem").val();

		if((dateEntry != "") && (meridiem != "")) {
			leaveDate = dateEntry + "/" +meridiem;
			if($("#datesList option:contains("+dateEntry+")").length == 0){
				$("#datesList").append("<option value="+leaveDate+">"+leaveDate+"</option>");
                computeDays();
			}
		}
	});

	$("#remove").bind("click",function(){
		$("#datesList option:selected").remove();
        computeDays();
	});

    function computeDays()
    {
     var total = 0;
     var selectbox = document.getElementById("datesList");
        for(i=selectbox.options.length-1;i>=0;i--) {
           var str = selectbox.options[i].value;
           if (str.slice(11) == "wd") {
                total = total + 1;
           }
           else {
                total = total + 0.5;
           }                         
        }

     $("input[name=\"EmpLeave[leave_days]\"]").val(parseFloat(total));     
    }

});
', CClientScript::POS_HEAD);
?>
