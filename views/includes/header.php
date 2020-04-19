<header class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
	<a class="navbar-brand" href="/welcome">Weendy Wood</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?php if($title =='Accueil'){echo 'active';}?>">
				<a class="nav-link" href="/welcome">Accueil <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item <?php if($title =='A propos'){echo 'active';}?>">
				<a class="nav-link" href="about">A propos</a>
			</li>

			<?php if(!empty($_SESSION['email']) and ($_SESSION['idRole'] == 1)):?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="/index" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				 Menu Super administrateur
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="superAdminAdministrateurs">Voir administrateurs</a>
					<a class="dropdown-item" href="adminClients">Voir clients</a>
					<a class="dropdown-item" href="formulaireAjouterArticle">Ajouter articles</a>
					<a class="dropdown-item" href="adminArticles">Voir articles</a>
					<a class="dropdown-item" href="adminCommandes">Voir les commandes</a>
					<a class="dropdown-item" href="superAdminReactiver">Réactiver compte</a>
					<a class="dropdown-item" href="adminReactiverArticleListe">Réactiver article</a>
				</div>	 
			</li>
			<?php endif?>
			<?php if(!empty($_SESSION['email']) and ($_SESSION['idRole'] == 2)):?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="/index" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					 Menu administrateur
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="adminClients">Voir clients</a>
						<a class="dropdown-item" href="formulaireAjouterArticle">Ajouter articles</a>
						<a class="dropdown-item" href="adminArticles">Voir articles</a>
						<a class="dropdown-item" href="adminCommandes">Voir les commandes</a>
						<a class="dropdown-item" href="adminActiverArticle">Réactiver article</a>
					</div>	 
				</li>
			<?php endif?>
		</ul>
		<a href="/panier" class="btn btn-primary">Panier</a>
		<?php if(empty($_SESSION['email'])):?>
			<a class="btn btn-outline-success" href="/formulaireConnexion">Connexion</a>
			<a class="btn btn-outline-success" href="/formulaireInscription">Inscription</a>
		<?php else: ?>
			<li class="btn btn-outline-success nav-item dropdown " >
				<a class="nav-link dropdown-toggle" href="/index" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				 Salut <?=$_SESSION['prenom']?> <?=$_SESSION['nom']?>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="/clientDonnees">Mes informations</a>
					<a class="dropdown-item" href="/clientCommande">Mes commandes</a>
				</div>	 
			</li>
			<a class="btn btn-outline-success" href="/deconnexion">Deconnexion</a>
		<?php endif?>
	</div>
</header>