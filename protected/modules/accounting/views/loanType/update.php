<?php
$this->breadcrumbs=array(
	'Loan Types'=>array('index'),
	'Update',
);
?>


<div class="page-header">
	  <h2>Update <?php echo $model->agency."|".$model->description; ?></h2>
</div>

<?php
	$this->renderPartial('_form',array('model'=>$model));
?>