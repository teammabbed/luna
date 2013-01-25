<?php $this->beginContent('/layouts/main'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span4 well">
           <?php 
                $actionId = $this->getAction()->getId();
                $control = Yii::app()->controller->id;
                $module=Yii::app()->controller->module->id;
                $department = Department::model()->findAll(array('order' => 'shortname'),'dept_code','shortname');

                if($department){

                    foreach ($department as $dept) 
                    {
                        $criteria=new CDbCriteria;
                        $criteria->select='emp_number,emp_lname,emp_fname';
                        $criteria->condition='dept_code=:dept and isActive = "Y"';
                        $criteria->order='emp_lname';
                        $criteria->params=array(':dept'=>$dept->dept_code);

                        $employee = Employee::model()->findAll($criteria);

                        $list = "<ul class=\"nav nav-list\">";

                        foreach($employee as $emp)
                        {
                            $list .= "<li><a href='".Yii::app()->baseUrl ."/index.php?r=".$module."/".$control."/".$actionId."&emp_number=".$emp->emp_number."'>" . $emp->emp_lname . ", ". $emp->emp_fname ."</a></li>";
                        }
                          
                        $list .= "</ul>";
                          
                        $panel[$dept->shortname] = $list;
                    }  

                }
                else
                {
                    $panel = array('Empty'=>'No Department.');
                }
                

                $this->widget('zii.widgets.jui.CJuiAccordion', array(
                    'panels'=>$panel,
                    'options' => array(
                        'navigation' => true,
                        'clearStyle' => true,
                        'active' => false,
                    ),
                ));
           ?>
        </div>
        <div class="span7">
            <?php echo $content; ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>