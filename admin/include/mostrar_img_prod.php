<?php
$q = $_GET["q"];
$tipo = $_GET["tipo"];
include('../conexion.php');
//include('acceso.php');
mysql_select_db($database_demo, $demo);
$query_lista = "SELECT id,prod,imagen FROM img_prod WHERE estado = 1 AND prod = '".$q."' ORDER BY id ASC";
$lista = mysql_query($query_lista, $demo) or die(mysql_error());
$row_lista = mysql_fetch_assoc($lista);
$totalRows_lista = mysql_num_rows($lista);

if($totalRows_lista > 0){
    echo '<p>Total de imagenes: '.$totalRows_lista.'</p><br />';
    echo '<ul class="lista_gal">';
    if($tipo==1)  {
        do { 
        echo '<li><a href="editar_img_prod.php?id='.$row_lista['id'].'&imagen='.$row_lista['imagen'].'&producto='.$row_lista['prod'].'"><img src="../img/contenido/mini/'.$row_lista['imagen'].'" width="200" height="150" /></a></li>';
        } while ($row_lista = mysql_fetch_assoc($lista)); 
    } else {
        do { 
        echo '<li><a href="eliminar.php?id='.$row_lista['id'].'&pos=id&data=img_prod"><img src="../img/contenido/mini/'.$row_lista['imagen'].'" width="200" height="150" /></a></li>';
        } while ($row_lista = mysql_fetch_assoc($lista)); 
    }
       
    
    echo '</ul>';
    mysql_free_result($lista);
    } else {
        echo '<p>No existen imagenes para esta pagina.</p>';
    }
mysql_close($demo);
?>