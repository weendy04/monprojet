<?php
require 'models/utilisateur.php';
session_start();
if(empty($_SESSION['email'])){
    header('Location: index');
    exit();
}

if(!empty($_SESSION['idUtilisateur']))
{
    $utilisateur = isActiveUtilisateur($_SESSION['idUtilisateur']);
	header('Location: deconnexion');
	exit();
}
