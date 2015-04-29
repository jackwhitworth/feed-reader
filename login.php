<?php session_start(); ?>
<!doctype html>
<html>
<html lang="en-GB">

<head>
<meta charset="UTF-8">
  <title>LOGIN | SIGN UP</title>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body style="background-color: #A4A4A4">

<?php if(isset($_SESSION['error'])): ?>
<div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
<?php 
  unset($_SESSION['error']);
  endif; 
?>

<?php if(isset($_SESSION['success'])): ?>
<div class="alert alert-success"><?= $_SESSION['success']; ?></div>
<?php 
  unset($_SESSION['success']);
  endif; 
?>

  <form class="form-inline" method="post" action="/adduser.php" style="padding-top: 25px;padding-right: 50px; padding-bottom: 25px; padding-left: 50px; float: left; width: 33%">
      <h2> SIGN IN </h2>
      <div class="form-group">
          <label for="exampleInputName2">EMAIL</label>
          <input type="text" class="form-control" name="email" id="emial" placeholder="john.johnson@example.com" style="width: 98%;">
      </div>
      <br>
      <br>
      <div class="form-group">
          <label for="exampleInputName2">PASSWORD</label>
          <input type="text" class="form-control" name="password" id="password" placeholder="************" style="width: 84%;">
      </div>
      <br>
      <br>      
      <button type="submit" class="btn btn-default" style="width: 64%;">Sign In</button>

  </form>
  <form class="form-inline" method="post" action="/adduser.php" style="padding-top: 25px;padding-right: 50px; padding-bottom: 25px; padding-left: 50px; float: left; width: 33%">
      <h2> SIGN UP </h2>
      <div class="form-group">
          <label for="exampleInputName2">EMAIL</label>
          <input type="text" class="form-control" name="newemail" id="newemail" placeholder="john.johnson@example.com" style="width: 98%;">
      </div>
      <br>
      <br>
      <div class="form-group">
          <label for="exampleInputName2">PASSWORD</label>
          <input type="text" class="form-control" name="newpassword" id="newpassword" placeholder="************" style="width: 84%;">
      </div>
      <br>
      <br>      
      <button type="submit" class="btn btn-default" style="width: 64%;">Sign Up</button>
  </form>
</body>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</html>