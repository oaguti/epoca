<?php 
/*incluimos el header*/
include('include/header.php');
?>
<section id="page">
<h1>Listado de pagina</h1><br />
<form id="contenido">
<p>Seleccione el idioma en que se va listar el contenido</p><br>
<?php idioma();?>
</form>
<br>
<div id="txtHint"></div>
<script type="text/javascript" src="js/contenido.js"></script>
<?php include('include/footer.php'); ?>