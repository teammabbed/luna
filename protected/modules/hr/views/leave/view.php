<?php
$this->breadcrumbs=array(
	'Leaves'=>array('admin'),
	$model->employee->fullname,
);
?>

<h3>View Leave</h3>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs',
	'htmlOptions' => array('class'=> 'tabs-left'),
	'tabs' => array(
		array('label' => 'General Data', 'content' => $this->renderPartial('_genview', array(
			'model'=>$model), true), 'active' => true
		),
		array('label' => 'Inclusive Dates', 'content' => $this->renderPartial('_detailgrid', array(
				'leaveDetails'=>$leaveDetails,
			), true)), 
)));
?>

