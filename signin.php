<?php
session_start();

require 'dbConnection.php';

$useremail = (isset($_POST['email'])) ? $_POST['email'] : '';
$userpassword = (isset($_POST['password'])) ? $_POST['password'] : '';

$sql = "SELECT id, password FROM users WHERE email = :email";
$statement = $db_connection->prepare($sql);
$statement->bindValue(':email', $useremail, PDO::PARAM_STR);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);
$password = $result['password'];

if (password_verify($userpassword, $password) === false) {
	$error = 'Your email address or password is incorrect';
	$_SESSION['error'] = $error;
	header('Location: http://feed-reader.dev/login.php');
	exit();
}

$_SESSION['loggedIn'] = true;
$_SESSION['userId'] = $result['id'];
$_SESSION['loginSuccess'] = "You are now logged in";

header('Location: http://feed-reader.dev/index.php');
?> 