<?php
require 'models/utilisateur.php';
session_start();
if(empty($_SESSION['email'])){
    header('Location: index');
    exit();
}

if(!empty($_GET['idUtilisateur']))
{
	$idRole = 3;
    $utilisateur = updateUtilisateur_idRole($_GET['idUtilisateur'], $idRole);
    header('Location: views/superAdminAdministrateurs');
    exit();
}