<?php
$this->breadcrumbs=array(
	'User'=>array('admin'),
	'Generate User Accounts',
);
?>


<div class="page-header">
	<h2>Generate User Accounts</h2>
	<h4>Note: Existing User Accounts will NOT be overwritten.<br>Default role is User.</h4>
</div>

<?php $this->widget('bootstrap.widgets.TbAlert'); ?>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Offices',
	'headerIcon' => 'icon-home',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<!--Table Content-->
<?php
 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'leaves-credit-form',
    'type'=>'horizontal',
)); ?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'type' => 'striped',
	'dataProvider' => $dataProvider,
	'template' => '{items}',
	'selectableRows'=>2,
	'columns' =>array(
		array('header'=>'No.','value'=>'$row+1'),
		'name',
		array(
			'class'=>'CCheckBoxColumn',
			'id'=>'selectedItems',
		),

	),

));

?>
<br>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Generate','type'=>'primary','icon'=>'refresh white')); ?> 
</div>
<?php $this->endWidget();?>

<?php $this->endWidget();?>
