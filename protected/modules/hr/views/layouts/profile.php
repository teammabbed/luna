<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
<div class="span3">
	<div id="sidebar" class="well">
	<?php
		$this->widget('bootstrap.widgets.TbMenu', array(
		    'type'=>'list',
		    'items' => array(
			    array('label'=>'Personal Information', 'itemOptions'=>array('class'=>'nav-header')),
			    array('label'=>'Contact Details', 'url'=>Yii::app()->createUrl('hr/employee/basicInfo', array('id' => $this->emp_number))),
			    array('label'=>'Contact Details', 'url'=>Yii::app()->createUrl('hr/employee/contact', array('id' => $this->emp_number))),
			    array('label'=>'Emergency Details', 'url'=>Yii::app()->createUrl('hr/empEmergContact/index', array('id' => $this->emp_number))),
			    array('label'=>'Dependents', 'url'=>Yii::app()->createUrl('hr/employee/dependent', array('id' => $this->emp_number))),
			    '',
			    array('label'=>'Employment', 'itemOptions'=>array('class'=>'nav-header')),
			    array('label'=>'Job Details', 'url'=>Yii::app()->createUrl('hr/employee/job', array('id' => $this->emp_number))),
			    array('label'=>'Salary Profile', 'url'=>'#'),
			    '',
			    array('label'=>'Qualification', 'itemOptions'=>array('class'=>'nav-header')),
			    array('label'=>'Work Experience', 'url'=>Yii::app()->createUrl('hr/workExperience/index', array('id' => $this->emp_number))),
			    array('label'=>'Education', 'url'=>Yii::app()->createUrl('hr/education/index', array('id' => $this->emp_number))),
			    array('label'=>'Licenses', 'url'=>'#'),
			    array('label'=>'Seminars', 'url'=>'#'),
			    '',
			    array('label'=>'Other', 'itemOptions'=>array('class'=>'nav-header')),
			    array('label'=>'Affiliation', 'url'=>'#'),
			    array('label'=>'Attachments', 'url'=>'#'),
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