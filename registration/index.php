Connecting…<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
  <head>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"">
  <link rel="stylesheet" href="stylesheet.css"/>
  <link rel="icon" href="http://cravatar.eu/avatar/Titigo.png"/>
  <script src="https://cdn.jsdelivr.net/npm/p2p-media-loader-core@latest/build/p2p-media-loader-core.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/p2p-media-loader-hlsjs@latest/build/p2p-media-loader-hlsjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clappr@latest"></script>
        </style>
<title>Dashboard</title>
  </head>
  <body>
    <div class="sucess">
    <h1>Welcome <?php echo $_SESSION['username']; ?> !</h1>
<div style=" font-family: 'roobert-regularregular'; color: red;"><h2 id="demo"></h2></div>
<script>
var countDownDate = new Date("Dec 25, 2021 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = "Christmas in " + days + "D " + hours + "H "
  + minutes + "M " + seconds + "S";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "👀";
  }
}, 1000);
</script>

<iframe width="auto" height="auto" src="https://www.youtube.com/embed/A75AAdlG1-U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    <p>It's your dashboard.</p>
    <a href="logout.php">Logout</a> - <a href="http://91.173.107.210:25555/">Home</a>
    </div>
  </body>
</html>