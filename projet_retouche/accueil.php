<?php if (isset($_COOKIE['adresse_mail'])) {
  // header('Location: https://growup.top/Projet/page_connexion.php?e=true');
  // exit();
} ?>
<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="site.css" media="all" />
<link rel="stylesheet" href="./css/bootstrap.min.css"/>
      <link rel="stylesheet" href="./css/main.css"/>
      <script type="application/javascript" src="./js/jquery-2.1.1.min.js"></script>
      <script type="application/javascript" src="./js/bootstrap.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">

</script>
<html>

  <head>

    <meta charset="utf-8"/>
    <title>Accueil</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">


  </head>



  <body>
<!-- Navbar avec texte de bienvenue -->
    <div class="container boxConnexion">
      <nav class="navbar navbar-brand">
          <div class="nav-healer col-xs-12 col-sm-12 col-md-12 col-xl-12">
            <h1><b><MARQUEE scrollAmount="12" DIRECTION="LEFT">Bienvenue Sur Le Réseau U'DEV !</MARQUEE></b></h1>
          </div>
      </nav>
    </div>

  <div class="container">
    <div class="row">
<!-- Première box sous la navbar contenant l'image -->
      <div class="col-xs-11 col-sm-7 col-md-7 col-xl-7 boxImage">
        <img class="img-responsive imagecgi" id="img"  src="cgii.jpg">
      </div>
<!-- deuxième box contenantla connexion de la personne -->
      <div class="col-xs-11 col-sm-3 col-md-3 col-xl-3 boxConnexion">
        <form action="verif2.php" method="post">
          <p><label for="addmail">Adresse mail</label></p>
          <p><input type="text" class="inputaccueil" placeholder="Adresse Mail" id="addmail" name="adresse_mail"></p>
          <p><label for="mdp">Mot de passe</label></p>
          <p><input type="password" class="inputaccueil" placeholder="Mot de passe" id="mdp" name="mdp"></p>
          <p><label for="cookie">Se souvenir de moi<input type="checkbox" id="cookie" name="persiste" value="0"/></label></p>
          <?php if (isset($_GET['e'])) { if($_GET['e']==="true") {echo '<span>Erreur dans identification, recommencer</span>';}}  ?>
          <input type="submit" class="btn btn-default" />
          <a href="inscription.php"><button type="button" class="btn btn-default" name="button">S'inscrire</button></a>
        </form>
      </div>
    </div>
  </div>
</body>

<div class="row text-center">
  <ol class="breadcrumb piedpage">
    <li class="breadcrumb-item"><a href="info_udev.php">Plus d'info</a></li>
    <li class="breadcrumb-item"><a href="confidentialite.php">Condition d'utilisation</a></li>
  </ol>
</div>

</html>
