<?php
require 'db.php';

function getDetailsCommande_idEnTeteCommande($idEnTeteCommande) {
    $db = getDb();
    $reponse = $db->prepare(
	'SELECT d.idDetailsCommande, a.nomArticle, a.prixArticle 
	FROM detailsCommande AS d 
	INNER JOIN articles AS a
		ON a.idArticle = d.idArticle 
	WHERE d.idEnTeteCommande = :idEnTeteCommande');
    $reponse->execute(array('idEnTeteCommande' => $idEnTeteCommande));
    $donnees = $reponse->fetchall();
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
