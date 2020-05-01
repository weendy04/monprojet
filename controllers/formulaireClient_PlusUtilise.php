<?php
require 'models/utilisateur.php';
//session_start();
if (empty($_POST['idUtilisateur']))
{
	include 'views/formulaireInscription.php';
}
else
{
	$utilisateur = getUtilisateurs_idUtilisateur($_POST['idUtilisateur']);
	include 'views/formulaireModification.php';
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
		if (empty($_POST['idUtilisateur']))
		{
			$utilisateur = newUtilisateur($values);
			
		}
		else 
		{
			$utilisateur = updateUtilisateurs_idUtilisateur($_POST['idUtilisateur'],$values);
			//session_start();
			$_SESSION['email'] = $utilisateur['email'];
			$_SESSION['nom'] = $utilisateur['nom'];
			$_SESSION['prenom'] = $utilisateur['prenom'];
			
		}
    }
	header('Location: formulaireConnexion');
	exit();
}


?>
