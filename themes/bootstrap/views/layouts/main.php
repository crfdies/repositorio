<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
	 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/general.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body style="background-color: #f4f4f4;">

<div><?php echo CHtml::encode($this->pageTitle); ?></div>
<?php 
$adm=false;
if(isset(Yii::app()->session['admin']) && Yii::app()->session['admin'])
	$adm=true;
$this->widget('bootstrap.widgets.TbNavbar',array(
	'type'=>'inverse',
	'fluid'=>'true',
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',			
            'items'=>array(	
                array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Recursos', 'url'=>array('/Recurso/index')),
				array('label'=>'Usuarios', 'url'=>array('/Usuario/index'), 'visible'=>$adm),
                array('label'=>'Iniciar sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>


<div style="margin-top:50px; margin-left:30px; font-size:36px; font-family:'Times New Roman', Times, serif;">Repositorio de recursos educativos</div>

<div class="container row-fluid" id="page">

	
    
	<?php echo $content; ?>

	
	
	<div class="clear"></div>

	<div align="center"  id="footer" style="margin-top:15px;">
	Centro Regional de Formación Docente e Investigación Educativa<br>
Blvd. Francisco Serna y Calle Galeana, local 201 y 202, Col. Las Palmas<br>
C.P. 83270, Tel. (662) 2127376, Hermosillo, Sonora, México
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
