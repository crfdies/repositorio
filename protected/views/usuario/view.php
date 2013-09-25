<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->usr_id,
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'Update Usuario', 'url'=>array('update', 'id'=>$model->usr_id)),
	array('label'=>'Delete Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usr_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<h3>Usuario <?php echo $model->usr_nombre.' '.$model->usr_apellidos; ?></h3>

<div class="row-fluid">
<div class="span9">

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usr_nombre',
		'usr_apellidos',
		'usr_usuario',
		'usr_fecha',
		'usr_correo',
		'usr_tipo',
	),
)); ?>
</div>
<div class="span3">
<?php 
//Menu de opciones para el administrador o para el el usuario.
if((isset(Yii::app()->session['admin']) && Yii::app()->session['admin']) || Yii::app()->session['id']==$model->usr_id)
$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>true, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Actualizar', 
			'icon'=>'pencil',
			'url'=>'index.php?r=usuario/update&id='.$model->usr_id),
        
		array('label'=>'Borrar', 
			'visible'=>Yii::app()->session['admin'], 
			'icon'=>'remove',
			'url'=>'#',
			'linkOptions'=>array('submit'=>array('delete','id'=>$model->usr_id),'confirm'=>'¿Está seguro que desea borrar el elemento seleccionado?' )),		
       
	   array('label'=>'Agregar nuevo usuario', 
			'visible'=>isset(Yii::app()->session['admin']) ? Yii::app()->session['admin'] : false,
			'icon'=>'plus',
			'url'=>'index.php?r=recurso/create'),	
		 
		 array('label'=>'Lista de usuarios', 
			'visible'=>isset(Yii::app()->session['admin']) ? Yii::app()->session['admin'] : false,
			'icon'=>'plus',
			'url'=>'index.php?r=usuario/admin'),	
    ),
));
?>
</div>
</div>