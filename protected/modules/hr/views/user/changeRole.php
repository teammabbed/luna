<?php
$this->breadcrumbs = array(
    'Users' => array('admin'),
    'Chage User Roles',
);

$this->menu = Department::model()->departments;
?>

<h2>Change User Role</h2>

<?php if(isset($_GET['id'])): ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'emp-list',
	'dataProvider'=>$dataProvider,
	'type'=>'striped',
	'template'=>'{items}',
	'columns'=>array(
		array('header'=>'No.','value'=>'$row+1'),
		array('value'=>'$data->employee->fullname','header'=>'Employee Name'),
		array(
			'header'=>'Role',
			'type'=>'raw',
			'value'=>'CHtml::dropDownList("role", $data->role, array("HrAdmin"=>"HR Admin","Head"=>"Head","SuperAccountant"=>"Super Accountant","User"=>"User","Accountant"=>"Accountant"),
					array("id"=>$data->username,
						"ajax"=>array(
							"type"=>"POST",
							"url"=>Yii::app()->createUrl("users/user/updateRole"),
							"data"=>"js:\"role=\" +$(this).val() + \"&id=\"+$(this).attr(\'id\').trim()",
							"success"=>"function(data){}"
						),
						"class"=>"span7",
					));'
		),
	)
));
?>
<?php endif;?>

