<?php
	$keys_post = array_keys($_POST);
    foreach ($keys_post as $key_post) 
     { 
          $$key_post = $_POST[$key_post];
          error_log("variable $key_post viene desde $ _POST"); 
     }

if ($idioma == 1) {
   include('include/lang_es.php');
} else {
    include('include/lang_us.php');
}

$dest = "hansgoche@hotmail.com,reservas@epoca.com.pe,ogutierrez@zonaperu.com";

$header1 = "<h2 style='font:bold 16px Arial'>Solicitud de Reserva</h2>
<p style='font:normal 12px Arial'>Los siguientes datos fueron enviados:<p>";

$header2 = "<h2 style='font:bold 16px Arial'>RESERVA RECIBIDA</h2>
<p style='font:normal 12px Arial'>".$nombre.", Los siguientes datos fueron enviados para su reserva. En breve nos comunicaremos con Usted. <p>";

$html = "
<table border='0' cellpadding='0' cellspacing='0' style='font:normal 12px Arial'>
<tr>
  <td width='160' align='left' valign='top'></td>
<td width='287' align='left' valign='top'></td>
</tr>
<tr>
  <td align='left' valign='top'><strong> ".FORM_TEXT1." :</strong></td>
<td align='left' valign='top'>".$titulo." ".$nombre." ".$apellido."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>".FORM_TEXT5." :</strong></td>
  <td align='left' valign='top'>".$email."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>".FORM_TEXT4." :</strong></td>
  <td align='left' valign='top'>".$checkin."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>".FORM_TEXT3." :</strong></td>
  <td align='left' valign='top'>".$checkout."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>".FORM_TEXT9." :</strong></td>
  <td align='left' valign='top'>".$vuelo."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>".FORM_TEXT10." :</strong></td>
  <td align='left' valign='top'>".$rooms."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>".FORM_TEXT12." :</strong></td>
  <td align='left' valign='top'>".$huesped."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>".FORM_TEXT6." :</strong></td>
  <td align='left' valign='top'>".$habit."</td>
</tr>
<tr>
  <td align='left' valign='top'><strong>".FORM_TEXT13." :</strong></td>
  <td align='left' valign='top'>".$adicional."</td>
</tr>
</table>";

$mensaje_usuario = $header2.$html;
$mensaje_hotel = $header1.$html;

    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabeceras .= 'From: webmaster@epoca.com.pe' . "\r\n";

  mail($dest,"HOTEL EPOCA - Reserva",$mensaje_hotel,$cabeceras);
  mail($email,"HOTEL EPOCA - Reserva recibida",$mensaje_usuario,$cabeceras);

?>