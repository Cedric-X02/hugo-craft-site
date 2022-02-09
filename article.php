<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=article;charset=utf8", "root", "root");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $get_id = htmlspecialchars($_GET['id']);
   $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   $article->execute(array($get_id));
   if($article->rowCount() == 1) {
      $article = $article->fetch();
      $titre = $article['titre'];
      $contenu = $article['contenu'];
   } else {
      die('Cet article n\'existe pas !');
   }
} else {
   die('Erreur');
}
?>
<!DOCTYPE html>
<html>
<head>
   <title><?= $titre ?></title>
   <meta charset="utf-8">
   <link rel="icon" href="http://cravatar.eu/avatar/Titigo.png"/>
</head>
<body>
   <h1><?= $titre ?></h1>
   <?= $contenu ?>
   <h5><?= $date_time_publication ?></h5>
   <a href="index.html">Return home page</a>
</body>
</html>