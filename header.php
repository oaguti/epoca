<?php
include('admin/conexion.php');
if (!isset($_SESSION)) {
  session_start();
}
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_POST['idioma'])) {
    $_SESSION['idioma'] = $_POST['idioma'];
    $idioma_actual = $_SESSION['idioma'];
} else {
    if(isset($_SESSION['idioma'])){
        $idioma_actual = $_SESSION['idioma'];
    } else {
        $idioma_actual = 2;
    }
}
if($idioma_actual == 1){
    include('include/lang_es.php');
} else {
    include('include/lang_us.php');
}
include('include/funciones.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>EPOCA - IQUITOS - PERU</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="js/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script>
    
        var estado = 0; 
        function enviar_idioma(){ 
           document.form_idioma.submit(); 
        }

        function submenu(){
            if(estado==0){
                $('.submenu').fadeIn();
                estado = 1;
            } else {
                $('.submenu').fadeOut();
                estado = 0;
            }
            
        }
        function submenu_off() {
            if(estado == 1){
                $('.submenu').fadeOut();
                estado = 0;
            }
            
        }
    
    </script>
</head><!--/head-->
<body class="homepage">
<a href="images/promo.jpg" class="fancybox"></a>
    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-xs-12">
                        <ul class="top-number">
                            <li class="top-dato"><a href="contacto.php"><i class="fa fa-map-marker"></i> Ramirez Hurtado 616, Iquitos</a></li> 
                            <li class="top-dato"><i class="fa fa-phone-square"></i>  +51 65 224172 </li>  
                            <li class="top-dato"><i class="fa fa-envelope" ></i> reservas@epoca.com.pe</li> 
                            <li class="top-dato"><img src="images/tarjetas.png"></li>

                        </ul>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                       <div class="social">
                            
                            <div class="idioma">
                                <span><?php echo LANG ?></span>
                                <form id="form_idioma" name="form_idioma" method="POST" action="<?php echo $loginFormAction; ?>">
                                <select id="idioma" name="idioma" onchange="enviar_idioma()">
                                    <option value="1" <?php if($idioma_actual == 1) echo 'selected="selected"'?>>Español</option>
                                    <option value="2" <?php if($idioma_actual == 2) echo 'selected="selected"'?>>English</option>

                                </select>
                                </form>
                           </div>
                           <ul class="social-share">
                                <li><a href="https://www.facebook.com/Época-Iquitos-930608763666885/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li> 
                                
                            </ul>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="wrap_menu">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" alt="logo"></a>
                </div>
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li <?php if($item == 1) {echo 'class="active"';}?> ><a href="index.php" onmouseover="submenu_off()"><?php echo MENU1 ?></a></li>
                        <li <?php if($item == 2) {echo 'class="active"';}?>><a href="casa.php" onmouseover="submenu_off()"><?php echo MENU2 ?></a></li>
                        <li <?php if($item == 3) {echo 'class="active"';}?>><a href="#" onClick="submenu()"><?php echo MENU3 ?></a>
                            <ul class="submenu" >
                                <?php listar_hab($idioma_actual);?>
                            </ul>
                        </li>
                        <li <?php if($item == 4) {echo 'class="active"';}?>><a href="servicios.php" onmouseover="submenu_off()"><?php echo MENU4 ?></a></li>
                        <li <?php if($item == 5) {echo 'class="active"';}?>><a href="reserva.php" onmouseover="submenu_off()"><?php echo MENU5 ?></a></li>
                        <li <?php if($item == 6) {echo 'class="active"';}?>><a href="tours.php" onmouseover="submenu_off()"><?php 
                            echo MENU6 ?></a></li>
                         <li <?php if($item == 7) {echo 'class="active"';}?>><a href="galeria.php" onmouseover="submenu_off()"><?php echo MENU7 ?></a></li>
                        <li <?php if($item == 8) {echo 'class="active"';}?>><a href="premios.php" onmouseover="submenu_off()"><?php echo MENU8 ?></a></li>
                        <li <?php if($item == 9) {echo 'class="active"';}?>><a href="promo.php" onmouseover="submenu_off()"><?php echo MENU9 ?></a></li>
                        <li <?php if($item == 10) {echo 'class="active"';}?>><a href="contacto.php" onmouseover="submenu_off()"><?php echo MENU10 ?></a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
    <?php
    if($item!=1&&$item!=5) {
        include('include/form_reserva.php');
        }
    echo    '<script languaje="JavaScript">        
            var varjs='.$item.';
            </script>';
    ?>

    