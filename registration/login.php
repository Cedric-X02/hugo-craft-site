<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"">
  <title>Sign up</title>
  <link rel="stylesheet" href="stylesheet.css"/>
  <link rel="icon" href="http://cravatar.eu/avatar/Titigo.png"/>
        
        </style>
</head>
<body>
<?php
require('config.php');
session_start();

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: index.php");
  }else{
    $message = "Username or password is invalid.";
  }
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title"><a href="http://91.173.107.210:25555/" alt="Return to home page">Home page</a></h1>
<h1 class="box-title">Sign up</h1>
<input type="text" class="box-input" name="username" placeholder="Username">
<input type="password" class="box-input" name="password" placeholder="Password">
<input type="submit" value="login" name="submit" class="box-button">
<p class="box-register">You are new here ? <a href="register.php">Sign in</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>