<?php
include_once 'connection.php';

$user = mysql_real_escape_string($_POST['username']);

$sql = mysql_query("SELECT COUNT(*) AS num FROM member WHERE BINARY username='$user'");
$num = mysql_fetch_object($sql)->num;

echo $num;

mysql_close();