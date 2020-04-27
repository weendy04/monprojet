<?php
require 'db.php';

/* Montre tout les articles du panier d'un utilisateur via son id utilisateur*/
function getArticlePanier($idUtilisateur) {
    $db = getDb();
	$reponse = $db->prepare('SELECT p.idPanier, p.idArticle, a.nomArticle, a.prixArticle 
			FROM panier p
			INNER JOIN articles a
				ON a.idArticle = p.idArticle
			WHERE idUtilisateur = :idUtilisateur');
	$reponse->execute(array('idUtilisateur' => $idUtilisateur));
    $donnees = $reponse->fetchAll();	// plusieurs données
	$reponse->closeCursor();
    return $donnees;
}

/*Affiche le prix total du panier*/
function getPrixTotalPanier($idUtilisateur) {
    $db = getDb();
    $reponse = $db->prepare('SELECT SUM(a.prixArticle) AS prixTotal
		FROM panier p
		INNER JOIN articles a 
		ON a.idArticle = p.idArticle
		WHERE idUtilisateur = :idUtilisateur');
    $reponse->execute(array('idUtilisateur' => $idUtilisateur));
	$donnees = $reponse->fetch(); // une seul données
    $reponse->closeCursor();
	return $donnees;
}

/*Supprimer un article via l'id du panier*/
function deleteArticlePanier($idPanier) {
    $db = getDb();
    $reponse = $db->prepare('DELETE FROM panier WHERE idPanier = :idPanier');
    $reponse->execute(array('idPanier' => $idPanier));
    $reponse->closeCursor();
}
/*Supprime le panier après commande*/
function deletePanier_idUtilisateur($idUtilisateur) {
    $reponse = $db->prepare('DELETE FROM panier WHERE idUtilisateur = :idUtilisateur');
    $reponse->execute(array('idUtilisateur' => $idUtilisateur));
    $reponse->closeCursor();
}
/*Ajoute un article dans le panier*/
function newArticlePanier($idUtilisateur, $idArticle) {
    $query = 'INSERT INTO panier SET idUtilisateur = :idUtilisateur, idArticle = :idArticle';
    $db = getDb();
    $reponse = $db->prepare($query);
    $reponse->execute(array('idUtilisateur' => $idUtilisateur, 'idArticle' => $idArticle));
    $reponse->closeCursor(); // Termine le traitement de la requête
}

// /* Ajoute une nouvelle commande*/
// function newCommande($idUtilisateur) {
// $prixTotal = getPrixTotalPanier($idUtilisateur);
// $query = 'START TRANSACTION; 
			// INSERT INTO entetecommande (idUtilisateur, idStatut, dateCommande, prixTotal)
			// VALUES (:idUtilisateur, 1, NOW(), :prixTotal)

			// DECLARE @id INT
			// SET @id = LAST_INSERT_ID()

			// INSERT INTO detailscommande (idEnTeteCommande, idArticle, prixUnitaire)
			// SELECT @id, p.idArticle, a.prixArticle
			// FROM panier p
			// INNER JOIN articles a 
			// WHERE p.idUtilisateur = :idUtilisateur)
			
			// DELETE FROM panier WHERE idUtilisateur = :idUtilisateur
		// COMMIT;';
// $db = getDb();
// $reponse = $db->prepare($query);
// $reponse->execute(array('idUtilisateur' => $idUtilisateur, 'prixTotal' => floatval($prixTotal)));
// $reponse->closeCursor(); // Termine le traitement de la requête
// }


?>