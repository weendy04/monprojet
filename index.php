<?php
session_start();
define('ROOT_PATH', "/"); 
$request = preg_replace("/".preg_quote(ROOT_PATH, '/')."/", "", $_SERVER['REQUEST_URI'],  1);
//$request = str_replace(ROOT_PATH, "", $_SERVER['REQUEST_URI']); 
//$segments = array_filter(explode('/', $request)); 
$segments = array_filter(explode('/', $request)); // On découpe la requête pour obtenir une liste et on supprime les éléments Null


// je dois commencer à 1
if (!count($segments) or $segments[0] == 'index'){
    $segments[0] = 'welcome';
}
//Les "?? Null" sont là pour initialiser la constante à Null si aucun élément existe.
define('REQ_TYPE', $segments[0] ?? Null); 
define('REQ_TYPE_ID', $segments[1] ?? Null);
define('REQ_ACTION', $segments[2] ?? Null);
//Ex: url: monprojet.devel/article/1
//Constante REQ_TYPE sera = à "article"
//REQ_TYPE_ID sera = à "1"
//REQ_ACTION sera = à Null


$file = 'controllers/'.REQ_TYPE.'.php';

if(file_exists($file)){ // On vérifie que le fichier php existe
    require $file;
    exit();
}
else {
    require 'controllers/404.php';
    exit();
}
?>