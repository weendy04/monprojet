<?php
require 'models/panier.php';
session_start();

$articles = getArticlePanier($SESSION['idUtilisateur']);


include 'views/panier.php';
?>