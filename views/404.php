<?php ob_start() ?>
Désolé, la page <b><?=$uri?></b> n'existe pas...
<?php
$title = '404';
$content = ob_get_clean();
include 'includes/layout.php';
?>
