<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"">
<link rel="stylesheet" href="stylesheet.css"/>
        
        </style>
        <link rel="icon" href="http://cravatar.eu/avatar/Titigo.png"/>
<title>Sign up</title>
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>sign up with success !</h3>
             <p>Click here for <a href='login.php'>sign in</a></p>
       </div>";
       $to      = $email; // Send email to our user
$subject = "INSCRIPTION"; // Give the email a subject 
$emessage = "votre inscription a bien été prise en compte";

// if emessage is more than 70 chars
$emessage = wordwrap($emessage, 70, "\r\n");

// Our emessage above including the link
$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=iso-8859-1";
$headers[] = "From: no-reply <noreply@91.173.107.210>";
$headers[] = "Subject: {$subject}";
$headers[] = "X-Mailer: PHP/".phpversion(); // Set from headers

mail($to, $subject, $emessage, implode("\r\n", $headers));
    }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title"><a href="http://91.173.107.210:25555/">Home page</a></h1>
    <h1 class="box-title">sign up</h1>
  <input type="text" class="box-input" name="username" placeholder="Username" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Password" required />
    <input type="submit" name="submit" value="Sign up now" class="box-button" />
    <p class="box-register">Already sign up? <a href="login.php">sign in</a></p>
</form>
<?php } ?>
</body>
</html>