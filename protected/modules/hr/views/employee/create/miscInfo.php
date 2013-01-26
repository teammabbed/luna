<?php
$this->breadcrumbs=array(
	'PMIS (Create Employee)'=>array('employee/create'),
	$this->loadModel($this->emp_number)->fullname
);
?>
<div>
	  <h2>Create Employee Details for <?php echo $this->loadModel($this->emp_number)->fullname;?></h2>
</div>



<div class="span11">

	<?php
	$this->widget('bootstrap.widgets.TbTabs', array(
		'type' => 'tabs',
		'htmlOptions'=>array('class'=>'tabs-top'),
		'tabs' => array(
			array('label' => 'Family Background', 'content' => $this->renderPartial('create/_familyBackground', array(
					'model'=>$model_fambg,
					'dataProvider'=>$dataProvider_fambg,
				), true), 'active' => ($this->createActiveTab=='fmbg')
			),

			array('label' => 'Education', 'content' => $this->renderPartial('create/_education', array(
					'model'=>$model_educ,
					'dataProvider'=>$dataProvider_educ,
				), true),'active' => ($this->createActiveTab=='educ')
			),

			array('label' => 'Work Experience', 'content' => $this->renderPartial('create/_wrkExperience', array(
					'model'=>$model_wrkExp,
					'dataProvider'=>$dataProvider_wrk,
				),true),'active' => ($this->createActiveTab=='wrk')
			),

			array('label' => 'Licenses', 'content' => $this->renderPartial('create/_license', array(
					'model'=>$model_lic,
					'dataProvider'=>$dataProvider_lic,
				), true),'active' => ($this->createActiveTab=='lic')
			),

			array('label' => 'Trainings and Seminars', 'content' => $this->renderPartial('create/_seminars', array(
					'model'=>$model_training,
					'dataProvider'=>$dataProvider_training,
				), true),'active' =>($this->createActiveTab=='train')
			),

			array('label' => 'Emergency Contacts', 'content' => $this->renderPartial('create/_emergContact', array(
					'model'=>$model_emerg,
					'dataProvider'=>$dataProvider_emerg,
				), true),'active' => ($this->createActiveTab=='emerg')
			),
	)));
	?>


</div>


<?php

Yii::app()->clientScript->registerScript('tooltips', '

', CClientScript::POS_HEAD);
?>
