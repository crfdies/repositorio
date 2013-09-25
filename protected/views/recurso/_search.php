<?php
/* @var $this RecursoController */
/* @var $model Recurso */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


		
	
		<?php echo $form->label($model,'r_titulo'); ?>
		<?php echo $form->textField($model,'r_titulo',array('size'=>60,'maxlength'=>200)); ?>
	
		<?php echo $form->label($model,'r_descripcion'); ?>
		<?php echo $form->textArea($model,'r_descripcion',array('rows'=>6, 'cols'=>50)); ?>
	
		<?php echo $form->label($model,'r_grado'); ?>
		<?php echo $form->textField($model,'r_grado',array('size'=>60,'maxlength'=>100)); ?>
	
		<?php echo $form->label($model,'r_materia'); ?>
		<?php echo $form->textField($model,'r_materia',array('size'=>60,'maxlength'=>150)); ?>
	
		<?php echo $form->label($model,'r_nivel'); ?>
		<?php echo $form->textField($model,'r_nivel',array('size'=>60,'maxlength'=>150)); ?>
	
		<?php echo $form->label($model,'r_entorno'); ?>
		<?php echo $form->textField($model,'r_entorno',array('size'=>60,'maxlength'=>240)); ?>
	
		<?php echo $form->label($model,'r_herramienta'); ?>
		<?php echo $form->textField($model,'r_herramienta',array('size'=>60,'maxlength'=>245)); ?>
	
		
		<?php echo $form->label($model,'r_fechaC'); ?>
		<?php echo $form->textField($model,'r_fechaC'); ?>
	
		<?php echo $form->label($model,'r_tags'); ?>
		<?php echo $form->textField($model,'r_tags',array('size'=>60,'maxlength'=>240)); ?>
	<br />
		<?php echo CHtml::submitButton('Buscar'); ?>


<?php $this->endWidget(); ?>

</div><!-- search-form -->