<?php
require 'models/article.php';
//session_start();
if (empty($_POST['idArticle']))
{
	header('Location: index');
	exit();
}
else
{
		$article = getArticles_idArticle($_POST['idArticle']);
}
if(!empty($_POST['idArticle'])&& !empty ($_POST['nomArticle']) && !empty ($_POST['prixArticle']) && !empty ($_POST['descriptionArticle'])&& !empty ($_POST['nomImageArticle']))
	{
		$idArticle = $_POST['idArticle'];
		$nomArticle = $_POST['nomArticle'];
		/* je fais un remplacement des " " par "_" je met le tout en minuscule ensuite je vient enlever le dernier "_"  qui ne sert à rien*/
		$urlArticle = str_replace(" ","-", strtolower($nomArticle));
		//$urlArticle = substr($urlArticle, 0, -1);

		$prixArticle = $_POST['prixArticle'];		
		$descriptionArticle = str_replace(" ","-",$_POST['descriptionArticle']);
		$nomImageArticle = $_POST['nomImageArticle'];
		$values = array('urlArticle' => $urlArticle, 'nomArticle' => $nomArticle, 'prixArticle' => $prixArticle, 'descriptionArticle' => $descriptionArticle, 'nomImageArticle' => $nomImageArticle);
		$article = updateArticles_idArticle($idArticle, $values);
		header('Location: adminArticles');
		exit();
	}

include 'views/formulaireArticle.php';
?>
