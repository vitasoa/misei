<?php
	class acces
	{
		//Variables propres de la classe
		public $varpub = "Propriété publique";
		protected $varpro = "Propriété protégée";
		private $varpriv = "Propriété privée";
	
		public function lireProp() {
			echo "Lecture publique: $this->varpub","<br />";
			echo "Lecture protégée: $this->varpro","<br />";
			echo "Lecture privée: $this->varpriv","<hr />";
		}
	}
	
	$objet = new acces();
	$objet->lireProp();
	
	echo $objet->varpub;
	//echo $objet–>varpriv; Erreur fatale
	//echo $objet–>varpro; Erreur fatale
	
	echo "<hr />";
	
	foreach(get_class_vars('acces') as $prop=>$val)
	{ 
		echo "Propriété ",$prop ," = ",$val,"<br />";
	}
?>