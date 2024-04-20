<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Ideal_Market = "localhost";
$database_Ideal_Market = "ideal_market";
$username_Ideal_Market = "root";
$password_Ideal_Market = "";
$Ideal_Market = mysql_pconnect($hostname_Ideal_Market, $username_Ideal_Market, $password_Ideal_Market) or trigger_error(mysql_error(),E_USER_ERROR); 
?>