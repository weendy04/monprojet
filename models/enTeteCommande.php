<?php
require 'db.php';

function getEnTeteCommandes() {
    $db = getDb();
    $reponse = $db->query(
	'SELECT e.idEnTeteCommande, u.prenom, u.nom, u.idUtilisateur, s.idStatut, s.nomStatut, e.dateCommande
	FROM enTeteCommande AS e
	INNER JOIN utilisateurs AS u 
		ON e.idUtilisateur = u.idUtilisateur
	INNER JOIN statut AS s 
		ON e.idStatut = s.idStatut');
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $donnees;
}

function getEnTeteCommandes_idUtilisateur($idUtilisateur) {
    $db = getDb();
	$reponse = $db->prepare('SELECT e.idEnTeteCommande,e.idUtilisateur, s.nomStatut, e.dateCommande
		FROM enTeteCommande as e
		INNER JOIN statut AS s 
			ON e.idStatut = s.idStatut
		WHERE e.idUtilisateur = :idUtilisateur');
    $reponse->execute(array('idUtilisateur' => $idUtilisateur));
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $donnees;
}

function updateEnTeteCommandes_idStatut($idStatut, $idEnTeteCommande) {
    $query = 'UPDATE enTeteCommande SET idStatut = :idStatut'; 
    $query =  ' WHERE idEnTeteCommande = :idEnTeteCommande;';
    $db = getDb();
    $reponse = $db->prepare($query);
    $reponse->execute(array_merge(array('idEnTeteCommande' => $idEnTeteCommande), $values));
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function newEnTeteCommande($values) {
    $query = 'INSERT INTO enTeteCommande SET';
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
