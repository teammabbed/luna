<?php
$this->breadcrumbs=array(
	'PMIS (Create Employee)'
);
?>

<div class="page-header">
	  <h2>Create Employee</h2>
</div>

<div class="span12">
<?php
 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'personal-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true,),
)); ?>


	<div class="span7">
	<?php
	$this->widget('bootstrap.widgets.TbTabs', array(
		'type' => 'tabs',
		'htmlOptions'=>array('class'=>'tabs-left'),
		'tabs' => array(
			array('label' => 'Personal Information', 'content' => $this->renderPartial('create/_basicInfo', array(
					'model'=>$model,
					'form'=>$form,
				), true), 'active' => true
			),

			array('label' => 'Contact Details', 'content' => $this->renderPartial('create/_contactDetail', array(
					'model'=>$model,
					'form'=>$form,
				),true),
			),

			array('label' => 'Job Details', 'content' => $this->renderPartial('create/_jobDetail', array(
					'model'=>$model,
					'form'=>$form,
				), true),
			),
	)));
	?>
	</div>

	<div class="span4">
		<?php echo $form->errorSummary($model); ?>
	</div>


	<div class="span10">
		<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save','type'=>'primary','icon'=>'ok white')); ?><span style="width:5px"></span>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear','type'=>'warning','icon'=>'ban-circle white')); ?>
		</div>
	</div>



<?php $this->endWidget(); ?>

</div>
<?php

Yii::app()->clientScript->registerScript('generateEmpnumber', '
	$(document).ready(function(){
		$(".emp_cmp").change(function(){
			var dept_code=$("#Employee_dept_code").val();
			var item_no=$("#Employee_item_no").val();

			var emp_number=dept_code+"-"+item_no;

			$("#Employee_emp_number").val(emp_number);
		});
	});
', CClientScript::POS_HEAD);
?>
