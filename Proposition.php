<?php


//Fonction qui permet de mettre les caractère de l'ID sélectionné dans la base de donnée dans un tableaux.
//Et ensuite de mettre ce petit tableau contenant l'ID dans un grand tableaux qui contiendra tous les IDs.
function Tableau ($donnees, $x) {
global $user;
  //Je pars dans l'idée que "$donnees" sera la variable qui sélectionnera la l'ID par la suite.
    // for ($i=0; $i < count($donnees); $i++) {
      $user[$x] = str_split($donnees); //on met l'ID dans un tableau pour l'analyser facilement

      print_r($user[$x]);
    // }
    // foreach ($interet as $int) {
    //   echo '<p>'.$int[$x].'</p>';
    // }

    array_splice($user[$x], 0, 2); //on enlève les deux premier element de l'ID car ils ne font pas partie de l'ID donnees
    for ($m=0; $m < count($user[$x]); $m++) {
      echo "<br>element de user deuxieme degre : ".$user[$x][$m];
    }
    echo "<br>azer";
    // array_push($user[$x], $interet);
    print_r($user);
    echo "<br>azerty";
    return $user;

}

echo "<br>";

// Fonction qui permet de comparer les ID des différentes personnes et de faire un tableau de résultat.
function Traitement()
{
  global $user;
  echo "<br>rentré dans traitement";
  $compteur = array(1 => 0);
  echo "<br>4";
	for ($i=1; $i < 2 ; $i++) {
    echo "<br>az  :".count($user[0]);
		for ($j=0; $j < count($user[$i]) ; $j++) {
      echo "<br>6";
			if ($user[0][$j] + $user[$i][$j] == 2){
        echo "<br>7";
				$compteur[$i] +=1;
			}
		}
    print_r($compteur);
	}
  return $compteur;
}


//Fonction qui compare le tableau de résultat.
function Resultat()
{
  global $compteur;
	for ($i=1; $i <= count($compteur); $i++) {
		if ($compteur[$i] >= 3) {
	     echo 'tu as '.$compteur[$i].' donneess en commun.';
		}
	}
}
	//$interet = array('');
	$user = array('');
	// $donnees = $bdd->query('SELECT Id_utilisateur FROM Utilisateur');
  //   $compt = 0;
  //   while ($donnees = $donnees->fetch()) {
  //   	Tableau($donnes);
  //   	$user($compt => $donnees);
  //   }
  //   Traitement();
  //   Resultat();
for ($x=0; $x < 2 ; $x++) {
  if ($x==0) {
    $donnees = 'AA01100100101';
  }
  elseif ($x==1) {
    $donnees = 'AA11100000101';
  }
  Tableau($donnees,$x);
}
echo "<br>2";
print_r($user);
$compteur = Traitement();
Resultat($compteur);
echo "<br>3";
 ?>
