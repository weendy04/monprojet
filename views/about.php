<?php ob_start() ?>
Projet de site e-commerce pour le cours de projet web.<br>
Le site permet selon le statut de (chaque statut à les rôles du précedent):
<br>
- Tous<br>
&emsp; &emsp;	- Voir les articles et le détail<br>
&emsp; &emsp;	- Se connecter/ s'inscrire<br>
<br>	
- Utilisateur connecté<br>
&emsp; &emsp;	- Ajouter des articles dans leur panier<br>
&emsp; &emsp;	- Commander<br>
&emsp; &emsp;	- Modifier ses données personnels<br>
&emsp; &emsp;	- Voir ses commandes et le détail<br>
<br>
- Admin <br>
&emsp; &emsp;	- Ajouter des articles<br>
&emsp; &emsp;	- Modifier/désactiver/activer des articles<br>
&emsp; &emsp;	- Promouvoir un client en admin<br>
&emsp; &emsp;	- désactiver le compte d'un utilisateur<br>
&emsp; &emsp;	- Voir les commandes plus le détail<br>
&emsp; &emsp;	- Changer le statut d'une commande<br>
&emsp; &emsp;	- Voir le graphique des articles les plus vendu<br>
<br>
- Super Admin<br>
&emsp; &emsp;	- Promouvoir/retrograder les rôles des utilisateurs<br>
&emsp; &emsp;	- Activer des utilisateurs<br>
<?php	
$title = 'A propos';
$content = ob_get_clean();
include 'includes/layout.php';
?>
