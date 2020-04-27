<?php
require 'models/commande.php';
session_start();
	$articles = getArticleGraph();
	// supprime les données dans mon json
	unset($s_file);
	$s_file = 'json/completerArticle.json';
try {
	// On essayes de récupérer le contenu existant
	
	 
		// On crée le tableau JSON
		$tableau_pour_json = array();

	 foreach ($articles as $article)  {
	// On ajoute le nouvel élement
	array_push( $tableau_pour_json, array(
		'Nb_Article' => $article["Nb_Article"],
		'nomArticle' => $article["nomArticle"]
	));
	 }
	// On réencode en JSON
	$contenu_json = json_encode($tableau_pour_json);
	 
	// On stocke tout le JSON
	file_put_contents($s_file, $contenu_json);
	 
	//echo "Vos informations ont été enregistrées";
	}
    catch( Exception $e ) {
        echo "Erreur : ".$e->getMessage();
    }
include 'views/graphiquevente.php';
?>
