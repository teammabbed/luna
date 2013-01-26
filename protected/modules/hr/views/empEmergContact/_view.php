<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('header'=>'No','value'=>'$row+1'),
        'name',
        'relationship',
        'contact_no',
        'address',
        array(
            'header'=>'Actions',
            'template'=>'{delete}',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'deleteButtonUrl'=>'Yii::app()->createUrl("hr/employee/deleteEmerContact", array("id"=>$data->eec_code))',
        ),
    ),

));

?>