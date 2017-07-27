<?php
$q = $_GET["q"];
$tipo = $_GET["tipo"];
include('../conexion.php');
//include('acceso.php');
mysql_select_db($database_demo, $demo);
$query_lista = "SELECT id,idcat,archivo FROM galeria WHERE estado = 1 AND idcat = '".$q."' ORDER BY id ASC";
$lista = mysql_query($query_lista, $demo) or die(mysql_error());
$row_lista = mysql_fetch_assoc($lista);
$totalRows_lista = mysql_num_rows($lista);

if($totalRows_lista > 0){
    echo '<div class="contener">';
    echo '<p>Total de imagenes: '.$totalRows_lista.'</p><br />';
    echo '<ul class="lista_gal">';
     if($tipo == 1){
         do { 
            echo '<li><a href="eliminar.php?id='.$row_lista['id'].'&pos=id&data=galeria"><img src="../images/gallery/thumbs/'.$row_lista['archivo'].'" /></a></li>';
        } while ($row_lista = mysql_fetch_assoc($lista));
     } else {
       do { 
        echo '<li><a href="editar_imagen.php?id='.$row_lista['id'].'&imagen='.$row_lista['archivo'].'&menu='.$row_lista['idcat'].'"><img src="../images/gallery/thumbs/'.$row_lista['archivo'].'" /></a></li>';
        } while ($row_lista = mysql_fetch_assoc($lista));  
     }
       
    
    echo '</ul>';
    echo '</div>';
    mysql_free_result($lista);
    } else {
        echo '<p>No existen imagenes para esta pagina.</p>';
    }
mysql_close($demo);
?>