<?php
include_once 'connection.php';
session_start();

$user = $_SESSION['username'];
$name = mysql_real_escape_string($_POST['name']);
$location = mysql_real_escape_string($_POST['location']);
$phone = mysql_real_escape_string($_POST['phone']);
$prefix = "shop-";
$query = mysql_query("SELECT EXISTS (SELECT * FROM shops) AS exist");
$check = mysql_fetch_object($query)->exist;

if(!$check) {
	$shop_id = $prefix . "1";
	$sql = mysql_query("INSERT INTO shops VALUES('$shop_id', '$user', '$name', '$location', '$phone') ");
	if($sql) {
		header('location:profile.php?type=shop&status=success');
	} else {
		header('location:profile.php?type=shop&status=failed');
	}
} else {
	$sql = mysql_query("SELECT shop_id FROM shops");
	$max = 0;
	while($row = mysql_fetch_object($sql)) {
		$num = explode("-", $row->shop_id);
		if($max < $num['1']) {
			$max = $num['1'];
		}
	}
	$shop_id = $prefix . ($max+1);
	$sql = mysql_query("INSERT INTO shops VALUES('$shop_id', '$user', '$name', '$location', '$phone') ");

	if($sql) {
		header('location:profile.php?type=shop&status=success');
	} else {
		header('location:profile.php?type=shop&status=failed');
	}
}