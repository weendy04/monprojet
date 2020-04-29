<?php
require 'models/commande.php';
//session_start();

$commandes = getEnTeteCommandes();
include 'views/adminCommandes.php';
?>
