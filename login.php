<?php
include_once 'connection.php';

$referrer = mysql_real_escape_string($_SERVER['HTTP_REFERER']);
$email = mysql_real_escape_string($_POST['email']);
$pass = mysql_real_escape_string($_POST['password']);
$secretkey = "langgeng";
$key = md5($pass.$secretkey);

$sql = mysql_query("SELECT COUNT(*) AS status FROM member WHERE email='$email' AND password='$key'");
$status = mysql_fetch_object($sql)->status;

if($status) {
	$sql = mysql_query("SELECT username FROM member WHERE email='$email'");
	$username = mysql_fetch_object($sql)->username;
	session_start();
	$_SESSION['login'] = true;
	$_SESSION['username'] = $username;
	header('location:' . $referrer);
} else {
	$_SESSION['login'] = false;
	header('location:index?status=failed');
}