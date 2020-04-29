<?php
require 'models/commande.php';
//session_start();

if(!empty($_POST['idPanier']))
{
	$article = deleteArticlePanier($_POST['idPanier']);
    header('Location: panier');
    exit();
}
