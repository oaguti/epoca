<?php 
/*incluimos el header*/
include('include/header.php');
//////////////////////////////////////////
$editFormAction = $_SERVER['PHP_SELF'];

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    $menu = $_POST['menu'];
    $rutamini = "images/gallery/thumbs/";
    $rutabig = "images/gallery/";
    $imagen = $_POST['imagen'];
    $estado = 1;
    $insertSQL = sprintf("INSERT INTO galeria (idcat,rutamini,rutabig,archivo,estado) VALUES (%s, %s, %s, %s, %s)",
						   GetSQLValueString($menu, "int"),
                           GetSQLValueString($rutamini, "text"),
                           GetSQLValueString($rutabig, "text"),
                           GetSQLValueString($imagen, "text"),
                           GetSQLValueString($estado, "int"));     
    
    mysql_select_db($database_demo, $demo);
    mysql_query("SET NAMES 'utf8'");
	mysql_query($insertSQL, $demo) or die(mysql_error());
    echo '<script type="text/javascript">$(".mensaje").html("Fotografia guardada")</script>';
} 
/////////////////////////////////////////
?>
<section id="page">
<script type="text/javascript" src="js/subida.js"></script>
<h1>Agregar Imagenes a la galeria</h1><br/>
<p class="mensaje"></p>
<div class="contener">
    <form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="subir_img">
    <fieldset>
    <div class="linea">
    <label>Categorias :</label>
    <?php menu(); ?>
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
<?php include('include/footer.php'); ?>