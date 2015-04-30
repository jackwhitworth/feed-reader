<?php
session_start();

require "dbConnection.php";

$sql = "SELECT id, title, url FROM feeds";
$feeds = $db_connection->query($sql);

?>

<!doctype html>
<html lang="en-GB">
<head>
<meta charset="UTF-8">
	<title>Feed List</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body style="background-color: #A4A4A4; padding-top: 25px;padding-right: 50px; padding-bottom: 25px; padding-left: 50px;">

<table class="table table-hover">
	<tr>
		<th style="width:45%">Feed Name</th>
		<th style="width:45%">Feed URL</th>
	</tr>
	<?php foreach($feeds as $feed): ?>
		<tr>
			<td><?= $feed['title']; ?></td>
			<td><a href="<?= $feed['url']; ?>"><?= $feed['url']; ?></a></td>
			<td><button type="button" class="btn"> <a href="feedRead.php?id=<?= $feed['id']; ?>"> View Feed </a> </button> </td>
		</tr>
	<?php endforeach; ?>		
</table>

<button type="button" class="btn">
  <a href="/">Back</a>
</button>

</body>

<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</html>