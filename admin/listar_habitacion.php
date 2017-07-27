<?php 
/*incluimos el header*/
include('include/header.php');
/// obtener datos
?>
<section id="page">
<script type="text/javascript">
function mostrar_hab(str){
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
xmlhttp.open("GET","include/mostrar_hab.php?q="+str,true);
xmlhttp.send();
}
</script>
<h1>Listado de Habitaciones</h1><br />
<br />
<form id="room" name="room" method="POST">
<label>Habitaciones</label>
<?php hab(); ?>
</form>
<br /><br />
<div id="txtHint"></div>
<?php include('include/footer.php'); ?>