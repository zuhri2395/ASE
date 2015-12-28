<?php

include_once 'connection.php';

$user = mysql_real_escape_string($_POST['username']);
$email = mysql_real_escape_string($_POST['regis-email']);
$pass = mysql_real_escape_string($_POST['pass']);
$secretkey = "langgeng";
$key = md5($pass.$secretkey);
$about = mysql_real_escape_string($_POST['about']);
var_dump($_FILES);

if(empty($_FILES['img']['name'])) {
	if($about == "") {
		$sql = mysql_query("INSERT INTO member(username, email, password) VALUES('$user', '$email', '$key') ");
	} else {
		$sql = mysql_query("INSERT INTO member(username, email, password, about) VALUES('$user', '$email', '$key', '$about') ");
	}

	if($sql) {
		header('location:index.php?status=success');
	} else {
		header('location:index.php?status=failed');
	}

} else {
	$dir = "profile/";
	$allowedExt = array("jpg", "jpeg", "png");
	$ext = explode(".", $_FILES['img']['name']);
	$ext = strtolower(end($ext));
	$finfo = finfo_open(FILEINFO_MIME_TYPE);
	$mime = finfo_file($finfo, $_FILES['img']['tmp_name']);
	$pic = $user . "." . $ext;
	$pathname = $dir . $pic;

	if(($mime == $_FILES['img']['type']) && in_array($ext, $allowedExt)) {
		if(move_uploaded_file($_FILES['img']['tmp_name'], $pathname)) {
			
		} else {

		}

		if($about == "") {
			$sql = mysql_query("INSERT INTO member(username, email, password, picture) VALUES('$user', '$email', '$key', '$pic') ");
		} else {
			$sql = mysql_query("INSERT INTO member(username, email, password, picture, about) VALUES('$user', '$email', '$key', '$pic', '$about') ");
		}
		if($sql) {
			header('location:index.php?status=success');
		} else {
			header('location:index.php?status=failed');
		}
	}
}