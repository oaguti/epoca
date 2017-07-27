<?php 
$item = 4;
include('header.php');
?>
<section class="pricing-page">
        <div class="container">
            <div class="center">  
                <h2><?php echo MENU4 ?></h2>
            </div>  
            <div class="pricing-area text-center">
                <div class="row">
                <?php  
                $bt = BT_RS;
                mostrar_servicio($idioma_actual,$bt);
                ?>           
                </div>
            </div><!--/pricing-area-->
        </div><!--/container-->
</section><!--/pricing-page-->
<?php include('footer.php');?>