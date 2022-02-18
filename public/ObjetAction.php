<?php

class action
{
	public function info(){
		if( isset($this->nom) && isset($this->cours) && isset($this->bourse) ) {
			echo "<b>L'action $this->nom cotée à la bourse de $this->bourse vaut $this->cours &euro;</b><br/>";
		}
		
		echo "Information en date du : " . date("d/m/Y H:m:i");
		
		echo "<br/><br/>";
		echo "<p><b>Horaires d'ouverture</b></p>";
		echo "<p>La Bourse de Paris est ouverte</p>";
		echo "<p>La Bourse de New York est fermée</p><hr>";
	}	
}
?>