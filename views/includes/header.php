<header class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
	<a class="navbar-brand" href="/welcome">Weendy Wood</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?php if($title =='Accueil'){echo 'active';}?>">
				<a class="nav-link" href="<?= ROOT_PATH.'welcome'?>">Accueil <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item <?php if($title =='A propos'){echo 'active';}?>">
				<a class="nav-link" href="<?= ROOT_PATH.'about'?>">A propos</a>
			</li>

			<?php if(!empty($_SESSION['email']) and ($_SESSION['idRole'] == 1)):?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="/index" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				 Menu Super administrateur
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?= ROOT_PATH.'superAdminAdministrateurs'?>">Voir administrateurs</a>
					<a class="dropdown-item" href="<?= ROOT_PATH.'adminClients'?>">Voir clients</a>
					<a class="dropdown-item" href="<?= ROOT_PATH.'formulaireArticle//ajouter'?>">Ajouter articles</a>
					<a class="dropdown-item" href="<?= ROOT_PATH.'adminArticles'?>">Voir articles</a>
					<a class="dropdown-item" href="<?= ROOT_PATH.'adminCommandes'?>">Voir les commandes</a>
					<a class="dropdown-item" href="<?= ROOT_PATH.'superAdminReactiver'?>">Réactiver compte</a>
					<a class="dropdown-item" href="<?= ROOT_PATH.'adminReactiverArticleListe'?>">Réactiver article</a>
					<a class="dropdown-item" href="<?= ROOT_PATH.'graphiqueVente'?>">Graphique des ventes</a>
				</div>	 
			</li>
			<?php endif?>
			<?php if(!empty($_SESSION['email']) and ($_SESSION['idRole'] == 2)):?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="<?= ROOT_PATH.'index'?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					 Menu administrateur
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?= ROOT_PATH.'adminClients'?>">Voir clients</a>
					<a class="dropdown-item" href="<?= ROOT_PATH.'formulaireArticle//ajouter'?>">Ajouter articles</a>
					<a class="dropdown-item" href="<?= ROOT_PATH.'adminArticles'?>">Voir articles</a>
					<a class="dropdown-item" href="<?= ROOT_PATH.'adminCommandes'?>">Voir les commandes</a>
					<a class="dropdown-item" href="<?= ROOT_PATH.'adminReactiverArticleListe'?>">Réactiver article</a>
					<a class="dropdown-item" href="<?= ROOT_PATH.'graphiqueVente'?>">Graphique des ventes</a>
					</div>	 
				</li>
			<?php endif?>
		</ul>
		
		<?php if(empty($_SESSION['email'])):?>
			<a class="btn btn-outline-success" href="<?= ROOT_PATH.'formulaireClient//connexion'?>">Connexion</a>
			<a class="btn btn-outline-success" href="<?= ROOT_PATH.'formulaireClient//inscription'?>">Inscription</a>
		<?php else: ?>
			<a href="/panier" class="btn btn-primary">Panier</a>
			<li class="btn btn-outline-success nav-item dropdown " >
				<a class="nav-link dropdown-toggle" href="<?= ROOT_PATH.'index'?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				 Salut <?=$_SESSION['prenom']?> <?=$_SESSION['nom']?>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?= ROOT_PATH.'clientDonnees'?>">Mes informations</a>
					<a class="dropdown-item" href="<?= ROOT_PATH.'clientCommande'?>">Mes commandes</a>
				</div>	 
			</li>
			<a class="btn btn-outline-success" href="<?= ROOT_PATH.'deconnexion'?>">Deconnexion</a>
		<?php endif?>
	</div>
</header>