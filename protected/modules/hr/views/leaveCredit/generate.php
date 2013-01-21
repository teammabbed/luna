<?php
$this->breadcrumbs=array(
	'Generate Leave Credits'
);
?>

<h1>Generate Leave Credits</h1>
<h4>Note: Existing Leave Credits will NOT be overwritten</h4>


<?php
	// Date Array
	$date=date('Y');
	$period=array();
	for($x=$date-5;$x<=$date+5;$x++){
		$period[$x]=$x;
	}


?>

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
<?php echo $form->dropDownListRow($model,'leave_year',$period,array());?>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Generate','type'=>'primary')); ?> 
</div>
<?php $this->endWidget();?>

<?php $this->endWidget();?>

<script>
	$(document).ready(function(){
		alert($(':checkbox').click(function(
			alert($(this).checked);
		));

	});

</script>
