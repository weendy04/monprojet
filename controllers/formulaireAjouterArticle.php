<?php
require 'models/article.php';
session_start();

if(!empty($_POST['nomArticle']) && !empty($_POST['prixArticle']) && !empty($_POST['descriptionArticle'])&& !empty($_POST['nomImageArticle']))
{
	    $nomArticle = $_POST['nomArticle'];
        $prixArticle = $_POST['prixArticle'];		
        $descriptionArticle = $_POST['descriptionArticle'];
		$nomImageArticle = $_POST['nomImageArticle'];
		$isActive = 1;
        $values = array('nomArticle' => $nomArticle, 'prixArticle' =>$prixArticle, 'descriptionArticle' => $descriptionArticle, 'nomImageArticle' => $nomImageArticle, 'isActive' =>$isActive);
        $article = newArticle($values);
        header('Location: index'); // redirige vers une autre page
        exit();
}
include 'views/formulaireAjouterArticle.php';
?>
