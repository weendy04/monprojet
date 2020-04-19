<?php
require 'models/utilisateur.php';
session_start();

if(!empty($_POST['email']))
{
	$utilisateur = getUtilisateurs_idUtilisateur($_POST['idUtilisateur']);
}
include 'views/clientDonnees.php'
?>