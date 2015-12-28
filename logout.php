<?php
session_start();

$_SESSION['login'] = false;
unset($_SESSION['username']);
$referrer = mysql_real_escape_string($_SERVER['HTTP_REFERER']);
header('location:' . $referrer);