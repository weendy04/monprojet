<?php
require 'models/commande.php';
session_start();

if(!empty($_SESSION['idUtilisateur']))
{

newCommande($_SESSION['idUtilisateur']);
	 
    header('Location: clientCommande');
    exit();
}
header('Location: index');
?>
