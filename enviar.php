<?php
	$keys_post = array_keys($_POST);
    foreach ($keys_post as $key_post) 
     { 
          $$key_post = $_POST[$key_post];
          error_log("variable $key_post viene desde $ _POST"); 
     }
$dest = "ogutierrez@zonaperu.com, reservas@epoca.com.pe";   
$html = "
<h2 style='font:bold 16px Arial'>Contáctenos - Pagina Web</h2>
<p style='font:normal 12px Arial'>Los siguientes datos fueron enviados:<p>
<table border='0' cellpadding='0' cellspacing='0' style='font:normal 12px Arial'>
<tr>
  <td width='160' align='left' valign='top'></td>
<td width='287' align='left' valign='top'></td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Nombre :</strong></td>
<td align='left' valign='top'>".$name."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Apellido :</strong></td>
  <td align='left' valign='top'>".$name2."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Empresa :</strong></td>
<td align='left' valign='top'>".$business."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Teléfono:</strong></td>
  <td align='left' valign='top'>".$phone."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Móvil:</strong></td>
  <td align='left' valign='top'>".$email."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Asunto :</strong></td>
  <td align='left' valign='top'>".$message."</td>
</tr>
</table>";
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabeceras .= 'From:'.$email. "\r\n";
	mail($dest,"HOTEL EPOCA - Nuevo Contacto",$html,$cabeceras);
	//echo $html;
    //echo '<script type="text/javascript">alert("Su mensaje fue enviado"); location.href="contacto.php"</script>';
	//header("Location: index.htm");
    echo $dest."se envio a :".$name;

?>