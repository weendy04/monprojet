<?php
require 'models/commande.php';
//session_start();

if (REQ_ACTION == "ajouter") 
{
	if(!empty($_SESSION['idUtilisateur']))
	{
		if(!empty(REQ_TYPE_ID))
		{
			$panier = newArticlePanier($_SESSION['idUtilisateur'], REQ_TYPE_ID);
		}	
		
	}
}

if (REQ_ACTION == "retirer") 
{
	if(!empty(REQ_TYPE_ID))
	{
		$article = deleteArticlePanier(REQ_TYPE_ID);  
	}
}

if(!empty($_SESSION['idUtilisateur']))
{
	$articles = getArticlePanier($_SESSION['idUtilisateur']);
	$prixTotal = getPrixTotalPanier($_SESSION['idUtilisateur']);
}

include 'views/panier.php';
?>