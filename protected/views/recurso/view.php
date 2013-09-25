<?php
/* @var $this RecursoController */
/* @var $model Recurso */

$this->breadcrumbs=array(
	'Recursos'=>array('index'),
	$model->r_id,
);

<h3><?php echo $model->r_titulo; ?></h3>

<div class="row-fluid">
<div class="span9">
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'r_id',
		'r_titulo',
		'r_descripcion',
		'r_grado',
		'r_materia',
		'r_nivel',
		'r_entorno',
		'r_tema',
		'r_herramienta',
		'r_enlace',
		'r_archivo',
		'r_fechaC',
		array(  
            'label'=>'Usuario',
            'type'=>'raw',
            'value'=>CHtml::link($model->usuario->usr_nombre.' '.$model->usuario->usr_apellidos, array('usuario/view', 'id'=>($model->usuario->usr_id))),
        ),
		'r_tags',
		array(  
            'label'=>'Estado',
            'type'=>'raw',
            'value'=>$model->r_estado>=2 ? 'Aprobado':'Pendiente',
        ),
	),
)); ?>
</div>
<div class="span3">
<?php 
//Menu de opciones para el administrador o para el autor del recurso.
if((isset(Yii::app()->session['admin']) && Yii::app()->session['admin']) || Yii::app()->session['id']==$model->usr_id)
	$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
		'stacked'=>true, // whether this is a stacked menu
		'items'=>array(
			array('label'=>'Actualizar','icon'=>'pencil', 'url'=>'index.php?r=recurso/update&id='.$model->r_id),
			array('label'=>'Borrar', 'icon'=>'remove','url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->r_id),'confirm'=>'¿Está seguro que desea borrar el elemento seleccionado?')),		
			array('label'=>'Agregar nuevo recurso','icon'=>'plus', 'url'=>'index.php?r=recurso/create'),
			array('label'=>'Datos personales', 'url'=>'index.php?r=usuario/view&id='.Yii::app()->session['id'],'icon'=>'user'),		
		),
	));
?>
</div>
</div>