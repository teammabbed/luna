<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('header'=>'No','value'=>'$row+1'),
        'employer',
        'job_title',
        'from_date'=>array('name'=>'from_date','value'=>'date("F d, Y",strtotime($data->from_date))'),
        'to_date'=>array('name'=>'to_date','value'=>'date("F d, Y",strtotime($data->to_date))'),
        'remarks',
        'internal'=>array('name'=>'internal','value'=>'($data->internal=="Y")?"Yes":"No"'),
        'isgovernment'=>array('name'=>'isgovernment','value'=>'($data->isgovernment=="Y")?"Yes":"No"'),
        array(
            'header'=>'Actions',
            'template'=>'{delete}',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            //'deleteButtonUrl'=>'Yii::app()->createUrl("hr/employee/deleteWrkExp", array("id"=>$data->wexp_code))',
        ),
    ),

));

?>