<?php

require 'dbConnection.php'

$sql = "SELECT COUNT(*) FROM users WHERE email = :email";
$statement = $db_connection->prepare($sql);
$statement->bindValue(':email', $useremail, PDO::PARAM_STR);
$result = $statement->execute();

if ($statement->fetchColumn() == 1) {
	$success = 'You are now logged in  ';
	$_SESSION['success'] = $success;
	header('Location: http://feed-reader.dev/index.php');
	exit();

?> 