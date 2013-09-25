<?php
/* @var $this RecursoController */
/* @var $model Recurso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recurso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>


		<?php echo $form->labelEx($model,'r_titulo'); ?>
		<?php echo $form->textField($model,'r_titulo',array('class'=>'span9','maxlength'=>200)); ?>
		<?php echo $form->error($model,'r_titulo'); ?>



		<?php echo $form->labelEx($model,'r_descripcion'); ?>
		<?php echo $form->textArea($model,'r_descripcion',array('rows'=>6, 'class'=>'span9')); ?>
		<?php echo $form->error($model,'r_descripcion'); ?>

		<?php echo $form->labelEx($model,'r_nivel'); ?>
		<?php echo $form->dropDownList($model,'r_nivel',array('Preescolar'=>'Preescolar','Primaria'=>'Primaria','Secundaria'=>'Secundaria'),array('class'=>'span9')); ?>
		<?php echo $form->error($model,'r_nivel'); ?>

		<?php echo $form->labelEx($model,'r_grado'); ?>
		<?php echo $form->dropDownList($model,'r_grado',array('1ero'=>'1ero',
		'2do'=>'2do',
		'3ero'=>'3ero',
		'4to'=>'4to',
		'5to'=>'5to',
		'6to'=>'6to',
		'Todos'=>'Todos'),array('class'=>'span9')); ?>
		<?php echo $form->error($model,'r_grado'); ?>

		<?php echo $form->labelEx($model,'r_materia'); ?>
		<?php echo $form->dropDownList($model,'r_materia',array('Español'=>'Español',
		'Matemáticas'=>'Matemática',
		'Ciencias Naturales'=>'Ciencias naturales',
		'Historia'=>'Historia',
		'Geografía'=>'Geografía',
		'Cívica y Ética'=>'Cívica y Ética',
		'Educación Artística'=>'Educación Artística',
		'Inglés'=>'Inglés',
		'Todas'=>'Todas'),array('class'=>'span9')); ?>
		<?php echo $form->error($model,'r_materia'); ?>
		
		<?php echo $form->labelEx($model,'r_entorno'); ?>
		<?php echo $form->textField($model,'r_entorno',array('class'=>'span9','maxlength'=>240)); ?>
		<?php echo $form->error($model,'r_entorno'); ?>

		<?php echo $form->labelEx($model,'r_herramienta'); ?>
		<?php echo $form->textField($model,'r_herramienta',array('class'=>'span9','maxlength'=>245)); ?>
		<?php echo $form->error($model,'r_herramienta'); ?>

		<?php echo $form->labelEx($model,'r_enlace'); ?>
		<?php echo $form->textField($model,'r_enlace',array('class'=>'span9','maxlength'=>245)); ?>
		<?php echo $form->error($model,'r_enlace'); ?>

		<?php echo $form->labelEx($model,'r_archivo'); ?>
		<?php echo $form->fileField($model,'r_archivo'); ?>
		<?php echo $form->error($model,'r_archivo'); ?>

		<?php echo $form->labelEx($model,'r_tags'); ?>
		<?php echo $form->textField($model,'r_tags',array('class'=>'span9','maxlength'=>240)); ?>
		<?php echo $form->error($model,'r_tags'); ?>
<br>
	
		<?php 
	 $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Guardar',
    'type'=>'inverse', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
	'buttonType'=>'submit',
)); 
		
		//echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	


<?php $this->endWidget(); ?>

</div><!-- form -->