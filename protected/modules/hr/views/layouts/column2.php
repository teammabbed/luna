<?php $this->beginContent('/layouts/main'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3 well">

            <ul class="nav nav-list">
               
                <li class="nav-header">
                    <i class='icon-home'></i> Departments</a>
                </li>
                <?php
                foreach ($this->menu as $key=>$item) {
                    $dept_code=isset($this->dept)?$this->dept:0;
                    $classActive=($key==$dept_code)?"class='active'":"";
                    echo "<li $classActive><a href=index.php?r=".Yii::app()->controller->module->id."/".Yii::app()->controller->id."/".Yii::app()->controller->action->id."&id=".$key.">&nbsp;&nbsp;&nbsp;&nbsp;" . $item . " </a></li>";
                }
                ?>
            </ul>

        </div>
        <div class="span8">
            <?php echo $content; ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>
