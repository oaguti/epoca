<?php
include('conexion.php');

	if(isset($_GET['q'])){
		$id = $_GET['q']
	}
	mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT ruta FROM categoria WHERE id_cat = ".$id." AND idioma = 1 ORDER BY id_cat ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        $ruta_galeria = $row_cont['ruta'];
        mysql_free_result($result);
        echo '<script type="text/javascript">$("#carga_img").fadeIn();</script>';

    } else {
        echo '<script type="text/javascript">alert("No se encontre ruta disponible");</script>';  
    }

?>