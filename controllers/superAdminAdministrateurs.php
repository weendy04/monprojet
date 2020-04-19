<?php
require 'models/utilisateur.php';
session_start();
if(empty($_SESSION['email'])){
    header('Location: index');
    exit();
}
$utilisateurs = getUtilisateurs();
include 'views/superAdminAdministrateurs.php';
?>
