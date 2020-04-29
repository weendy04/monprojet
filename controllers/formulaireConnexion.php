<?php
require 'models/utilisateur.php';
$error = '';
//session_start();
if(!empty($_POST))
{
	if(!empty($_POST['email']) && !empty($_POST['mdp']))
	{
		$utilisateur = getUtilisateur($_POST['email']);
		if ($utilisateur["isActive"] != 0)
		{
			if(!$utilisateur)
			{
				$error = 'Mauvais email!';
			}
			elseif(!password_verify($_POST['mdp'], $utilisateur['mdp']))
			{
				$error = 'Mauvais mdp !';
			}
			else 
			{
				// On ouvre la session
				//session_start();
				// On enregistre le données en session			
				$_SESSION['idUtilisateur'] = $utilisateur['idUtilisateur'];
				$_SESSION['email'] = $utilisateur['email'];
				$_SESSION['nom'] = $utilisateur['nom'];
				$_SESSION['prenom'] = $utilisateur['prenom'];
				$_SESSION['idRole'] = $utilisateur['idRole'];
				header('Location: index');
				exit();
			}
		}
		else
		{
			$error = 'Votre compte à était désactivé. Veillez contacter SuperAdmin.wendy@gmail.com';
		}
	}
	else
	{
		$error = 'Veuillez inscrire vos identifiants svp !';
	}

}
include 'views/formulaireConnexion.php';
?>