<?php
require 'models/enTeteCommande.php';
session_start();

$commandes = getEnTeteCommandes_idUtilisateur($_SESSION['idUtilisateur']);
include 'views/clientCommande.php';
?>
