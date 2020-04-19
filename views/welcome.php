<?php ob_start() ?>
<h2>Les articles</h2>
<div class="card-columns">
    <?php foreach($articles as $article):?>
        <?php include 'articleWelcome.php';?>
    <?php endforeach;?>
</div>
<?php
$title = 'Accueil';
$content = ob_get_clean();
include 'includes/layout.php';
?>