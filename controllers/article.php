<?php
require 'models/article.php';
//session_start();

if(!empty(REQ_TYPE_ID))
{
    $article = getArticles_urlArticle(REQ_TYPE_ID);
}
include 'views/article.php';
?>