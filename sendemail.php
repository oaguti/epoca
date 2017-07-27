<?php
header('Content-Type: text/html; charset=UTF-8');
$name       = @trim(stripslashes($_GET['name'])); 
$from       = @trim(stripslashes($_GET['email'])); 
$subject    = @trim(stripslashes($_GET['subject'])); 
$message    = @trim(stripslashes($_GET['message'])); 
$to   		= 'oaguti@gmail.com';//replace with your email

$cabeceras  = 'MIME-Version: 1.0'."\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8'."\r\n";
$cabeceras .= 'From:'.$email."\r\n";
$cabeceras .= 'X-Mailer: PHP/'.phpversion();

mail($to, $subject, $message, $headers);

die;
?>