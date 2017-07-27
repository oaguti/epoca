<?php
include('acceso.php');
include('conexion.php');
include('funciones.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="og" />
	<title>ADMINISTRADOR DE CONTENIDOS</title>
    <link href="css/admin.css" rel="stylesheet" type="text/css" />
    <link href="css/rwd.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script src="ckeditor/ckeditor.js"></script>
    <!--<link href="ckeditor/sample/sample.css" rel="stylesheet" />-->
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    	$('ul#menu li ul').hide();
    	$('ul#menu li').hover(
    			//Funcion Hover
    			function(){
    				//Escondemos otros menus
    				$('ul#menu li').not($('ul', this)).stop();
    					// Mostramos el men&uacute; que corresponde
    				$('ul', this).slideDown('fast');
    			},
    			//OnOut
    			function(){
    				// Hide Other Menus
    				$('ul', this).slideUp('fast');
    			}
    	);
    });
    </script>
</head>
<body>
<header>
    <h1>ADMINISTRADOR DE CONTENIDO</h1>
</header>
<ul id="menu">
    <li><a href="#">Contenido</a>
       <ul>
            <li><a href="listar_pagina.php">Editar</a></li>
       </ul>
    </li>
    <li><a href="#">Imagenes</a>
       <ul>
            <li><a href="agregar_imagen.php">Agregar</a></li>
            <li><a href="listar_imagen.php">Editar</a></li>
            <li><a href="eliminar_imagen.php">Eliminar</a></li>
       </ul>
    </li>
    <li><a href="listar_habitacion.php">Habitaciones</a></li>
    <li><a href="<?php echo $logoutAction ?>">Cerrar sesi&oacute;n</a></li>
</ul>
