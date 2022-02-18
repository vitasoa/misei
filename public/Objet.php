<?php

	require("ObjetAction.php");
	
	//Création d'une action
	$action1= new Action();
	
	//Affectation de deux propriétés
	$action1->nom = "MISEI";
	$action1->cours = 15.15;
	$action1->bourse = "bourse de Paris";
	//utilisation des propriétés
	// echo "<b>L'action $action1->nom cotée à la $action1->bourse vaut $action1->cours &euro;</b><hr>";
	
	//Appel d'une méthode
	$action1->info();
	
	echo "La structure de l'objet \$action1 est : <br>";
	var_dump($action1);
	
	echo "<h4>Descriptif de l'action</h4>";
	foreach($action1 as $prop=>$valeur){
		echo "$prop = $valeur <br />";
	}
	
	if($action1 instanceof action) {
		echo "<hr />L'objet \$action1 est du type action";
	}


?>