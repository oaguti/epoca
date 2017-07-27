<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_demo = "localhost";
$database_demo = "epocacom_db";
$username_demo = "epocacom_user";
$password_demo = "magaly$2016";
$demo = mysql_pconnect($hostname_demo, $username_demo, $password_demo) or trigger_error(mysql_error(),E_USER_ERROR); 
?>