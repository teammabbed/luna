<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
<div class="span3">
	<div id="sidebar" class="well">
	<?php
		$controller=Yii::app()->controller->id;
		$action=Yii::app()->controller->action->id;
		$this->widget('bootstrap.widgets.TbMenu', array(
		    'type'=>'list',
		    'items' => array(
			    array('label'=>'Personal Information', 'itemOptions'=>array('class'=>'nav-header')),
			    array('label'=>'Basic Information', 'itemOptions'=>array('class'=>($action=='basicInfo')?'active':''),'url'=>Yii::app()->createUrl('hr/employee/basicInfo', array('id' => $this->emp_number))),
			    array('label'=>'Contact Details', 'itemOptions'=>array('class'=>($action=='contact')?'active':''),'url'=>Yii::app()->createUrl('hr/employee/contact', array('id' => $this->emp_number))),
			    array('label'=>'Emergency Contacts', 'itemOptions'=>array('class'=>($controller=='empEmergContact')?'active':''),'url'=>Yii::app()->createUrl('hr/empEmergContact/index', array('id' => $this->emp_number))),
			    array('label'=>'Family Background', 'itemOptions'=>array('class'=>($controller=='familyBackground')?'active':''),'url'=>Yii::app()->createUrl('hr/familyBackground/index', array('id' => $this->emp_number))),
			    //array('label'=>'Photo', 'url'=>Yii::app()->createUrl('hr/photo/index', array('id' => $this->emp_number))),

			    '',
			    array('label'=>'Employment', 'itemOptions'=>array('class'=>'nav-header')),
			    array('label'=>'Job Details','itemOptions'=>array('class'=>($action=='job')?'active':''), 'url'=>Yii::app()->createUrl('hr/employee/job', array('id' => $this->emp_number))),
			    //array('label'=>'Salary Profile', 'url'=>'#'),
			    '',
			    array('label'=>'Qualification', 'itemOptions'=>array('class'=>'nav-header')),
			    array('label'=>'Work Experience','itemOptions'=>array('class'=>($controller=='workExperience')?'active':''), 'url'=>Yii::app()->createUrl('hr/workExperience/index', array('id' => $this->emp_number))),
			    array('label'=>'Education','itemOptions'=>array('class'=>($controller=='education')?'active':''), 'url'=>Yii::app()->createUrl('hr/education/index', array('id' => $this->emp_number))),
			    array('label'=>'Licenses','itemOptions'=>array('class'=>($controller=='license')?'active':''), 'url'=>Yii::app()->createUrl('hr/license/index', array('id' => $this->emp_number))),
			    array('label'=>'Trainings & Seminars','itemOptions'=>array('class'=>($controller=='training')?'active':''), 'url'=>Yii::app()->createUrl('hr/training/index', array('id' => $this->emp_number))),
			    //'',
			    //array('label'=>'Other', 'itemOptions'=>array('class'=>'nav-header')),
			    //array('label'=>'Attachments', 'url'=>Yii::app()->createUrl('hr/attachment/index', array('id' => $this->emp_number))),
		    )
		));
	?>
	</div><!-- sidebar -->
</div>
<div class="span8">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>