<?php
require 'models/panier.php';
session_start();

$articles = getArticlePanier($_SESSION['idUtilisateur']);


include 'views/panier.php';
?>