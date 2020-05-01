<?php
require 'models/commande.php';
//session_start();

if(!empty(REQ_TYPE_ID))
{
    $commandes = getDetailsCommande_idEnTeteCommande(REQ_TYPE_ID);
}
include 'views/detailsCommande.php';
?>