<?php
require 'models/commande.php';
//session_start();

if(!empty($_SESSION['idUtilisateur']))
{

	newCommande($_SESSION['idUtilisateur']);
	 
    header('Location: '.ROOT_PATH.'clientCommande');
    exit();
}
header('Location: index');
?>
