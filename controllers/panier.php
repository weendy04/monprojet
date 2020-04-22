<?php
require 'models/panier.php';
session_start();

if(!empty($_SESSION['idUtilisateur']))
{
	$articles = getArticlePanier($_SESSION['idUtilisateur']);
	$prixTotal = getPrixTotalPanier($_SESSION['idUtilisateur']);
}

include 'views/panier.php';
?>