<?php
/* @var $this RecursoController */
/* @var $dataProvider CActiveDataProvider 

$this->breadcrumbs=array(
	'Recursos',
);*/

?>

<h3>Recursos</h3>
<?php 
//Menu de usuario normal
if(isset(Yii::app()->session['admin']))
$this->widget('bootstrap.widgets.TbButtonGroup', array(
    'type' => null,
    'buttons' => array(
        array('label'=>'Agregar recurso','url'=>'index.php?r=recurso/create','icon'=>'plus'),
        array('label'=>'Ver recursos agregados','url'=>'index.php?r=recurso/added','icon'=>'eye-open'),
		array('label'=>'Moderar recursos','url'=>'index.php?r=recurso/added','icon'=>'eye-open'),
        array('label'=>'Información personal','url'=>'index.php?r=usuario/view&id='.Yii::app()->session['id'],'icon'=>'user'),
    ),
)); ?>
<div class="row-fluid">
<div class="span2"></div>
<div class="span10">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,

	'itemView'=>'_view',
)); 

?>
</div>


</div>

