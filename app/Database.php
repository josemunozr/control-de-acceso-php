<?php

$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "mvc";


$con = mysql_connect($DB_HOST,$DB_USER,$DB_PASS)
or die("error en server");
mysql_select_db($DB_NAME, $con);
