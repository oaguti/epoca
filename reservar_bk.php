<?php
	$keys_post = array_keys($_POST);
    foreach ($keys_post as $key_post) 
     { 
          $$key_post = $_POST[$key_post];
          error_log("variable $key_post viene desde $ _POST"); 
     }
$dest = "ogutierrez@zonaperu.com";   
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
<td align='left' valign='top'>".$nombre."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Apellido :</strong></td>
<td align='left' valign='top'>".$apellido."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Móvil:</strong></td>
  <td align='left' valign='top'>".$email."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Fecha de llegada :</strong></td>
  <td align='left' valign='top'>".$checkin."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Fecha de salida :</strong></td>
  <td align='left' valign='top'>".$checkout."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Recojer en Aeropuerto :</strong></td>
  <td align='left' valign='top'>".$aeropuerto."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Detalles de vuelo :</strong></td>
  <td align='left' valign='top'>".$vuelo."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Nº de Hab. :</strong></td>
  <td align='left' valign='top'>".$rooms."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>Habitación :</strong></td>
  <td align='left' valign='top'>".$habit."</td>
</tr>
</table>";
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabeceras .= 'From:'.$email. "\r\n";
	mail($dest,"HOTEL EPOCA - Reserva",$html,$cabeceras);
	//echo $html;
    //echo '<script type="text/javascript">alert("Su mensaje fue enviado"); location.href="contacto.php"</script>';
	//header("Location: index.htm");
?>