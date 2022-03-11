<?php
	//Je place le tableau des planetes dans la variable de session si il n'est pas déjà là
	if(!isset($_SESSION['planets'])){
	$planets=['b45'=>['name'=>'Mercure', 'circ'=>'10520'],
		   'c14'=>['name'=>'Venus', 'circ'=>'3021'],
		   'a12'=>['name'=>'Earth', 'circ'=>'42512'],
		   'b3'=>['name'=>'Mars', 'circ'=>'12451'],
		   'x42'=>['name'=>'Jupiter', 'circ'=>'12241224'],
		   'Alf' =>['name'=>'Melmak', 'circ' => '15 litres de jus de chaton']
	];
	$_SESSION['planets']=$planets;
	}
	else{
		$planets=$_SESSION['planets'];
	}

	function getAll() {
		//global... bon, c'est pas très propre.. 
		// ça permet d'éviter de passer une copie du tableau à chaque fois
		global $planets;
		return $planets;
	}

	function getPlanet($key) {
		global $planets;
		if (array_key_exists($key, $planets)) {
			return $planets[$key];
		} else {
			return null;
		}
	}

	function addPlanet($data) {
		global $planets;
		//3 éléments : l'indice, le nom de la planete et sa circonférence
		$planets[$data['key']]=['name'=>$data['name'], 'circ'=>$data['circ']];

		//Mise à jour de la variable de session
		$_SESSION['planets']=$planets;
	}
	
	function deletePlanet($key) {
		global $planets;
		if (array_key_exists($key, $planets)) {
			unset($planets[$key]);
		} else {
			return null;
		}


		//Mise à jour de la variable de session
		$_SESSION['planets']=$planets;
	}	
