<?php
session_start();

require "dbConnection.php";

$useremail = (isset($_POST['newemail'])) ? trim($_POST['newemail']) : '';
$userpassword = (isset($_POST['newpassword'])) ? password_hash($_POST['newpassword'], PASSWORD_DEFAULT) : '';

if($useremail == '' || $userpassword == '') {
	$error = 'Please enter email and password';
	$_SESSION['error'] = $error;
	header('Location: http://feed-reader.dev/login.php');
	exit();
}

$sql = "SELECT COUNT(*) FROM users WHERE email = :email";
$statement = $db_connection->prepare($sql);
$statement->bindValue(':email', $useremail, PDO::PARAM_STR);
$result = $statement->execute();

if ($statement->fetchColumn() > 0) {
	$error = 'Account already exists';
	$_SESSION['error'] = $error;
	header('Location: http://feed-reader.dev/login.php');
	exit();
}

$sql = "INSERT INTO users (email, password) VALUES ('$useremail', '$userpassword')";
$db_connection->exec($sql);

$_SESSION['success'] = 'You are now signed up, please login below.';

header('Location: http://feed-reader.dev/login.php');
?>
