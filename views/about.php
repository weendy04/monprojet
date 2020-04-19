<?php ob_start() ?>
Projet de site e-commerce pour le cours de projet web.<br>
Le site permet selon le statut de:<br>
- modifier/ supprimer des utilisateurs<br>
- ajouter/ modifier/ supprimer des articles<br>
- voir des articles<br>
- remplir son panier avec des articles<br>
<?php
$title = 'A propos';
$content = ob_get_clean();
include 'includes/layout.php';
?>
