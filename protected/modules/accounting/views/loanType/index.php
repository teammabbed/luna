<?php
$this->breadcrumbs=array(
	'Loan Types'
);
?>

<div class="page-header">
	  <h2>Create Loan types</h2>
</div>

<div class="span11">

	<?php
	$this->widget('bootstrap.widgets.TbTabs', array(
		'type' => 'tabs',
		'htmlOptions'=>array('class'=>'tabs-top'),
		'tabs' => array(
			array('label' => 'Manage', 'content' => $this->renderPartial('_view', array(
					'model'=>$model,
				), true), 'active' => (!$model_new->hasErrors())
			),

			array('label' => 'Create', 'content' => $this->renderPartial('_form', array(
					'model'=>$model_new,
				), true),'active' => ($model_new->hasErrors())
			),
	)));
	?>


</div>
