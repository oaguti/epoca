<?php 
/*incluimos el header*/
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $imagen = $_GET['imagen'];
    $menu = $_GET['menu'];
}

include('include/header.php');
//////////////////////////////////////////
$editFormAction = $_SERVER['PHP_SELF'];

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    $menu = $_POST['menu'];
    $imagen = $_POST['imagen'];
    $id = $_POST['id'];
    $actualizar = 'UPDATE galeria SET idcat =  "'.$menu.'", archivo = "'.$imagen.'" WHERE id ='.$id;    
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
	mysql_query($actualizar, $demo) or die(mysql_error());
    echo '<script type="text/javascript">alert("IMAGEN GUARDADA");location.href="listar_imagen.php"</script>';
} 
/////////////////////////////////////////
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
    $query = "SELECT archivo FROM galeria WHERE estado = 1 AND id = ".$id." ORDER BY id ASC";
    $result = mysql_query($query, $demo) or die(mysql_error());
    $row_cont = mysql_fetch_assoc($result);
    $total_cont = mysql_num_rows($result);
?>
<section id="page">
<script type="text/javascript" src="js/subida.js"></script>
<h1>Editar Imagenes de la pagina</h1><br/>
<div class="contener">
    <form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="subir_img">
    <fieldset>
    <div class="linea">
    <label>Categorias :</label>
    <?php menu_selecciona($menu); ?>
    </div>
    <div class="linea">
        <label>Imagen:</label>
        <input type="text" name="imagen" readonly="readonly" id="imagen" />
        <!--<a href="javascript:aparecer(1);" class="subir">Subir Imagen</a>-->
    </div>
    </fieldset>
    <fieldset >
        <input type="submit" name="guardar" value="Guardar" class="boton" />
        <input type="hidden" name="MM_insert" value="form1" />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
    </fieldset>
    </form>
    <p>
    <form action="" method="post" name="formOperaciones" id="carga_img" >
        <label>Ubicar el archivo a subir:</label><br /><br />
        <input id="archivos" type="file" name="archivos[]" multiple="multiple"/><br /><br />
        <span id="msj"></span>
        <input type="submit" value="Subir al servidor" onClick ="enviar(); return false;" class="bt_subir"  />
    </form>
</div>
<br><br>
<img src="../images/gallery/thumbs/<?php echo $imagen; ?>" class="thumbs_center" />
<?php include('include/footer.php'); ?>