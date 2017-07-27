<?php 
$item = 4;
include('header.php');
mysql_select_db($database_demo, $demo);
$query_lista = "SELECT id,prod,imagen FROM promo WHERE estado = 1 AND prod = '".$q."' ORDER BY id ASC";
$lista = mysql_query($query_lista, $demo) or die(mysql_error());
$row_lista = mysql_fetch_assoc($lista);
$totalRows_lista = mysql_num_rows($lista);
?>
<section class="pricing-page">
        <div class="container">
            <div class="center">  
                <h2><?php echo MENU9 ?></h2>
            </div>  
            <div class="pricing-area text-center">
                <div class="row">
                         
                </div>
            </div><!--/pricing-area-->
        </div><!--/container-->
</section><!--/pricing-page-->
<?php include('footer.php');?>