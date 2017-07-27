<?php
//include('conexion.php'); 
//funcion para validar informacion registrada
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
  }
}
function idioma(){
  echo '<select name="idioma" id="idioma" onchange="view_lang(this.value)">';
  echo '<option value="0">Seleccione idioma</option>';
  echo '<option value="1">Español</option>';
  echo '<option value="2">Ingles</option>';
  echo '</select>';
}
function menu(){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT id_cat,nombre FROM categoria WHERE estado = 1 AND idioma = 1 ORDER BY id_cat ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        echo '<select name="menu" id="menu">';
        echo '<option value="0">Seleccione...</option>';
        do{
           echo '<option value="'.$row_cont['id_cat'].'">'.$row_cont['nombre'].'</option>';
           } while($row_cont = mysql_fetch_assoc($result));
        echo '</select>';
        mysql_free_result($result);
    } else {
        '<p>No existen categorias registradas.</p>';   
    }
}
function menu_selecciona($valor){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT id_cat,nombre FROM categoria WHERE estado = 1 AND idioma = 1 ORDER BY id_cat ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        echo '<select name="menu" id="menu">';
        
        do{
           echo '<option value="'.$row_cont['id_cat'].'"';
           if(isset($valor)){
                if($valor == $row_cont['id_cat']){
                 echo 'selected="selected"';
                }
            }
           echo '>'.$row_cont['nombre'].'</option>';
           } while($row_cont = mysql_fetch_assoc($result));
        echo '</select>';
        
        mysql_free_result($result);
    } else {
        '<p>No existen categorias registradas.</p>';   
    }
}
//carga la lista de las categoria de la galeria
function paginas(){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT id_cat,nombre FROM categoria WHERE estado = 1 AND idioma = 1 ORDER BY id_cat ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        echo '<select name="menu" id="menu" onchange="mostrar_lista(this.value)">';
        echo '<option value="0">Seleccione...</option>';
        do{
           echo '<option value="'.$row_cont['id_cat'].'">'.$row_cont['nombre'].'</option>';
           } while($row_cont = mysql_fetch_assoc($result));
        echo '</select>';
        mysql_free_result($result);
    } else {
        '<p>No existen categorias registradas.</p>';   
    }
}
function hab(){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT id,titulo FROM rooms WHERE estado = 1 ORDER BY id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        echo '<select name="menu" id="menu" onchange="mostrar_hab(this.value)">';
        echo '<option value="0">Seleccione...</option>';
        do{
           echo '<option value="'.$row_cont['id'].'">'.$row_cont['titulo'].'</option>';
           } while($row_cont = mysql_fetch_assoc($result));
        echo '</select>';
        mysql_free_result($result);
    } else {
        '<p>No existen habitaciones registradas.</p>';   
    }
}

function producto(){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT id,titulo FROM producto WHERE estado = 1 ORDER BY id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        echo '<select name="menu" id="menu">';
        echo '<option value="0">Seleccione...</option>';
        do{
           echo '<option value="'.$row_cont['id'].'">'.$row_cont['titulo'].'</option>';
           } while($row_cont = mysql_fetch_assoc($result));
        echo '</select>';
        mysql_free_result($result);
    } else {
        '<p>No existen imagenes registrada para este producto.</p>';   
    }
}
function producto_img(){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT id,titulo FROM producto WHERE estado = 1 ORDER BY id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        echo '<select name="menu" id="menu" onchange="mostrar_lista(this.value)">';
        echo '<option value="0">Seleccione...</option>';
        do{
           echo '<option value="'.$row_cont['id'].'">'.$row_cont['titulo'].'</option>';
           } while($row_cont = mysql_fetch_assoc($result));
        echo '</select>';
        mysql_free_result($result);
    } else {
        '<p>No existen categorias registradas.</p>';   
    }
}
function producto_selecciona($id){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT id,titulo FROM producto WHERE estado = 1 ORDER BY id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        echo '<select name="menu" id="menu">';
        
        do{
           echo '<option value="'.$row_cont['id'].'"';
           if(isset($id)){
                if($id == $row_cont['id']){
                 echo 'selected="selected"';
                }
            }
           echo '>'.$row_cont['titulo'].'</option>';
           } while($row_cont = mysql_fetch_assoc($result));
        echo '</select>';
        
        mysql_free_result($result);
    } else {
        '<p>No existen categorias registradas.</p>';   
    }
}
function listar_hijo($var1,$var2){
    global $database_demo,$demo;
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT id,titulo FROM contenido WHERE idioma = ".$var2." AND id_menu = ".$var1." ORDER BY id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
    if($total_cont > 0){
        echo '<ol>';
        do{
           echo '<li><a href="editar_contenido.php?id='.$row_cont['id'].'&lang='.$var2.'">'.$row_cont['titulo'].'</a></li>';
          } while($row_cont = mysql_fetch_assoc($result));
        echo '</ol>';
    }
}
//////////////////////////////////////////////////////////////separador
?>