<?php
require 'models/commande.php';
//session_start();

if(!empty($_POST['idArticle']))
{
	$article = deleteArticlePanier($_POST['idArticle']);
}