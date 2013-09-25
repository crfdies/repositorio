<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usr_id'); ?>
		<?php echo $form->textField($model,'usr_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usr_nombre'); ?>
		<?php echo $form->textField($model,'usr_nombre',array('size'=>60,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usr_apellidos'); ?>
		<?php echo $form->textField($model,'usr_apellidos',array('size'=>60,'maxlength'=>240)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usr_usuario'); ?>
		<?php echo $form->textField($model,'usr_usuario',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usr_contrasenia'); ?>
		<?php echo $form->textField($model,'usr_contrasenia',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usr_fecha'); ?>
		<?php echo $form->textField($model,'usr_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usr_correo'); ?>
		<?php echo $form->textField($model,'usr_correo',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usr_tipo'); ?>
		<?php echo $form->textField($model,'usr_tipo',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->