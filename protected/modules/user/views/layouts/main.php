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
			'collapse'=>'true',
			'items'=>array(
				array(
				'class'=>'bootstrap.widgets.TbMenu',
				'items'=>array(
					array('label'=>'Home', 'url'=>array('/user/default/')),
					array('label'=>'Profile', 'url'=>array('/user/employee/index')),
					array('label'=>'Leaves', 'url'=>array('/user/leaves/')),
					array('label'=>'Payroll', 'url'=>array('/user/index/')),
					array('label'=>'Downloads', 'url'=>array('/user/downloads/')),
				)),
				array(
					'class'=>'bootstrap.widgets.TbMenu',
		            'htmlOptions'=>array('class'=>'pull-right'),
		            'items'=>array(
		            	'----',
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
