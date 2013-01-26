<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!--
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mystyle.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<div class="banner" style="width: 500px;">
	</div>
	<div  id="navbar">
		<?php $this->widget('bootstrap.widgets.TbNavbar',array(
			'type'=>'inverse',
			'fixed'=>'top',
			'fluid'=>false,
			//'brand'=>'<img src="'.Yii::app()->request->baseUrl.'/images/banner.png"></img>',
			//'brand'=>'',
			'collapse'=>'true',
			'items'=>array(
				array(
				'class'=>'bootstrap.widgets.TbMenu',
				'items'=>array(
					array('label'=>'Home', 'url'=>array('/hr/default/')),
					array('label'=>'Personnel', 'items'=>array(
						array('label'=>'New Personnel', 'url'=>array('/hr/employee/create')),
						array('label'=>'Manage employee', 'url'=>array('/hr/employee/admin')),
						//array('label'=>'Assign Supervisor', 'url'=>array('/hr/employee/supervisor')),
						//array('label'=>'Assign Position', 'url'=>array('/hr/employee/position')),
						//array('label'=>'Deactivate employee', 'url'=>array('/hr/employee/deactivate')),
					)),
					array('label'=>'Leaves', 'items'=>array(
						array('label'=>'New Leave', 'url'=>array('/hr/leave/create')),
						array('label'=>'Manage Leaves', 'url'=>array('/hr/leave/admin')),
						array('label'=>'Generate Leave Credits', 'url'=>array('/hr/leaveCredit/generate')),
					)),
					array('label'=>'User Accounts','items'=>array(
						array('label'=>'New Account', 'url'=>array('/hr/user/create')),
						array('label'=>'Generate User Accounts', 'url'=>array('/hr/user/genAcc')),
						array('label'=>'Manage Accounts', 'url'=>array('/hr/user/admin')),
						array('label'=>'Change Role', 'url'=>array('/hr/user/changeRole')),

					)),
					array('label'=>'Maintenance','items'=>array(
						array('label'=>'Office', 'url'=>array('/hr/department/index')),
						array('label'=>'Position', 'url'=>array('/hr/position/index')),
						//array('label'=>'Role', 'url'=>'/maintenance/role'),
					)),
				)),
				array(
					'class'=>'bootstrap.widgets.TbMenu',
		            'htmlOptions'=>array('class'=>'pull-right'),
		            'items'=>array(
		            	'---',
		                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
		            )),
			),
			
		)); ?>
	</div><!-- mainmenu -->
	<div class="container" style="margin-top:60px">
	<?php if(isset($this->breadcrumbs)):?>
		<?php
            //show this if user not guest
            if (!Yii::app()->user->isGuest) {
                $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                   'links' => $this->breadcrumbs,
                ));
            }//if not guest
            else
            {
                echo "<br>";
            }
        ?>
	<?php endif?>
	</div>

	<div class="container content">
		<?php echo $content; ?>
	</div>

	<div class="clear"></div>
	<hr>

	<footer class="container footer">
		<div class="row">
			<div class="span6">
				<p class="copy">
					Copyright &copy; <?php echo date('Y');?> by Luna Municipal Hall.
					All Rights Reserved.<br>
					<?php //echo Yii::powered();?>
				</p>
			</div>
		</div>
	</footer>
</body>
</html>
