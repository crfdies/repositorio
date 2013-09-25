<?php
/* @var $this RecursoController */
/* @var $data Recurso */
?>

<div class="view vistaInd">
	<div class="tituloView"> 
	<?php echo CHtml::encode($data->r_materia); ?>
	</div>
	<b><?php echo CHtml::encode($data->getAttributeLabel('r_titulo')); ?>:</b>
	<?php echo CHtml::link( CHtml::encode($data->r_titulo),array('view', 'id'=>$data->r_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->r_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_grado')); ?>:</b>
	<?php echo CHtml::encode($data->r_grado); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('r_nivel')); ?>:</b>
	<?php echo CHtml::encode($data->r_nivel); ?>
	<br />
<?php /*
	<b><?php  echo CHtml::encode($data->getAttributeLabel('r_entorno')); ?>:</b>
	<?php echo CHtml::encode($data->r_entorno); ?>
	<br />

	
	<b><?php  echo CHtml::encode($data->getAttributeLabel('r_tema')); ?>:</b>
	<?php echo CHtml::encode($data->r_tema); ?>
	<br />

	<b><?php  echo CHtml::encode($data->getAttributeLabel('r_herramienta')); ?>:</b>
	<?php echo CHtml::encode($data->r_herramienta); ?>
	<br />

	<b><?php  echo CHtml::encode($data->getAttributeLabel('r_enlace')); ?>:</b>
	<?php echo CHtml::encode($data->r_enlace); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_archivo')); ?>:</b>
	<?php echo CHtml::encode($data->r_archivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_fechaC')); ?>:</b>
	<?php echo CHtml::encode($data->r_fechaC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usr_id')); ?>:</b>
	<?php echo CHtml::encode($data->usr_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_tags')); ?>:</b>
	<?php echo CHtml::encode($data->r_tags); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r_estado')); ?>:</b>
	<?php echo CHtml::encode($data->r_estado); ?>
	<br />

	*/ ?>

</div>