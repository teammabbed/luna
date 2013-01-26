<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('header'=>'No','value'=>'$row+1'),
        'license_description',
        'license_number',
        'license_date'=>array('name'=>'license_date','value'=>'date("F d, Y",strtotime($data->license_date))'),
        'renewal_date'=>array('name'=>'renewal_date','value'=>'date("F d, Y",strtotime($data->renewal_date))'),
        array(
            'header'=>'Actions',
            'template'=>'{delete}',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'deleteButtonUrl'=>'Yii::app()->createUrl("hr/employee/deleteLinc", array("id"=>$data->license_code))',
        ),
    ),

));

?>