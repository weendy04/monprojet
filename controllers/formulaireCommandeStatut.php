<?php
require 'models/commande.php';
//session_start();
if(!empty($_POST['idEnTeteCommande']) && !empty($_POST['idStatut']))
{
	
	$idEnTeteCommande = $_POST['idEnTeteCommande'];
	$idStatut = $_POST['idStatut'];
	$enTeteCommande = updateEnTeteCommandes_idStatut($idEnTeteCommande, $idStatut);
	header('Location: adminCommandes');
	exit();
}
include 'views/formulaireCommandeStatut.php';
?>
