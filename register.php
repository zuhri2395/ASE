<?php

include_once 'connection.php';

$user = mysql_real_escape_string($_POST['username']);
$email = mysql_real_escape_string($_POST['regis-email']);
$pass = mysql_real_escape_string($_POST['pass']);
$secretkey = "langgeng";
$key = md5($pass.$secretkey);
$about = mysql_real_escape_string($_POST['about']);

if(empty($_FILES['img']['name'])) {
	$sql = mysql_query("INSERT INTO member(username, email, password) VALUES('$user', '$email', '$key') ");
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
	$pathname = $dir . $user;

	if(($mime == $_FILES['img']['type']) && in_array($ext, $allowedExt)) {
		if(move_uploaded_file($_FILES['img']['tmp_name'], $pathname)) {
			header('location:index.php?status=success');
		} else {
			header('location:index.php?status=failed');
		}

		$sql = mysql_query("INSERT INTO member(username, email, password, picture) VALUES('$user', '$email', '$key', '$user') ");
		if($sql) {
			header('location:index.php?status=success');
		} else {
			header('location:index.php?status=failed');
		}
	}
}