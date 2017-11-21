<?php
function toliste($donnees)
{
	return $donnnestoliste;
}
function traitement()
{
	for ($i=1; $i < $user.nbusers ; $i++) { 
		for ($j=0; $j < nbinterets ; $j++) { 
			if ($user[0][j]==$user[i][j]){
				$res[i]=+1;
			}
		}
	}
}
function resultat()
{
	for ($k=0; $k < $res.length; $k++) { 
		if ($res[k]>3) {
			// on peut afficher cet user
		}
	}
}
	$res = array('');
	$users = array('');
	$reponse = $bdd->query('SELECT Id_utilisateur FROM Utilisateur');
    $compt = 0;
    while ($donnees = $reponse->fetch()) {
    	toliste($donnes);
    	$users($compt => $donnees);
    }
    traitement();
    resultat();

?>