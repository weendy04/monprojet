Installation
============

- git clone https://https://github.com/weendy04/projetWeb
- crée un dossier "monprojet" est y mettre les dossiers et fichiers de github 


Config de Apache avec Wamp:
===========================
- C:\Windows\System32\drivers\etc\hosts => 
	- Vous devriez lire vers la ligne 20 quelque chose comme ceci :
	<br> 127.0.0.1 localhost
	<br> ::1 localhost

	- Rajoutez la ligne :
	<br> 127.0.0.1 monprojet.weendy 

- dans le httpd.conf => 
	- rechercher cette ligne "# Secure (SSL/TLS) connections"
	- une fois trouvé rajouter les deux lignes ci-dessous en dessous des #..
		<br> #Include conf/extra/httpd-ssl.conf
		<br> #Include conf/extra/monprojet.conf
		
- dans le httpd-vhosts.conf => 
	- Mettre en commentaire tout ce qu'il y a dedans avec  un "#". 
	<br> /!\ j'ai mis wamp, si vous avez téléchargé la version 64bits n'oublier pas de changer! /!\
		- Rajouter ces lignes:
							<br>#####
							<br>## monprojet.weendy
							<br>## DOMAINE de monprojet
							<br>#####

							<Directory "C:/wamp/www/monprojet">
							AllowOverride All
							Options Indexes MultiViews FollowSymLinks
							Require all granted
							</ Directory>

							<VirtualHost *:80>
							DocumentRoot C:/wamp/www/monprojet
							ServerName monprojet.weendy
							</ VirtualHost>

		<br> /!\ n'oublier pas d'enlever les espaces après les "/".	
 	
Test projet :
=============
- url du site : http://monprojet.weendy/
- Connexion: 
	- SuperAdmin.wendy@gmail.com
	- Admin.wendy@gmail.com
	- Client.wendy@gmail.com
   
   MDP => projetweb
 
 - Ajouter un article:
   <br> Article : "Poire" ou "bougeoir"
   <br> prix : comme vous voulez
   <br> description : comme vous voulez
   <br> nom image : "poire.jpg" ou "bougeoir.jpg"
