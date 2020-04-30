<?php
require 'db.php';

// ------------------------------------ EnTeteCommandes --------------------------------


/*Reprend toutes les en tête des commandes*/
function getEnTeteCommandes() {
    $db = getDb();
    $reponse = $db->query(
	'SELECT e.idEnTeteCommande, u.prenom, u.nom, u.idUtilisateur, s.idStatut, s.nomStatut,  e.prixTotal,e.dateCommande
	FROM enTeteCommande AS e
	INNER JOIN utilisateurs AS u 
		ON e.idUtilisateur = u.idUtilisateur
	INNER JOIN statut AS s 
		ON e.idStatut = s.idStatut
		order by e.dateCommande desc');
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor(); 
    return $donnees;
}
/* reprend les EnTeteCommandes pour un utilisateur spécifique*/
function getEnTeteCommandes_idUtilisateur($idUtilisateur) {
    $db = getDb();
	$reponse = $db->prepare('SELECT e.idEnTeteCommande,e.idUtilisateur, s.nomStatut, e.prixTotal, e.dateCommande
		FROM enTeteCommande as e
		INNER JOIN statut AS s 
			ON e.idStatut = s.idStatut
		WHERE e.idUtilisateur = :idUtilisateur
		order by e.dateCommande desc');
    $reponse->execute(array('idUtilisateur' => $idUtilisateur));
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor(); 
    return $donnees;
}

/*Modifie le statut d'une EnTeteCommandes*/
function updateEnTeteCommandes_idStatut($idEnTeteCommande, $idStatut) {
    $query = 'UPDATE enTeteCommande SET idStatut = :idStatut
			WHERE idEnTeteCommande = :idEnTeteCommande;';
    $db = getDb();
    $reponse = $db->prepare($query);
    $reponse->execute(array('idEnTeteCommande' => $idEnTeteCommande, 'idStatut' => $idStatut));
    $reponse->closeCursor();
}


// ------------------------------------ DetailsCommandes --------------------------------


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


// ------------------------------------ Panier --------------------------------


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
	$db = getDb();
    $reponse = $db->prepare('DELETE FROM panier WHERE idUtilisateur = :idUtilisateur');
    $reponse->execute(array('idUtilisateur' => $idUtilisateur));
    $reponse->closeCursor();
}
/*Ajoute un article dans le panier*/
function newArticlePanier($idUtilisateur, $idArticle) {
    $db = getDb();
    $query = 'INSERT INTO panier SET idUtilisateur = :idUtilisateur, idArticle = :idArticle';
    $reponse = $db->prepare($query);
    $reponse->execute(array('idUtilisateur' => $idUtilisateur, 'idArticle' => $idArticle));
    $reponse->closeCursor(); // Termine le traitement de la requête
}


// ------------------------------------ Commande --------------------------------


function newCommande($idUtilisateur) {
	$db = getDb();

	$query ='CALL Commande (:idUtilisateur)';	
	$reponse = $db->prepare($query);
    $reponse->execute(array('idUtilisateur' => $idUtilisateur));
    $reponse->closeCursor();
}


// ---------------------------------- Articles les plus vendu --------------------------
function getArticleGraph() {
	$db = getDb();
	$query = 'SELECT a.nomArticle, COUNT(d.idArticle)AS Nb_Article
				FROM detailsCommande d
				inner join articles a
					on d.idArticle = a.idArticle
				GROUP BY d.idArticle
				ORDER BY COUNT(d.idArticle) desc';
	$reponse = $db->query($query);
	$donnees = $reponse->fetchAll();
	$reponse->closeCursor(); // Termine le traitement de la requête
	return $donnees;
}

function getJson($articles)
{
	// supprime les données dans mon json
	//unset($s_file);
	
	//$s_file = 'json/completerArticle.json';
	
	try {
		// On crée le tableau JSON
		$tableau_pour_json = array();

		foreach ($articles as $article)  
		{
			// On ajoute le nouvel élement
			array_push($tableau_pour_json, array(
					'Article' => $article["nomArticle"],
					'Nombre' => $article["Nb_Article"]
				)
			);
		}
		
		echo json_encode($tableau_pour_json);

		// On réencode en JSON
		//$contenu_json = json_encode($tableau_pour_json);

		// On stocke tout le JSON
		//file_put_contents($s_file, $contenu_json);

		//echo "Vos informations ont été enregistrées";
	}
    catch(Exception $e) {
		echo "Erreur : ".$e->getMessage();
    }
}

?>
