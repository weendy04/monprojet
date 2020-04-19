<?php
require 'models/enTeteCommande.php';
session_start();

$commandes = getEnTeteCommandes();
include 'views/adminCommandes.php';
?>
