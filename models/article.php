<?php
require 'db.php';

/* avoir tout les articles*/
function getArticles() {
    $db = getDb();
    $reponse = $db->query('SELECT * FROM articles');
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $donnees;
}
/* Avoir un article avec son id*/
function getArticles_idArticle($idArticle) {
    $db = getDb();
    $reponse = $db->prepare('SELECT * FROM articles WHERE idArticle = :idArticle');
    $reponse->execute(array('idArticle' => $idArticle));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $donnees;
}
/* modifiere un article */
function updateArticles_idArticle($idArticle, $values) {
    $query = 'UPDATE articles SET';
    foreach ($values as $name => $value) {
        $query = $query.' '.$name.' = :'.$name.',';
    }
    $query = substr($query, 0, -1).' WHERE idArticle = :idArticle;';
    $db = getDb();
    $reponse = $db->prepare($query);
    $reponse->execute(array_merge(array('idArticle' => $idArticle), $values));
    $reponse->closeCursor(); // Termine le traitement de la requête
}
/* Activer/ désactiver un article*/
function isActiveArticle($idArticle, $isActive) {
	// à cause de la foreign key! je dois d'abord supprimer dans le panier
	$db = getDb();
    $reponse = $db->prepare('UPDATE articles SET isActive = :isActive where idArticle = :idArticle');
    $reponse->execute(array('idArticle' => $idArticle, 'isActive' => $isActive));
    $reponse->closeCursor(); // Termine le traitement de la requête	
}
/* Crée un article*/
function newArticle($values) {
    $query = 'INSERT INTO articles SET';
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