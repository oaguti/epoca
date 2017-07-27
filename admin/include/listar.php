<?php
$q = $_GET["q"];
include('../conexion.php');
include('funciones.php');
mysql_select_db($database_demo, $demo);
mysql_query("SET NAMES 'utf8'");
$query_menu = "SELECT id,titulo FROM menu WHERE estado = 1 ORDER BY id ASC";
$result = mysql_query($query_menu, $demo) or die(mysql_error());
$row_cont = mysql_fetch_assoc($result);
$totalRows_menu = mysql_num_rows($result);

echo '<ul id="listado">';
        do{
           echo '<li>'.$row_cont['titulo'];
                listar_hijo($row_cont['id'],$q);
           } while($row_cont = mysql_fetch_assoc($result));
			echo '</li>';
echo '</ul>';
?>