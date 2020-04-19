<?php
require 'models/article.php';
session_start();

if(!empty($_POST['idArticle']))
{
    $isActive = 0;
	$article = isActiveArticle($isActive, $_POST['idArticle']);
    header('Location: adminArticles');
    exit();
}
