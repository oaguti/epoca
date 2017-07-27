<?php

	$keys_post = array_keys($_POST);
    foreach ($keys_post as $key_post) 
     { 
          $$key_post = $_POST[$key_post];
          error_log("variable $key_post viene desde $ _POST"); 
     }
include('../conexion.php');
mysql_select_db($database_demo, $demo);
$query_lista = "UPDATE habita SET precio = ".$precio." WHERE id_room = ".$id;
mysql_query($query_lista, $demo) or die(mysql_error());
echo '<script type="text/javascript">location.href="../listar_habitacion.php"</script>'
?>