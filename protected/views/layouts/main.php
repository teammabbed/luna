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
	<?php $this->widget('bootstrap.widgets.TbNavbar',array(
			'type'=>'inverse',
			'fixed'=>'top',
			'fluid'=>false,
			//'brand'=>'<img src="'.Yii::app()->request->baseUrl.'/images/banner.png"></img>',
			'brand'=>'',
			'collapse'=>'true',
			'items'=>array(
			),	
		)); ?>

	<div class="container content" style="margin-top: 80px;">
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
