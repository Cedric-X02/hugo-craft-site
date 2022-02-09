<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=article;charset=utf8", "root", "root");
$articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome !</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="stylesheet" href="stylesheet.css"/>
        <link rel="icon" href="http://cravatar.eu/avatar/Titigo.png"/>
        
        </style>
    </head>
    <body style="margin: 0%; margin-block: 0; margin-inline: 0; background-color: #0000ff; font-family: 'roobert-regularregular';">
        <img src="home.png" alt="Website is availible now !" width="100%">
        <hr alt="Hello" color="red" style="height: 5px;">
        <h1 style="margin: 10; text-align: center; font-family: 'roobert-regularregular'; color: white; font-size:17pt;"></h1>News<br>
        <ul style="color: green; background-color: white; margin: 0%; width: 10%;">
      <?php while($a = $articles->fetch()) { ?>
      <li color="green"><a href="article.php?id=<?= $a['id'] ?>"><?= $a['titre'] ?></a></li>
      <?php } ?>
   <ul>

    


    </body>
</html>