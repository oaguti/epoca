<?php
$item = 7;
include('header.php');
?>
<section id="portfolio">
        <div class="container">
            <div class="center">
               <h2><?php echo MENU7 ?></h2>
               <p class="lead"><?php echo GALL1 ?></p>
            </div>
            <ul class="portfolio-filter text-center">
                
                <?php listar_cat($idioma_actual) ?>
            </ul><!--/#portfolio-filter-->
            <div class="row">
                <div class="portfolio-items">
                    <?php galeria($idioma_actual) ?>
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
<?php include('footer.php');?>