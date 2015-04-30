<?php
session_start();

require "dbConnection.php";

$html = "";
$url = "http://hexus.net/rss/";
$xml = simplexml_load_file($url);
for($i = 0; $i < 10; $i++){
	$title = $xml->channel->item[$i]->title;
	$link = $xml->channel->item[$i]->link;
	$description = $xml->channel->item[$i]->description;
	$pubDate = $xml->channel->item[$i]->pubDate;
	
        $html .= "<a href='$link'><h3>$title</h3></a>";
	$html .= "$description";
	$html .= "<br />$pubDate<hr />";
}
echo $html;

?>

<!doctype html>
<html lang="en-GB">
<head>
<meta charset="UTF-8">
	<title>Feed List</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body style="background-color: #A4A4A4; padding-top: 25px;padding-right: 50px; padding-bottom: 25px; padding-left: 50px;">

</body>

<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</html>