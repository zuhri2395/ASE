<?php
include_once 'connection.php';

$title = mysql_real_escape_string($_POST['title']);
$category = mysql_real_escape_string($_POST['category']);
$desc = mysql_real_escape_string($_POST['description']);
