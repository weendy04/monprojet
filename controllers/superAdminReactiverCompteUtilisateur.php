<?php
require 'models/utilisateur.php';
session_start();
if(empty($_SESSION['email'])){
    header('Location: index');
    exit();
}

if(!empty($_POST['idUtilisateur']))
{
	$isActive = 1;
    $utilisateur = isActiveUtilisateur($_POST['idUtilisateur'], $isActive);
	header('Location: superAdminReactiver');
	exit();
}
