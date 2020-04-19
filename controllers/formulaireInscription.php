<?php
require 'models/utilisateur.php';
session_start();
if(!empty($_SESSION['email'])){
    header('Location: index');
    exit();
}
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['mdpVerif']))
{
    if ($_POST['mdp'] === $_POST['mdpVerif'])
	{
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $nom = $_POST['nom'];		
        $prenom = $_POST['prenom'];
		$idRole = 3;
		$isActive = 1;
        $values = array('idRole' => $idRole, 'nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'mdp' => $mdp, 'isActive' => $isActive);
        $utilisateur = newUtilisateur($values);
        header('Location: formulaireConnexion'); // redirige vers une autre page
        exit();
    }
}
include 'views/formulaireInscription.php';
?>
