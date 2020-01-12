<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_myconnect = "localhost";
$database_myconnect = "userdata";
$username_myconnect = "root";
$password_myconnect = "12345678";
$myconnect = mysql_pconnect($hostname_myconnect, $username_myconnect, $password_myconnect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>