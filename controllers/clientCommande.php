<?php
require 'models/commande.php';
//session_start();

$commandes = getEnTeteCommandes_idUtilisateur($_SESSION['idUtilisateur']);

include 'views/clientCommande.php';
?>
