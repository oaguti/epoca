<?php
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT prefijo FROM rooms WHERE estado = 1 AND id = ".$id_tab." ORDER BY id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    
?>
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
                    <?php
                    $i=1;
                    $total = 2;
                        do{
                            if($i == 1){
                               echo '<div class="item active">'; 
                            } else {
                               echo '<div class="item">'; 
                            }
                            echo '<img src="images/hab/'.$row_cont['prefijo'].$i.'.jpg" class="img-responsive" alt="">'; 
                            echo '</div>';
                            $i++;
                        } while($i <= $total);
                    mysql_free_result($result);
                    ?>   
                    </div>
                    
                    <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
                        <i class="fa fa-angle-left"></i> 
                    </a>
                    
                    <a class=" right carousel-control hidden-xs" href="#carousel-slider" data-slide="next">
                        <i class="fa fa-angle-right"></i> 
                    </a>
                </div> <!--/#carousel-slider-->
            </div><!--/#about-slider-->