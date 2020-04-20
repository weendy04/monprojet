<?php
require 'models/enTeteCommande.php';
session_start();
if(!empty($_POST['idEnTeteCommande']))
{
	$idEnTeteCommande = $_POST['idEnTeteCommande'];
	$idStatut = $_POST['idStatut'];
	
	$enTeteCommande = updateEnTeteCommandes_idStatut($idEnTeteCommande, $idStatut);
	header('Location: adminCommandes');
	exit();
}
include 'views/formulaireCommandeStatut.php';
?>
