<?php
require 'db.php';

/*Pour la connexion*/
function getUtilisateur($email) {
    $db = getDb();
    $reponse = $db->prepare(
	'SELECT *
	FROM utilisateurs
	WHERE email = :email and isActive = 1'
	);
    $reponse->execute(array('email' => $email));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $donnees;
}
 /*Lorque j'affiche plusieurs utilisateur*/
function getUtilisateurs() {
    $db = getDb();
    $reponse = $db->query('SELECT * FROM utilisateurs');
    $donnees = $reponse->fetchAll();
    $reponse->closeCursor();
    return $donnees;
}
/* Chercher un utilisateur avec son id*/
function getUtilisateurs_idUtilisateur($idUtilisateur) {
    $db = getDb();
    $reponse = $db->prepare('SELECT * FROM utilisateurs WHERE idUtilisateur = :idUtilisateur');
    $reponse->execute(array('idUtilisateur' => $idUtilisateur));
    $donnees = $reponse->fetch();
    $reponse->closeCursor();
    return $donnees;
}
/* Modifier ses données*/
function updateUtilisateurs_idUtilisateur($idUtilisateur, $values) {
    $query = 'UPDATE utilisateurs SET';
    foreach ($values as $name => $value) {
        $query = $query.' '.$name.' = :'.$name.',';
    }
    $query = substr($query, 0, -1).' WHERE idUtilisateur = :idUtilisateur;';
    $db = getDb();
    $reponse = $db->prepare($query);
    $reponse->execute(array_merge(array('idUtilisateur' => $idUtilisateur), $values));
    $reponse->closeCursor();
}
/* Modifer le rôle d'un utilisateur*/
function updateUtilisateur_idRole($idUtilisateur, $idRole) {
    $db = getDb();
    $reponse = $db->prepare('UPDATE utilisateurs SET idRole = :idRole where idUtilisateur = :idUtilisateur');
    $reponse->execute(array('idUtilisateur' => $idUtilisateur, 'idRole' => $idRole));
    $reponse->closeCursor();
}
/* Activer /Désactiver un utilsateur car problème avec la FK si suppression*/
function isActiveUtilisateur($idUtilisateur, $isActive) {
    $db = getDb();
    $reponse = $db->prepare('UPDATE utilisateurs SET isActive = :isActive WHERE idUtilisateur = :idUtilisateur;');
    $reponse->execute(array('idUtilisateur' => $idUtilisateur, 'isActive' => $isActive));
    $reponse->closeCursor();
}
/* création d'un utilisateur*/
function newUtilisateur($values) {
    $query = 'INSERT INTO utilisateurs SET';
    foreach ($values as $name => $value) {
        $query = $query.' '.$name.' = :'.$name.',';
    }
    $query = substr($query, 0, -1);
    $db = getDb();
    $reponse = $db->prepare($query);
    $reponse->execute($values);
    $reponse->closeCursor();
}


?>
