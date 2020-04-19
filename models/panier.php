<?php
require 'db.php';

function getPanier_idUtilisateur($idUtilisateur) {
    $db = getDb();
    $reponse = $db->prepare('SELECT idArticle FROM panier WHERE idUtilisateur = :idUtilisateur');
    $reponse->execute(array('idUtilisateur' => $idUtilisateur));
    $donnees = $reponse->fetch();	
    return $donnees;
}

function getArticlePanier($idUtilisateur) {
    $db = getDb();
	$ArticlePanier = getPanier_idUtilisateur(':idUtilisateur');
	foreach ($ArticlePanier as $idArticle) {
        $queryIn = $query.$idArticle.',';
    }
	$queryIn = substr($query, 0, -1);
    $reponse = $db->prepare(
	'SELECT * from articles 
	where idArticle in('.$queryIn.')');
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $donnees;
}

function deleteArticlePanier($idArticle) {
    $db = getDb();
    $reponse = $db->prepare('DELETE FROM panier WHERE idArticle = :idArticle');
    $reponse->execute(array('idArticle' => $idArticle));
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function newArticlePanier($idUtilisateur, $idArticle) {
    $query = 'INSERT INTO panier SET idUtilisateur = :idUtilisateur, idArticle = :idArticle';
    $db = getDb();
    $reponse = $db->prepare($query);
    $reponse->execute(array('idUtilisateur' => $idUtilisateur, 'idArticle' => $idArticle));
    $reponse->closeCursor(); // Termine le traitement de la requête
}
?>
