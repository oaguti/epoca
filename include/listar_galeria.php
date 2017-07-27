<?php
function galeria($id_tab){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT id,prefijo FROM galeria WHERE estado = 1 AND id = ".$id_tab." ORDER BY id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    $total = $row_cont['total'];
    if($total_cont > 0){ 
        for ($i = 1; $i <= $total; $i++) {
?>
                    <div class="portfolio-item <?php echo $categoria ?> col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="<?php echo $ruta_mini ?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Business theme</a></h3>
                                    <a class="preview" href="<?php echo $ruta_big ?>" rel="prettyPhoto"><i class="fa fa-eye"></i>Ver</a>
                                </div> 
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->
                    
<?php 
        } 
    }
}    
    
?>