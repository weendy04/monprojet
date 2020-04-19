<?php
require 'models/detailsCommande.php';
session_start();

if(!empty($_POST['idEnTeteCommande']))
{
	echo$_POST['idEnTeteCommande'];
    $commandes = getDetailsCommande_idEnTeteCommande($_POST['idEnTeteCommande']);
}
include 'views/detailsCommandes.php';
?>