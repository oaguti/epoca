<?php 
$item = 1;
include('header.php');
include('slider.php')
?>
    <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <?php  mostrar_contenido($idioma_actual,$item,1) ?>
            </div>

            <div class="row">
                
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->
    <section id="services" class="service-item">
	   <div class="container">
            <div class="center wow fadeInDown">
                <?php  mostrar_contenido($idioma_actual,$item,2) ?>
            </div>

            <div class="row">
                  <?php mostrar_hab($idioma_actual);?>                           
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->
    <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <?php  mostrar_contenido($idioma_actual,$item,3) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->    
    </section><!--/#conatcat-info-->
<?php include('footer.php');?>