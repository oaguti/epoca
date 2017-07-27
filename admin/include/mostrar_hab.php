<?php
$q = $_GET["q"];
include('../conexion.php');
//include('acceso.php');
mysql_select_db($database_demo, $demo);
$query_lista = "SELECT id_room,titulo,precio FROM habita WHERE estado = 1 AND id_room = '".$q."' AND idioma = 1 ";
$lista = mysql_query($query_lista, $demo) or die(mysql_error());
$row_lista = mysql_fetch_assoc($lista);
$totalRows_lista = mysql_num_rows($lista);

if($totalRows_lista > 0){
?>   
<form id="edit-room" method="POST" action="include/update-price.php" name="edit-room">
    <p><strong><?php echo $row_lista['titulo'] ?></strong></p><br>
    <label>Precio :</label>
    <input type="text" name="precio" value="<?php echo $row_lista['precio'] ?>">
    <input type="submit" name="enviar" value="Actualizar precio">
    <!--<a href="#" onclick="enviar();" class="bt_enviar">Actualizar precio</a>-->
    <input type="hidden" name="id" value="<?php echo $row_lista['id_room'] ?>">        
</form>
<?php
    mysql_free_result($lista);
    } else {
        echo '<p>No existen habitaciones.</p>';
    }
mysql_close($demo);
?>