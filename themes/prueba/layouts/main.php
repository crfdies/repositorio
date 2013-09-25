<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/general.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<div class="container span-12" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	
		<?php $this->widget('bootstrap.widgets.TbNavbar',array(
	'type'=>'inverse',
	'fluid'=>'true',
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',			
            'items'=>array(
                array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Recursos', 'url'=>array('/Recurso/index')),
				array('label'=>'Usuarios', 'url'=>array('/Usuario/index'), 'visible'=>isset(Yii::app()->session['admin'])),
                array('label'=>'Iniciar sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>
	<!-- mainmenu -->
	
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">

	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
