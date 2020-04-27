
<?php
require 'db.php';

/*Reprend toutes les en tête des commandes*/
function getEnTeteCommandes() {
    $db = getDb();
    $reponse = $db->query(
	'SELECT e.idEnTeteCommande, u.prenom, u.nom, u.idUtilisateur, s.idStatut, s.nomStatut,  e.prixTotal,e.dateCommande
	FROM enTeteCommande AS e
	INNER JOIN utilisateurs AS u 
		ON e.idUtilisateur = u.idUtilisateur
	INNER JOIN statut AS s 
		ON e.idStatut = s.idStatut');
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor(); 
    return $donnees;
}
/* reprend les commandes pour un utilisateur spécifique*/
function getEnTeteCommandes_idUtilisateur($idUtilisateur) {
    $db = getDb();
	$reponse = $db->prepare('SELECT e.idEnTeteCommande,e.idUtilisateur, s.nomStatut, e.prixTotal, e.dateCommande
		FROM enTeteCommande as e
		INNER JOIN statut AS s 
			ON e.idStatut = s.idStatut
		WHERE e.idUtilisateur = :idUtilisateur');
    $reponse->execute(array('idUtilisateur' => $idUtilisateur));
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor(); 
    return $donnees;
}

/*Modifie le statut d'une commande*/
function updateEnTeteCommandes_idStatut($idEnTeteCommande, $idStatut) {
    $query = 'UPDATE enTeteCommande SET idStatut = :idStatut
			WHERE idEnTeteCommande = :idEnTeteCommande;';
    $db = getDb();
    $reponse = $db->prepare($query);
    $reponse->execute(array('idEnTeteCommande' => $idEnTeteCommande, 'idStatut' => $idStatut));
    $reponse->closeCursor();
}

/*Nouvelle commande*/
function newEnTeteCommandes($idUtilisateur, $prixTotal) {
    $query = 'INSERT INTO entetecommande (idUtilisateur, idStatut, dateCommande, prixTotal)
					VALUES (:idUtilisateur, 1, NOW(), :prixTotal);';
    $reponse = $db->prepare($query);
    $reponse->execute(array('idUtilisateur' => $idUtilisateur, 'prixTotal' => $prixTotal));
    $reponse->closeCursor();
	$donnee = 'SELECT idEnTeteCommande, MAX(dateCommande) FROM `entetecommande`
				WHERE idUtilisateur = 1';
	 $donnees = $donnee->fetchAll();
	 return $donnees;
}
?>
