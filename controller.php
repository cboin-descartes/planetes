<?php
	require_once('model.php');
	
	
	function planetsBody() {
		
		//fonction commune, unqiue, chargé de créer le contenu
		//dynamique de la vue
		$data['title']="Page d'accueil";


		view("header.php",$data);
		getPlanetsAsTable();
		view("lien.php");
		view("footer.php");
		
	}


	function getPlanetsAsTable() {
		$data["planetes"] = getAll();

		view("lesplanetes.php",$data);
	

	}
	
	function getAPlanet($key) {

		$planet = getPlanet($key);
		$planet['title']="Planète $key";

		if ($planet) {
			//return '<p>Nom : ' . $planet['name'] . "</p>\n<p>Circonférence : " . $planet['circ'] . "</p>\n";
			view("header.php",$planet);
			view("uneplanete.php",$planet);
			view("footer.php");
		} else {
			//return 'on a perdu cet indice '.$key;
			view("header.php");
			view("erreur.php");
			view("footer.php");
		}
	}

	function formAddPlanet(){
		$data['title']="Ajout planète";


		view("header.php",$data);
		view("newPlanet.php");
		view("footer.php");

	}


	function addAPlanet($data) {

		addPlanet($data);
		
		planetsBody();
	}



	function deleteAPlanet($key) {
		deletePlanet($key);
		planetsBody();
	}


	function view($temp, $datatab=array()){
		if(!isset($datatab['title'])){
			$title="Pas de titre";
		}

		foreach ($datatab as $key=>$val)
		{
			$$key = $val;
		}
	
	   include('vue/'.$temp);
	} 
		
