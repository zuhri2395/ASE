<?php
include_once 'connection.php';

$referrer = mysql_real_escape_string($_SERVER['HTTP_REFERER']);

$post_id = $_GET['post_id'];
$sql = mysql_query("DELETE FROM post WHERE post_id='$post_id'");

header('location:' . $referrer);