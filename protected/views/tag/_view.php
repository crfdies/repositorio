<?php
/* @var $this TagController */
/* @var $data Tag */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->t_id), array('view', 'id'=>$data->t_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_tag')); ?>:</b>
	<?php echo CHtml::encode($data->t_tag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_frecuencia')); ?>:</b>
	<?php echo CHtml::encode($data->t_frecuencia); ?>
	<br />


</div>