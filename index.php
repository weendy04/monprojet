<?php
define('ROOT_PATH', "/monprojet/"); 
$request = str_replace(ROOT_PATH, "", $_SERVER['REQUEST_URI']); 
$segments = array_filter(explode('/', $request)); 

if (count($segments) === 0 or $segments[1] === 'index')
{
    $segments[1] = 'welcome';
}
$controller = 'controllers/'.implode('/', $segments).'.php';
if (file_exists($controller)) {
    include $controller;
}
else {
    include 'controllers/404.php';
}
?>
