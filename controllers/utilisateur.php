<?php
require 'models/utilisateur.php';
session_start();
if(empty($_SESSION['email'])){
    header('Location: index');
    exit();
}

if(!empty($_GET['idUtilisateur']))
{
    $utilisateur = getUtilisateurs_idUtilisateur($_GET['idUtilisateur']);
    $title = "Edition de l'utilisateur: ".$utilisateur['nom'];
    $action = "edit_user";
}
else
{
    $title = 'Nouvel utilisateur';
    $action = "new_user";
}
include 'views/formulaireInscription.php';
?>
