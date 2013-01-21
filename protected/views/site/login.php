<?php
/**
 * login.php
 *
 * Example page <given as is, not even checked styles>
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/23/12
 * Time: 12:27 AM
 */
$this->pageTitle = 'Login';
$this->breadcrumbs = array(
	'Login',
);
?>
<div class="row-fluid">
    <div id="sidebar" class="span4">
        <h2>Login</h2>


        <?php
        /** @var BootActiveForm $form */
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array('validateOnSubmit'=>true,),
            'htmlOptions' => array('class' => 'well'),
        ));
        ?>

        <?php echo $form->textFieldRow($model, 'username', array('class' => 'span12')); ?>
        <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span12')); ?>
        <?php echo $form->checkboxRow($model, 'rememberMe'); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type' => 'primary', 'label' => 'Login')); ?>

<?php $this->endWidget(); ?>


    </div><!-- form -->