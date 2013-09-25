<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	
		<?php echo $form->labelEx($model,'usr_nombre'); ?>
		<?php echo $form->textField($model,'usr_nombre',array('class'=>'span7','maxlength'=>240)); ?>
		<?php echo $form->error($model,'usr_nombre'); ?>

		<?php echo $form->labelEx($model,'usr_apellidos'); ?>
		<?php echo $form->textField($model,'usr_apellidos',array('class'=>'span7','maxlength'=>240)); ?>
		<?php echo $form->error($model,'usr_apellidos'); ?>

		<?php echo $form->labelEx($model,'usr_usuario'); ?>
		<?php echo $form->textField($model,'usr_usuario',array('class'=>'span7','maxlength'=>30)); ?>
		<?php echo $form->error($model,'usr_usuario'); ?>

		<?php echo $form->labelEx($model,'usr_contrasenia'); ?>
		<?php echo $form->passwordField($model,'usr_contrasenia',array('class'=>'span7','maxlength'=>200)); ?>
		<?php echo $form->error($model,'usr_contrasenia'); ?>
	
		<?php echo $form->labelEx($model,'usr_correo'); ?>
		<?php echo $form->textField($model,'usr_correo',array('class'=>'span7','maxlength'=>150)); ?>
		<?php echo $form->error($model,'usr_correo'); ?>

		<?php echo $form->labelEx($model,'usr_tipo'); ?>
		<?php 
		$tipo=true;
		if(isset(Yii::app()->session['admin']) && Yii::app()->session['admin'])
			$tipo=false;
		echo $form->DropDownList($model,
			'usr_tipo',
			array('Normal'=>'Normal', 'Administrador'=>'Administrador'),
			array('class'=>'span7','disabled'=>$tipo)); 
		?>
		<?php echo $form->error($model,'usr_tipo'); ?>
<br>
		<?php 
	 $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Aceptar',
    'type'=>'inverse', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
	'buttonType'=>'submit',
)); 
?>

<?php $this->endWidget(); ?>

</div><!-- form -->