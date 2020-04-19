<?php
require 'models/utilisateur.php';
session_start();
if(empty($_SESSION['email'])){
    header('Location: index');
    exit();
}

if(!empty($_GET['idUtilisateur']))
{
	$idRole = 2;
    $utilisateur = updateUtilisateur_idRole($_GET['idUtilisateur'], $idRole);
    header('Location: index');
    exit();
}