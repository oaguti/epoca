<?php
//obteniendo las variables enviadas  
$tipo =  $_GET['id'];
$registro = $_GET['pos'];
$tabla = $_GET['data'];
$url = $_SERVER['HTTP_REFERER'];
//realizando conexion y consulta a BD
require_once('conexion.php');
mysql_select_db($database_demo, $demo);
$query_Recordset1 = "UPDATE ".$tabla." SET estado = '0' WHERE ".$registro." = '".$tipo."'";
$Recordset1 = mysql_query($query_Recordset1, $demo) or die(mysql_error());
echo '<script type="text/javascript">alert("El producto fue borrada"); location.href="'.$url.'";</script>'; 
?>