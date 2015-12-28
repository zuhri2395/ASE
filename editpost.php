<?php
include_once 'connection.php';

$post_id = mysql_real_escape_string($_POST['post_id']);
$title = mysql_real_escape_string($_POST['title']);
$category = mysql_real_escape_string($_POST['category']);
$desc = mysql_real_escape_string($_POST['description']);
$price = mysql_real_escape_string($_POST['price']);

$sql = mysql_query("UPDATE post SET title='$title', category='$category', description='$desc', price='$price' WHERE post_id='$post_id'");
if($sql) {
	header('location:profile.php?type=edit&status=success');
} else {
	header('location:profile.php?type=edit&status=failed');
}