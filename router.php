<?php 
//Démarrage de la session pour conserver l'état des données sur les planètes
session_start();?>

<?php
	require_once('controller.php');
	//je ne connais que le controleur


	$page = explode('/',$_SERVER['REQUEST_URI']);
	// to handle the query as an array, each element containing a part of the global URL
	$method = $_SERVER['REQUEST_METHOD'];

	echo '<!-- Access : ' . $method . ' on the router  ' . $page[1]. '<br>chosen endpoint is ' . $page[2] . '<br>';
	if ($page[3] != '') {
		echo ' id is ' . $page[3] . '<br>';
	}
	echo '-->';



	//This part is the routing process : depending the different url elements, we dispatch 
	switch($page[2]) {
		case 'planets' : 
			switch($method) {
				case 'GET' : 
					echo 'Planets list';
					//calling correct function in the controller
					getPlanetsAsTable();
					break;
				case 'POST' :
					//echo 'adding a planet';
					addAPlanet($_POST);
					break;
				default:
					http_response_code('404');
					echo 'OOPS';
			}
			break;
		case 'planet' :
			switch($method) {
				case 'GET' : 
					//echo 'display a planet ' . $page[3];
					getAPlanet($page[3]);
					break;
				case 'DELETE' :
					// dommage, on ne sait pas faire sans javascript
					echo 'delete a planet ' . $page[3];
					echo deleteAPlanet($page[3]);
					break;
				default:
					http_response_code('404');
					echo 'OOPS';
			}
			break;
		case 'delete' :
			switch($method) {
				case 'GET' : 
					// POUR LA DEMO SEULEMENT
					// on utilise le seul truc qu'on sait faire sans javascript
					//POST et GET
					//ici j'utilise POST pour réaliser ma suppression
					// mais c'est TRES CHOQUANT !!
					// je reprends le code du vrai DELETE
					//echo 'delete a planet ' . $page[3];
					deleteAPlanet($page[3]);
					break;
				default:
					http_response_code('404');
					echo 'OOPS';
			}
			break;
			case 'add' :
				switch($method) {
					case 'GET' : 
						formAddPlanet();
						break;
					case 'POST':
						addAPlanet($_POST);
						break;
					default:
						http_response_code('404');
						echo 'OOPS';
				}
				break;
		default : 
			http_response_code('500');
			echo 'unknown endpoint';
			break;
	}
			

