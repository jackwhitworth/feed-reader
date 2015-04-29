<?php
session_start();

require "dbConnection.php";

$feedname = (isset($_POST['title'])) ? trim($_POST['title']) : '';
$feedurl = (isset($_POST['url'])) ? $_POST['url'] : '';

if($feedname == '' || $feedurl == '') {
	$error = 'Please fill out all fields';
	$_SESSION['error'] = $error;
	header('Location: http://feed-reader.dev/index.php');
	exit();
}

$sql = "SELECT COUNT(*) FROM feeds WHERE title = :title OR url = :url";
$statement = $db_connection->prepare($sql);
$statement->bindValue(':title', $feedname, PDO::PARAM_STR);
$statement->bindValue(':url', $feedurl, PDO::PARAM_STR);
$result = $statement->execute();

if ($statement->fetchColumn() > 0) {
	$error = 'Feed already exists';
	$_SESSION['error'] = $error;
	header('Location: http://feed-reader.dev/index.php');
	exit();
}

$sql = "INSERT INTO feeds (title, url) VALUES ('$feedname', '$feedurl')";
$db_connection->exec($sql);

$sth = $db_connection->prepare('SELECT title, url 
	FROM feeds
	WHERE = title < :title AND url = :url');
$sth->bindParam(':title', $feedname, PDO::PARAM_STR, 12);
$sth->bindParam(':url', $feedurl, PDO::PARAM_STR, 12);
$sth->execute();

header('Location: http://feed-reader.dev/feedList.php');
