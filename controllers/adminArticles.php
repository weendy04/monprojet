<?php
require 'models/article.php';
//session_start();

$articles = getArticles();
include 'views/adminArticles.php';
?>
