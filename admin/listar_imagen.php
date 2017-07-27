<?php 
/*incluimos el header*/
include('include/header.php');
/// obtener datos
?>
<section id="page">
<script type="text/javascript">
function mostrar_lista(str){
if (str==""){ document.getElementById("txtHint").innerHTML="";  return;} 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function(){
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","include/mostrar_imagen.php?q="+str+"&tipo=2",true);
xmlhttp.send();
}
</script>
<h1>Listado Imagenes de Pagina</h1><br />
<p>Seleccione la pagina para mostrar las imagenes subidas para ser mostradas en la web por la seccion seleccionada, para editar dar clic sobre la imagen</p>
<br />
<form id="subir_img">
<label>Categorias de galeria</label>
<?php paginas(); ?>
</form>
<br /><br />
<div id="txtHint"></div>
<?php include('include/footer.php'); ?>