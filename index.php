<?php 
session_start();
?>

<!doctype html>
<html lang="en-GB">
<head>
<meta charset="UTF-8">
	<title>Add New Feed</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body style="background-color: #A4A4A4">
<div class="container">
<?php if(isset($_SESSION['error'])): ?>
<div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
<?php 
  unset($_SESSION['error']);
  endif; 
?>

<?php if(isset($_SESSION['loginSuccess'])): ?>
<div class="alert alert-success"><?= $_SESSION['loginSuccess']; ?></div>
<?php 
  unset($_SESSION['loginSuccess']);
  endif; 
?>
<?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
<div class="row">
  <form class="form-inline" method="post" action="/addfeed.php" style="padding-top: 25px;padding-right: 50px; padding-bottom: 25px; padding-left: 50px; float: left; width: 33%">
    	<div class="form-group">
       		<label for="exampleInputName2">Feed Title</label>
       		<input type="text" class="form-control" name="title" id="title" placeholder="Sports feed" style="width: 99%;">
     	</div>
     	<br>
     	<br>
    	<div class="form-group">
       		<label for="exampleInputName2">Feed URL</label>
       		<input type="text" class="form-control" name="url" id="url" placeholder="www.livesportsfeed.net/rss" style="width: 99%;">
     	</div>
     	<br>
     	<br>    	
      <button type="submit" class="btn btn-default" style="width: 54%;">Add Feed</button>

  </form>
</div>
<?php else: ?>
<div class="row">You need to <a href="login.php">login</a> to add feeds</div>
<?php endif; ?>

<div class="row"><button type="button" class="btn"> <a href="/feedList.php">Feed List</a></button></div>
</div>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>
$(function() {
    $('.form-inline').on('submit', function(event) {
        event.preventDefault();
        if ($('#title').val() == '' || $('#url').val() == '') {
            alert('Please fill out all form fields');
        } else {
          $(this).unbind('submit').submit()
        }
    });
});
</script>
</body>
</html>