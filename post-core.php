<?php
include_once 'connection.php';
session_start();

$user = $_SESSION['username'];
$title = mysql_real_escape_string($_POST['title']);
$category = mysql_real_escape_string($_POST['category']);
$desc = mysql_real_escape_string($_POST['description']);
$query = mysql_query("SELECT shop_id FROM shops WHERE username='$user'");
$shop = mysql_fetch_object($query)->shop_id;

$dir = "store/";
$allowedExt = array("jpg", "jpeg", "png");
$img = array();
$file = $_FILES['img'];

if(empty($file['name'])) {
	$sql = mysql_query("INSERT INTO post(shop_id, title, category, description, pictures) VALUES('$shop', '$title', '$category', '$desc', 'default.jpg') ");
	if($sql) {
		header('location:profile.php?status=sukses');
	} else {
		header('location:profile.php?status=gagal');
	}
} else {
	$ext = explode(".", $file['name']);
	$ext = strtolower(end($ext));
	$finfo = finfo_open(FILEINFO_MIME_TYPE);
	$mime = finfo_file($finfo, $file['tmp_name']);
	$idx = mysql_fetch_object(mysql_query("SELECT post_id FROM post ORDER BY post_id DESC LIMIT 1"))->idx;
	$idx++;
	$pic = "default.jpg";
	$pathname = $dir . $idx;

	if(($mime == $file['type']) && in_array($ext, $allowedExt)) {
		if(move_uploaded_file($file['tmp_name'], $pathname)) {
			$pic = "P-" . $idx . $ext;
			echo "sukses";
		} else {
			echo "gagal";
		}

		rename($pathname, $dir . $pic);
	} else {
		echo "Invalid file";
	}

	$sql = mysql_query("INSERT INTO post(shop_id, title, category, description, pictures) VALUES('$shop', '$title', '$category', '$desc', '$pic')");
	if($sql) {
		header('location:profile.php?status=sukses');
	} else {
		header('location:profile.php?status=gagal');
	}
}