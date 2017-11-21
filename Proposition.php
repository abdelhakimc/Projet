<?php
    // try
    // {
    //     // Nouvelle connexion bdd avec adresse du serveur, l'identifiant et le mot de passe
    //     $bdd = new PDO("\x6d\171\163\x71\154\x3a\150\157\x73\164\75\155\171\163\161\154\x35\65\x2d\x32\x34\x34\x2e\160\x65\x72\163\x6f\x3b\x64\142\156\141\x6d\x65\75\x67\162\157\x77\x75\x70\164\x6f\161\x69\141\x64\155\x69\156\141\x3b\x63\150\x61\x72\x73\x65\164\x3d\165\x74\x66\70", "\147\x72\x6f\x77\165\160\164\157\x71\151\x61\x64\155\151\x6e\141", "\101\144\x6d\151\156\x61\x36\63");
    // }
    // catch(Exception $e)
    // {
    //     die('Erreur requête PDO');
    // }


//Fonction qui permet de mettre les caractère de l'ID sélectionné dans la base de donnée dans un tableaux.
//Et ensuite de mettre ce petit tableau contenant l'ID dans un grand tableaux qui contiendra tous les IDs.
function Tableau ($donnees, $x) {
	global $user;
    $user[$x] = str_split($donnees); //on met l'ID dans un tableau pour l'analyser facilement
    array_splice($user[$x], 0, 2); //on enlève les deux premier element de l'ID car ils ne font pas partie de l'ID donnees
    // return $user;
}

// Fonction qui permet de comparer les ID des différentes personnes et de faire un tableau de résultat.
function Traitement()
{
  global $user;
  $compteur = array(1 => 0);
	for ($i=1; $i < 2 ; $i++) {
		for ($j=0; $j < count($user[$i]) ; $j++) {
			if ($user[0][$j] + $user[$i][$j] == 2){
				$compteur[$i] +=1;
			}
		}
	}
  return $compteur;
}


//Fonction qui compare le tableau de résultat.
function Resultat()
{
  global $compteur;
	for ($i=1; $i <= count($compteur); $i++) {
		if ($compteur[$i] >= 3) {
	     		echo 'tu as '.$compteur[$i].' donnees en commun.';
          //   $donnees = $bdd->query('SELECT * FROM Utilisateur WHERE Id_utilisateur="'.$id_user[$i].'"');
          //   while ($donnees = $donnees->fetch()) {
          //    echo "<div>";
             // if ($donnees['Id_genre']==1) {
             //    echo '<img src="profil_homme.jpg" alt="">';
             // }
             // else {
             //    echo '<img src="profil_femme.jpg" alt="">';
             // }
          //    echo '<h1>'.$donnees['Prenom'].' '.substr($donnees['Nom'],0,1).'</h1>';
          //    echo '<a href="https://outlook.office.com/owa/?realm=ipilyon.net" target="_blank"><p>'.$donnees['Adresse_mail'].'</p></a></div>'
		}
	}
}


	$user = array('');
// ------ Version finale à tester avec PDO :
  // $id_user = array('');
 //		$donnees = $bdd->query('SELECT Id_utilisateur FROM Utilisateur');
 //     $compt = 0;
 //     while ($donnees = $donnees->fetch()) {
  //      array_push($id_user, $donnees);
   //    	Tableau($donnes, $compt);
   //    	$compt+=1;
 //     }
 //		$compt2 = Traitement();
 //  	Resultat($compt2);
// -- A supprimer :
for ($x=0; $x < 2 ; $x++) {
  if ($x==0) {
    $donnees = 'AA01100100101';
  }
  elseif ($x==1) {
    $donnees = 'AA11100000101';
  }
  Tableau($donnees,$x);
}
// -- fin suppression
print_r($user);
$compteur = Traitement();
Resultat($compteur);
 ?>
