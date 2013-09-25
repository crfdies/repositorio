<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h3>Inicio de sesión</h3>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

		<?php echo $form->labelEx($model,'Usuario:'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	
		<?php echo $form->labelEx($model,'Contraseña:'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	<br />
		
		<?php // echo CHtml::submitButton('Login'); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'Iniciar sesión',
			'type'=>'inverse', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'size'=>'normal', // null, 'large', 'small' or 'mini'
			'buttonType'=>'submit',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'Registrarse',
			'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'size'=>'normal', // null, 'large', 'small' or 'mini'
			'url'=>'index.php?r=usuario/create'
		)); ?>


<?php $this->endWidget(); ?>
</div><!-- form -->
