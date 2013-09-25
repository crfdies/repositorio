<?php
/* @var $this RecursoController */
/* @var $model Recurso */


$this->menu=array(
	array('label'=>'List Recurso', 'url'=>array('index')),
	array('label'=>'Create Recurso', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#recurso-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Buscar recursos</h1>


<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'recurso-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
	'filter'=>$model,
	'columns'=>array(
		'r_titulo',
		'r_descripcion',
		'r_grado',
		'r_materia',
		'r_nivel',
		/*
		'r_entorno',
		'r_tema',
		'r_herramienta',
		'r_enlace',
		'r_archivo',
		'r_fechaC',
		'usr_id',
		'r_tags',
		'r_estado',
		*/
		
	),
)); ?>
