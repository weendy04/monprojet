<?php
require 'db.php';

function getDetailsCommande_idEnTeteCommande($idEnTeteCommande) {
    $db = getDb();
    $reponse = $db->prepare(
	'SELECT a.nomArticle, a.prixArticle 
	FROM detailsCommande AS d 
	INNER JOIN histArticles AS a
		ON a.idArticle = d.idArticle 
	WHERE d.idEnTeteCommande = :idEnTeteCommande');
    $reponse->execute(array('idEnTeteCommande' => $idEnTeteCommande));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $donnees;
}

function newdetailsCommande($values) {
    $query = 'INSERT INTO detailsCommande SET';
    foreach ($values as $name => $value) {
        $query = $query.' '.$name.' = :'.$name.',';
    }
    $query = substr($query, 0, -1);
    $db = getDb();
    $reponse = $db->prepare($query);
    $reponse->execute($values);
    $reponse->closeCursor(); // Termine le traitement de la requête
}


?>
