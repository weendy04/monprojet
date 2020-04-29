<?php
require 'models/article.php';
//session_start();

if(!empty($_POST['idArticle']))
{
    $isActive = 1;
	$article = isActiveArticle($_POST['idArticle'], $isActive);
    header('Location: adminReactiverArticleListe');
    exit();
}
