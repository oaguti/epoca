<?php
function agregar_galeria(){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $id = 0;
    do{
        ++$id;
        $archivo = "guest".$id.".jpg";
        $query = "INSERT INTO galeria (idcat,rutamini,rutabig,archivo) VALUES ('3','images/gallery/','images/guest/','".$archivo."')";
        $result = mysql_query($query, $demo) or die(mysql_error());
    } while($id <= 11);
    echo '<h1>ejecutado</h1>';

} 
function listar_hab($id){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT a.id,b.titulo FROM rooms a, habita b WHERE a.id = b.id_room AND b.idioma = $id ORDER BY a.id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        do{
            echo '<li><a href="hab.php?hab='.$row_cont['id'].'" >'.$row_cont['titulo'].'</a></li>';
        } while($row_cont = mysql_fetch_assoc($result));
        mysql_free_result($result);
    }
} 
function option_hab($id){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT a.id,b.titulo FROM rooms a, habita b WHERE a.id = b.id_room AND b.idioma = $id ORDER BY a.id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        do{
            echo '<option value="'.$row_cont['id'].'">'.$row_cont['titulo'].'</option>';
        } while($row_cont = mysql_fetch_assoc($result));
        mysql_free_result($result);
    }
} 
function option_name_hab($sele,$id){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT a.id,b.titulo FROM rooms a, habita b WHERE a.id = b.id_room AND b.idioma = $id ORDER BY a.id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        do{
            echo '<option value="'.$row_cont['titulo'].'" ';
                if($row_cont['id'] == $sele){echo 'selected';}
            echo ' >'.$row_cont['titulo'].'</option>';
        } while($row_cont = mysql_fetch_assoc($result));
        mysql_free_result($result);
    }
} 
function contenido($item,$idioma){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT titulo,precio,texto,servicio,extra FROM habita WHERE idioma = ".$idioma." AND id_room = ".$item." ORDER BY id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
       echo '<h2>'.$row_cont['titulo'].': USD '.$row_cont['precio'].'</h2>'; 
       echo '<p class="lead">'.$row_cont['texto'].'</p>';
       echo $row_cont['servicio'];
       echo $row_cont['extra'];         
       mysql_free_result($result);
    } else {
        '<p>No existen ningun contenido.</p>';   
    }
}

function listar_cat($id){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT id_cat,nombre,prefijo FROM categoria WHERE idioma = $id ORDER BY id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);

     echo '<li><a class="btn btn-default active" href="#" data-filter="*">'.GALL_BT1.'</a></li>';
    if($total_cont > 0){

            do{
                echo '<li><a class="btn btn-default" href="#" data-filter=".'.$row_cont['prefijo'].'">'.$row_cont['nombre'].'</a></li>';
            } while($row_cont = mysql_fetch_assoc($result));
         mysql_free_result($result);
    }
   
} 
/*
function listar_gallery($id){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT id_cat,prefijo,nombre FROM categoria WHERE idioma = $id ORDER BY id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        $total = $total_cont;
            do{
                galeria($row_cont['id_cat'],$row_cont['prefijo'],$row_cont['nombre']);
            }while($row_cont = mysql_fetch_assoc($result));
         mysql_free_result($result);
    }
} */
function galeria($id){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT a.nombre,a.prefijo,b.rutamini,b.rutabig,b.archivo FROM categoria a, galeria b WHERE idioma = $id AND a.id_cat = b.idcat ORDER BY a.id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($id == 1){$boton = "Ver";} else {$boton = "View"; }
    
    if($total_cont > 0){ 
        do{
            $ruta_mini = $row_cont['rutamini'].$row_cont['archivo'];
            $ruta_big = $row_cont['rutabig'].$row_cont['archivo'];

                    echo '<div class="portfolio-item '.$row_cont['prefijo'].' col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                            <img class="img-responsive" src="'.$ruta_mini.'" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">'.$row_cont['nombre'].'</a></h3>
                                    <a class="preview" href="'.$ruta_big.'" rel="prettyPhoto['.$row_cont['prefijo'].']"><i class="fa fa-eye"></i> '.$boton.'</a>
                                </div> 
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->';
        } while($row_cont = mysql_fetch_assoc($result));
         mysql_free_result($result);
    }
}

function mostrar_hab($id){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT a.id,a.prefijo,b.titulo,b.precio FROM rooms a, habita b WHERE a.id = b.id_room AND b.idioma = $id ORDER BY a.id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        do{
            $id = $row_cont['id'];
            echo '<div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <a href="hab.php?hab='.$id.'" ><img class="img-responsive" src="images/gallery/'.$row_cont['prefijo'].'1.jpg"></a>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">'.$row_cont['titulo'].'</h3>
                            <p>Precio: $'.$row_cont['precio'].'</p>
                            <a href="reserva.php?habit='.$id.'" class="boton_rv"><i class="fa fa-key" aria-hidden="true"></i>'.BT_RS.'</a>
                        </div>
                    </div>
                </div>';

        } while($row_cont = mysql_fetch_assoc($result));
        mysql_free_result($result);
    }
}
function mostrar_servicio($id,$bt){
global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT id,titulo,precio,servicio FROM habita WHERE idioma = $id ORDER BY id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    $color = array("one", "two", "three", "four", "five","six");
    $clase = array("col-sm-4", "col-sm-4", "col-sm-4", "col-md-6", "col-md-6","col-md-6");
    $i = -1;
    if($total_cont > 0){
        do{
            ++$i;
            echo    '<div class="'.$clase[$i].' plan price-'.$color[$i].' wow fadeInDown">
                        <div class="heading-'.$color[$i].'">
                                <h1>'.$row_cont['titulo'].'</h1>
                                <span>USD '.$row_cont['precio'].'</span>
                        </div>
                        '.$row_cont['servicio'].'
                        <div class="plan-action">
                                <a href="reserva.php?habit='.$row_cont['id'].'" class="btn btn-primary">'.$bt.'</a>
                        </div>
                    </div>'; 
        } while($row_cont = mysql_fetch_assoc($result));
        mysql_free_result($result);
    }
} 
function mostrar_contenido($id,$idmenu,$idsection){
global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT texto FROM contenido WHERE idioma = $id AND id_menu=$idmenu AND id_seccion=$idsection ORDER BY id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
   
    if($total_cont > 0){
        echo $row_cont['texto'];
        mysql_free_result($result);
    }
}     
function listar_titulo($id){
    $i = -1;
    $lista_es = array("Sr.", "Sra.", "Srta.");
    $lista_us = array("Mr.", "Mrs.", "Ms.");

    if($id == 1) {
        $lista = $lista_es;
    } else {
        $lista = $lista_us;
    }
    echo '<select name="titulo" id="titulo">';
        do {
            ++$i;
            echo '<option value="'.$lista[$i].'">'.$lista[$i].'</option>';
        } while ($i < 2);
    echo '</select>';
}
?>
