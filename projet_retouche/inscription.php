<?php
try
{
        // Nouvelle connexion bdd avec adresse du serveur, l'identifiant et le mot de passe
  $bdd = new PDO("\x6d\171\163\x71\154\x3a\150\157\x73\164\75\155\171\163\161\154\x35\65\x2d\x32\x34\x34\x2e\160\x65\x72\163\x6f\x3b\x64\142\156\141\x6d\x65\75\x67\162\157\x77\x75\x70\164\x6f\161\x69\141\x64\155\x69\156\141\x3b\x63\150\x61\x72\x73\x65\164\x3d\165\x74\x66\70", "\147\x72\x6f\x77\165\160\164\157\x71\151\x61\x64\155\151\x6e\141", "\101\144\x6d\151\156\x61\x36\63");
}
catch(Exception $e)
{
  die('Erreur requête PDO');
}

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./css/bootstrap.min.css"/>
  <link rel="stylesheet" href="./css/main.css"/>
  <script type="application/javascript" src="./js/jquery-2.1.1.min.js"></script>
  <script type="application/javascript" src="./js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta charset="utf-8"/>
  <title>Inscription</title>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="jquery-ui.min.css">
  <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="jquery-ui.min.js" type="text/javascript"></script>
</head>


<body>
  <div class="container">
    <form action="verif.php" method="post">
      <div class="row text-center formulaire">
        
        <!-- Formulaire à remplir pour avoir quelques informations sur la personne -->
        <div class="col-xs-11 col-sm-11 col-md-11 col-xl-11">
          <label class="inscription">Nom : <input class="inputinscription" type="text" name="nom" value=""></label><br>
          <label class="inscription">Prenom : <input class="inputinscription" type="text" name="prenom" value=""></label><br>
          <label class="inscription">Mail : <input class="inputinscription" type="email" name="adresse_mail" value="" ></label><br>
          <label class="inscription">Campus : 
            <select name="campus" id="campus" class="inputinscription">
              <!--  -->
              <?php
              $reponse = $bdd->query('SELECT * FROM campus');
              while ($donnees = $reponse->fetch()) {
                $selected="";
                if (isset($_GET['campus'])) {
                  if ($_GET['campus']==="c" && $donnees['Libellé']==="Clermont-Ferrand") {
                    $selected="selected";
                  }
                  elseif ($_GET['campus']==="l" && $donnees['Libellé']==="Lyon") {
                    $selected="selected";
                  }
                }
                echo '<option value="'.htmlspecialchars($donnees['Libellé']).'" '.$selected.'>'.htmlspecialchars($donnees['Libellé']).'</option>'; 
              }
              ?>
            </select>
          </label><br>
          <!--  -->
          <label class="inscription">Ville : <input class="inputinscription" type="text" name="ville" id="automate"></label><br>
          <label class="inscription">Age : <input class="inputinscription" type="number" name="age"></label><br>
          <label class="inscription">Genre : <select name="genre" id="genre" class="inputinscription"><option value="Homme">Homme</option><option value="Femme">Femme</option></select></label><br>
          <label class="inscription">Civilité : <select name="civilite" id="civilite" class="inputinscription"><option value="Célibataire">Célibataire</option><option value="En union">Autres</option></select></label><br>
        </div>
      </div>

      <div class="row text-center">

        <!-- formulaire de compétence à sélectionner -->
        <div class="col-xs-12 col-sm-11 col-md-5 col-xl-5 boxFormulaire">
          <h1 class="h1formulaire">Compétences</h1>
          <?php
          $reponse = $bdd->query('SELECT * FROM competences');
          $compt = 0;
          while ($donnees = $reponse->fetch()) {
            $compt+=1;
            echo '<div class="input-group divinscription">
            <span class="input-group-addon">
            <input type="checkbox" name="c'.$compt.'" value="0" id="c'.$compt.'" class="competences">
            </span>
            <label class="form-control" for="c'.$compt.'">'.htmlspecialchars($donnees['Libellé']).'</label>
            </div>';
          }
          ?>
        </div>

        <div class="col-xs-11 col-sm-11 col-md-6 col-xl-6 boxFormulaire">
          <h1 class="h1formulaire">Centres d'intéret</h1>
          <?php
          $reponse = $bdd->query('SELECT * FROM interets');
          $compt = 0;
          while ($donnees = $reponse->fetch()) {
            $compt+=1;
            echo '<div class="input-group divinscription">
            <span class="input-group-addon">
            <input type="checkbox" name="i'.$compt.'" value="0" id="i'.$compt.'" class="interets">
            </span>
            <label class="form-control" for="i'.$compt.'">'.htmlspecialchars($donnees['Libellé']).'</label>
            </div>';
          }
          ?>
          
        </div>


      </div>

    </div>
  </div>
  <div class="row text-center">
    <label class="inscription" id="mdp1">Mot de passe : <input class="inputinscription" type="password" name="mdp1" ></label><br>
    <label class="inscription" id="mdp2">Confirmer : <input class="inputinscription" type="password" name="mdp2" ></label>
    <div>

      <div class="row text-center" id="bas_inscription">

        <!-- Condition d'utilisation à cocher -->
        <div class="col-xs-6 col-sm-6 col-md-6 col-xl-6 condition">
          <label>J'accepte les mentions légales <input type="checkbox" name="mentions" value="0"></label>
          <label>J'active les cookies<input type="checkbox" name="cookie" value="0"></label>
        </div>

        <!-- Bouton d'inscription -->
        <div class="col-xs-6 col-sm-6 col-md-6 col-xl-6">
          <input type="submit" class="btn btn-default" name="valider" />
        </div>

      </div>
    </form>
  </body>

  <footer>
  </footer>
</body>

<script>

  var liste;
  $.ajax({
    type : "GET",
    url : "villes.txt",
    error : function () {
      console.log('Erreur');
    },
    success : function (data) {
      liste = data.split('|');
      $('#automate').autocomplete({
        minLength: 2,
        source : liste,
      });
    }
  });

  $('input').change(function() {
    if($(this).val().length >30) {
      $(this).after("<br><span>La valeur doit faire - de 30 caractères</span>");
    }
  });

  $('input[name="prenom"]').change(function() {
    $('input[name="adresse_mail"]').val($('input[name="prenom"]').val()+"."+$('input[name="nom"]').val()+"\@ipilyon.net");
  });

  $('form').submit(
    function(e) {
      if ($('input[name=cookie]').is(':not(:checked)')) {
        $('input[name=cookie]').after("<br><span>Vous devez accepter pour continuer</span>");
        return false;
      }
        // a tester
        if ($('.competences:checked').length<3) {
          $('.h1formulaire').after("<br><span>Vous devez validez au moins trois choix</span>");
          return false;
        }
        if ($('.interets:checked').length<3) {
          $('.h1formulaire').after("<br><span>Vous devez validez au moins trois choix</span>");
          return false;
        }
        if ($('input[name="mdp1"]').val().length<8 || $('input[name="mdp2"]').val().length<8) {
          $('input[name="mdp2"]').after("<br><span>Mot de passe trop court</span>");
          return false;
        }
        if (($('input[name="mdp1"]').val())!=($('input[name="mdp2"]').val())) {
          $('input[name="mdp2"]').after("<br><span>Vos mots de passe ne correspondent pas</span>");
          return false;
        }
      });
    </script>
    </html>
