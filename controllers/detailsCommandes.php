<?php
require 'models/commande.php';
//session_start();

if(!empty($_POST['idEnTeteCommande']))
{
    $commandes = getDetailsCommande_idEnTeteCommande($_POST['idEnTeteCommande']);
}
include 'views/detailsCommandes.php';
?>