<?php
require 'models/commandes.php';
require 'models/panier.php';
session_start();

$prixTotal = getPrixTotalPanier($_SESSION['idUtilisateur']);
$commande = newCommande($_SESSION['idUtilisateur'], $prixTotal);
$panier = deletePanier_idUtilisateur($_SESSION['idUtilisateur']);
 header('Location: clientCommande');
 exit();
?>
