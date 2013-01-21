<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span3">
	<div id="profilepic">
		<a href="#" class="thumbnail" rel="tooltip" data-title="Tooltip" data-original-title="Profile Picture" style="width: 200px; height: 200px; margin-right:auto; margin-left:auto;">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/blank.png" alt="">
		</a>
	</div>
	<br>
	<div>
	<?php 
	$this->widget('zii.widgets.jui.CJuiAccordion', array(
		'panels'=>array(
			'Personal Information'=>'
				<ul class="nav nav-list">
	            <li><a href="index.php?r=profile/employee/personal">Personal Details</a></li>
	            <li><a href="index.php?r=profile/employee/ids">Idendification Numbers</a></li>
	            <li><a href="index.php?r=profile/employee/contacts">Contact Details</a></li>
	            <li><a href="index.php?r=profile/empEmergencyContact/view">Emergency Contacts</a></li>
	            <li><a href="index.php?r=profile/empDependent/view">Dependents</a></li>
	            <li><a href="index.php?r=profile/empPicture/view">Photo</a></li>
	           	</ul>
			',
			'Employment'=>'
				<ul class="nav nav-list">
				<li><a href="index.php?r=profile/employee/job">Job Details</a></li>
            	<li><a href="index.php?r=profile/employee/salary">Salary Details</a></li>
            	</ul>
			',
			'Qualification'=>'
				<ul class="nav nav-list">
				<li><a href="index.php?r=profile/empWorkExperience/view">Work Experience</a></li>
	            <li><a href="index.php?r=profile/empEducation/view">Education</a></li>
	            <li><a href="index.php?r=profile/empLicense/view">Licenses</a></li>
	            <li><a href="index.php?r=profile/empTraining/view">Seminars</a></li>
	            </ul>
			',
			'Account'=>'
				<ul class="nav nav-list">
				<li><a href="index.php?r=profile/account/renewPassword">Change Password</a></li>
            	<li><a href="index.php?r=profile/account/renewUsername">Change Username</a></li>
            	</ul>
			',
			'Other'=>'
				<ul class="nav nav-list">
				<li><a href="index.php?r=profile/empAffiliation/view">Professional Affiliations</a></li>
	            <li><a href="index.php?r=profile/empCivic/view">Civic Affiliations</a></li>
	            <li><a href="index.php?r=profile/empAward/view">Awards</a></li>
	            <li><a href="index.php?r=profile/empAttachment/view">Attachments</a></li>
	            </ul>
			',
			// panel 3 contains the content rendered by a partial view
			// 'panel 3'=>$this->renderPartial('_partial',null,true),
		),
		// additional javascript options for the accordion plugin
		'options'=>array(
			'animated'=>'bounceslide',
		),
	));
	?>
	</div>

</div>
<div class="span8">
	<?php echo $content; ?>
</div>
<?php $this->endContent(); ?>

