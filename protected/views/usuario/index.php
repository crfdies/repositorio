<?php
/* @var $this UsuarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<h1>Usuarios</h1>

<div class="row-fluid">
<div class="span10">
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>'striped bordered condensed',
	'columns'=>array(
		'usr_nombre',
		'usr_apellidos',
		'usr_usuario',
		'usr_fecha',
		'usr_tipo',
		/*
		'usr_correo',
		
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
 ?>
 </div>
 <div class="span2">
 <?php
 $this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
		'stacked'=>true, // whether this is a stacked menu
		'items'=>array(					
			array('label'=>'Agregar usuario','icon'=>'plus', 'url'=>'index.php?r=usuario/create'),
			array('label'=>'Datos personales', 'url'=>'index.php?r=usuario/view&id='.Yii::app()->session['id'],'icon'=>'user'),		
		),
	));
	?>
 </div>
 
 </div>