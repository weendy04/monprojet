<?php
require 'models/commande.php';
//session_start();
$articles = getArticleGraph();
getJson($articles);
?>
