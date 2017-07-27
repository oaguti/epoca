<?php
$item = 2;
include('header.php');
?>
<section id="habitacion" >
    <div class="container">
            <div class="center wow fadeInDown">
                <h2><?php echo MENU2 ?></h2>
            </div>
            <!-- about us slider -->
            <div id="about-slider">
                <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-xs">
                        <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-slider" data-slide-to="1"></li>
                        <li data-target="#carousel-slider" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="images/cs2.jpg" class="img-responsive" alt=""> 
                       </div>
                       <div class="item">
                            <img src="images/cs1.jpg" class="img-responsive" alt=""> 
                       </div>
                       <div class="item">
                            <img src="images/cs3.jpg" class="img-responsive" alt=""> 
                       </div>
                    </div>
                    
                    <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
                        <i class="fa fa-angle-left"></i> 
                    </a>
                    
                    <a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
                        <i class="fa fa-angle-right"></i> 
                    </a>
                </div> <!--/#carousel-slider-->
            </div><!--/#about-slider-->
            <div class="get-started center wow fadeInDown">
                <?php  mostrar_contenido($idioma_actual,$item,1) ?>
                
            </div><!--/.get-started-->
    </div><!--/#container-->
</section>
<?php include('footer.php');?>