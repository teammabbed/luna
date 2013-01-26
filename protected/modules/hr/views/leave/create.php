<?php
$this->breadcrumbs=array(
	'Leaves (Create)'
);

$this->widget('bootstrap.widgets.TbAlert');

?>

<h3>Add Approved Leaves</h3>

<?php
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'leave-form',
	'type'=>'horizontal'
));
?>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs',
	'tabs' => array(
		array('label' => 'General', 'content' => $this->renderPartial('forms/_general', array(
				'approveTypes'=>$approveTypes,'model'=>$model,'leaveTypes'=>$leaveTypes,'form'=>$form
			), true), 'active' => true
		),
		array('label' => 'Inclusive Dates', 'content' => $this->renderPartial('forms/_inclusives', array(
				'model'=>$model,'form'=>$form,
			), true),
		),
)));
?>

<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
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

    $("#yw3").bind("click",function(){
    	DoSelectAll();
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

     $("input[name=\"Leave[leave_days]\"]").val(parseFloat(total));     
    }

	function DoSelectAll()
	{
		var selectbox = document.getElementById("datesList");
		for(i=selectbox.options.length-1;i>=0;i--)
		{
		    selectbox.options[i].selected = true;
		}
	}

});
', CClientScript::POS_HEAD);

?>