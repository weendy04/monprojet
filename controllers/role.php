<?php
require 'models/utilisateur.php';
//session_start();
if(!empty($_POST['idUtilisateur']))
{
	$idRole = $_POST['idRole'];
    $utilisateur = updateUtilisateur_idRole($_POST['idUtilisateur'], $idRole);
	if($idRole < 3){
		header('Location: adminClients');
		exit();
	}
	if($idRole == 3){
		header('Location: superAdminAdministrateurs');
		exit();
	}
	
}
