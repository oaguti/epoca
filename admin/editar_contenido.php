<?php 
/*incluimos el header*/
if(isset($_GET['id'])){
    $valor = $_GET['id'];
    $idioma = $_GET['lang'];
} 
include('include/header.php');
//////////////////////////////////////////
$editFormAction = $_SERVER['PHP_SELF'];

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    $contenido = $_POST['contenido'];
    $id = $_POST['posicion'];
    $actualizar = 'UPDATE contenido SET texto = "'.$contenido.'" WHERE id ='.$id;   
    mysql_select_db($database_demo, $demo);
    //mysql_query("SET NAMES 'utf8'");
	mysql_query($actualizar, $demo) or die(mysql_error());
    echo '<script type="text/javascript">alert("CONTENIDO ACTUALIZADO");location.href="listar_pagina.php"</script>';
} 
/////////////////////////////////////////
mysql_select_db($database_demo, $demo);
mysql_query("SET NAMES 'utf8'");
$query_menu = "SELECT id,texto FROM contenido WHERE id = ".$valor." AND idioma = ".$idioma." ORDER BY id ASC";
$menu = mysql_query($query_menu, $demo) or die(mysql_error());
$row_menu = mysql_fetch_assoc($menu);
$totalRows_menu = mysql_num_rows($menu);
?>
<section id="page">
<h1>Editar contenido a pagina</h1><br/>
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="agregar">
<fieldset>
<textarea class="ckeditor" cols="150" id="editor1" name="contenido" rows="10"><?php echo $row_menu['texto']; ?></textarea><br /><br />
<input type="submit" name="guardar" value="Guardar" />
<input type="hidden" name="MM_insert" value="form1" />
<input type="hidden" name="posicion" value="<?php echo $row_menu['id']; ?>" />
</fieldset>
</form>
</div>
<br/><br/>
<?php include('include/footer.php'); ?>