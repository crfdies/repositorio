<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usr_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usr_id), array('view', 'id'=>$data->usr_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usr_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->usr_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usr_apellidos')); ?>:</b>
	<?php echo CHtml::encode($data->usr_apellidos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usr_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usr_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usr_contrasenia')); ?>:</b>
	<?php echo CHtml::encode($data->usr_contrasenia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usr_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->usr_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usr_correo')); ?>:</b>
	<?php echo CHtml::encode($data->usr_correo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('usr_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->usr_tipo); ?>
	<br />

	*/ ?>

</div>