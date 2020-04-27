<?php
require 'models/commande.php';
session_start();
if(!empty($_POST['idEnTeteCommande']))
{
    $utilisateur = updateEnTeteCommandes_idStatut($_POST['idEnTeteCommande'], $_POST['idStatut']);

	header('Location: adminCommandes');
	exit();
	
}
