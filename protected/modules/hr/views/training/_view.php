<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('header'=>'No','value'=>'$row+1'),
        'title',
        'place',
        'start_date'=>array('name'=>'start_date','value'=>'date("F d, Y",strtotime($data->start_date))'),
        'end_date'=>array('name'=>'end_date','value'=>'date("F d, Y",strtotime($data->end_date))'),
        'remarks',
        array(
            'header'=>'Actions',
            'template'=>'{delete}',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'deleteButtonUrl'=>'Yii::app()->createUrl("hr/employee/deleteTraining", array("id"=>$data->tra_code))',
        ),
    ),

));

?>