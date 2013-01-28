<?php
$this->breadcrumbs=array(
	'User',
);
?>

<div class="page-header">
	  <h2>Manage Users</h2>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>'striped',
	'columns'=>array(
		array('header'=>'No.','value'=>'$row+1'),
		'username',
		array('header'=>'Employee Number', 'name'=>'emp_number','value'=>'$data->emp_number'),
		array('header'=>'Employee Name','name'=>'fullname', 'value'=>'$data->employee->fullname'),
		array('name'=>'role','value'=>'ucfirst($data->role)'),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}{delete}',
			'header'=>'Action',
		),
	),
)); ?>