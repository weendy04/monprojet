<?php
require 'db.php';

/*Reprend toutes les en tête des commandes*/
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
/* reprend les commandes pour un utilisateur spécifique*/
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

/*Modifie le statut d'une commande*/
function updateEnTeteCommandes_idStatut($idEnTeteCommande, $idStatut) {
    $query = 'UPDATE enTeteCommande SET idStatut = :idStatut
			WHERE idEnTeteCommande = :idEnTeteCommande;';
    $db = getDb();
    $reponse = $db->prepare($query);
    $reponse->execute(array('idEnTeteCommande' => $idEnTeteCommande, 'idStatut' => $idStatut));
    $reponse->closeCursor(); // Termine le traitement de la requête
}



?>
