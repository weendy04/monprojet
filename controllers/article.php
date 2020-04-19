<?php
require 'models/article.php';
session_start();

if(!empty($_POST['idArticle']))
{
    $article = getArticles_idArticle($_POST['idArticle']);
}
include 'views/article.php';
?>