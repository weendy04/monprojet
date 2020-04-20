<?php
require 'models/article.php';
session_start();
if (empty($_POST['idArticle']))
{
	header('Location: index');
	exit();
}
if(!empty($_POST['idArticle'])&& !empty ($_POST['nomArticle']) && !empty ($_POST['prixArticle']) && !empty ($_POST['descriptionArticle'])&& !empty ($_POST['nomImageArticle']))
	{
		$idArticle = $_POST['idArticle'];
		$nomArticle = $_POST['nomArticle'];
		$prixArticle = $_POST['prixArticle'];		
		$descriptionArticle = $_POST['descriptionArticle'];
		$nomImageArticle = $_POST['nomImageArticle'];
		$values = array('nomArticle' => $nomArticle, 'prixArticle' => $prixArticle, 'descriptionArticle' => $descriptionArticle, 'nomImageArticle' => $nomImageArticle);
		$article = updateArticles_idArticle($idArticle, $values);
		header('Location: adminArticles');
		exit();
	}
include 'views/formulaireModificationArticle.php';
?>
