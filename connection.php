<?php
$user = "root";
$password = "";
$host = "localhost";
$db = "langgeng";

mysql_connect($host, $user, $root) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());