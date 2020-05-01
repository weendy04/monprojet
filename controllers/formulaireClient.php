<?php
require 'models/utilisateur.php';
//session_start();

if (REQ_ACTION == "modifier") 
{
	$utilisateur = getUtilisateurs_idUtilisateur(REQ_TYPE_ID);
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
			//session_start();
			$_SESSION['email'] = $utilisateur['email'];
			$_SESSION['nom'] = $utilisateur['nom'];
			$_SESSION['prenom'] = $utilisateur['prenom'];
			header("Location: ".ROOT_PATH."formulaireClient//connexion");
			exit();
		}
	}
	include 'views/formulaireModification.php';
}

if (REQ_ACTION == "inscription") 
{
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
			header("Location: ".ROOT_PATH."formulaireClient//connexion");
			exit();
		}
	}
	include 'views/formulaireInscription.php';
}


if (REQ_ACTION == "connexion") 
{
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
					header("Location: ".ROOT_PATH."index");
			exit();
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
}




?>
