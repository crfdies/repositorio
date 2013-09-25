<?php
/* @var $this RecursoController */
/* @var $model Recurso */

$this->breadcrumbs=array(
	'Recursos'=>array('index'),
	$model->r_id=>array('view','id'=>$model->r_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Recurso', 'url'=>array('index')),
	array('label'=>'Create Recurso', 'url'=>array('create')),
	array('label'=>'View Recurso', 'url'=>array('view', 'id'=>$model->r_id)),
	array('label'=>'Manage Recurso', 'url'=>array('admin')),
);
?>

<h1>Update Recurso <?php echo $model->r_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>