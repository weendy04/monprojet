<?php
require 'models/commande.php';
//session_start();

if(!empty($_POST['idArticle']))
{
    $panier = newArticlePanier($_SESSION['idUtilisateur'], $_POST['idArticle']);
	header('Location: panier');
    exit();
}

?>