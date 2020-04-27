<?php
require 'db.php';

/* Reprend l'ensemble des articles de la commande via l'id de l'utilisateur */
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

/*Nouvelle commande*/
function newDetailsCommandes($idUtilisateur, $idEnTeteCommande) {
    $query = 'INSERT INTO detailscommande (idEnTeteCommande, idArticle, prixUnitaire)
				SELECT :idEnTeteCommande, p.idArticle, a.prixArticle
				FROM panier p
				INNER JOIN articles a 
				WHERE p.idUtilisateur = :idUtilisateur)';
    $reponse = $db->prepare($query);
    $reponse->execute(array('idUtilisateur' => $idUtilisateur, 'idEnTeteCommande' => $idEnTeteCommande));
    $reponse->closeCursor();
}
?>
