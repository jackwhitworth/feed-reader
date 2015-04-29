<?php

$dsn = "mysql:dbname=feed_reader;host=localhost";
$db_user = "root";
$password = "wearejhrocks";

try {
    $db_connection = new PDO($dsn, $db_user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>