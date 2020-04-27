<?php
require 'models/utilisateur.php';
session_start();
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['ancienMdp']) && !empty($_POST['mdp']) && !empty($_POST['mdpVerif']))
{
	
	$utilisateur_Id = getUtilisateurs_idUtilisateur($_POST['idUtilisateur']);
	if(!password_verify($_POST['ancienMdp'], $utilisateur_Id['mdp']))
	{
		$error = 'Mauvais mdp !';
	}
	if ($_POST['mdp'] === $_POST['mdpVerif'])
	{
		$idUtilisateur = $_POST['idUtilisateur'];
		$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
		$email = $_POST['email'];
		$nom = $_POST['nom'];		
		$prenom = $_POST['prenom'];
		$values = array('nom' => $nom, 'prenom' => $prenom, 'email' =>$email, 'mdp' => $mdp);
		$utilisateur = updateUtilisateurs_idUtilisateur($idUtilisateur,$values);
		session_start();
		$_SESSION['email'] = $utilisateur['email'];
		$_SESSION['nom'] = $utilisateur['nom'];
		$_SESSION['prenom'] = $utilisateur['prenom'];
		header('Location: formulaireConnexion');
		exit();
	}
}
else
	{
		$error = 'Veuillez tout compléter!';
	}
include 'views/formulaireModification.php';
?>
