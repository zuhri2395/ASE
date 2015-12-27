<?php
include_once 'connection.php';
session_start();

$referrer = mysql_real_escape_string($_SERVER['HTTP_REFERER']);
$email = mysql_real_escape_string($_POST['profile-email']);
$password = mysql_real_escape_string($_POST['profile-password']);
$secretkey = "langgeng";
$key = md5($pass.$secretkey);
$about = mysql_real_escape_string($_POST['about']);

$sql = mysql_query("UPDATE member SET email='$email', password='$key', about='$about'");

if($sql) {
	header('location:' . $referrer . "?status=success");
} else {
	header('location:profile.php?status=failed');
}