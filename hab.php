<?php
if(isset($_GET['hab'])){
        $id_tab = $_GET['hab'];
    } else {
        $id_tab = 1;
    }
$item = 0;
include('header.php');
?>
<section id="habitacion" >
    <div class="container">
            <div class="center wow fadeInDown">
                <h2><?php echo MENU3 ?></h2>
            </div>
                <?php include('include/slider.php');?>
            <div class="get-started center wow fadeInDown">
                <?php contenido($id_tab,$idioma_actual);?>
            </div><!--/.get-started-->
            <div class="wrap_bt"><a href="reserva.php?habit=<?php echo $id_tab;?>" class="boton_rv"><i class="fa fa-key" aria-hidden="true"></i> <?php echo BT_RS ?></a></div>
    </div><!--/#container-->
</section>
<?php include('footer.php');?>