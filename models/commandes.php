<?php

/* Ajoute une nouvelle commande*/
function newCommande($idUtilisateur, $prixTotal) {
$query = '
	START TRANSACTION;

	INSERT INTO entetecommande (idUtilisateur, idStatut, dateCommande, prixTotal)
	VALUES (:idUtilisateur, 1, NOW(), :prixTotal);

	DECLARE @id INT
	SET @id = LAST_INSERT_ID()

	INSERT INTO detailscommande (idEnTeteCommande, idArticle, prixUnitaire)
	SELECT @id, p.idArticle, a.prixArticle
	FROM panier p
	INNER JOIN articles a 
	WHERE p.idUtilisateur = :idUtilisateur)

	COMMIT;';
$db = getDb();
$reponse = $db->prepare($query);
$reponse->execute(array('idUtilisateur' => $idUtilisateur, 'prixTotal' => floatval($prixTotal)));
$reponse->closeCursor(); // Termine le traitement de la requête
}




?>
