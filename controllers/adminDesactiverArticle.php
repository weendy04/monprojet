<?php
require 'models/article.php';
//session_start();

if(!empty($_POST['idArticle']))
{
    $isActive = 0;
	$article = isActiveArticle($_POST['idArticle'], $isActive);
    header('Location: adminArticles');
    exit();
}

include "adminDesactiverArticle.php";