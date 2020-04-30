Installation
============

- git clone https://https://github.com/weendy04/projetWeb
- crée un dossier "monprojet" est y mettre les dossiers et fichiers de github 


Config de Apache avec Wamp:
===========================
- C:\Windows\System32\drivers\etc\hosts => 
- Vous devriez lire vers la ligne 20 quelque chose comme ceci :
127.0.0.1 localhost
::1 localhost

Rajoutez la ligne :
127.0.0.1 monprojet.weendy 

- dans le httpd.conf => - rechercher cette ligne "# Secure (SSL/TLS) connections"
					    - une fois trouvé rajouter les deux lignes ci-dessous en dessous des #..
							- #Include conf/extra/httpd-ssl.conf
							  #Include conf/extra/monprojet.conf
- dans le httpd-vhosts.conf => - Mettre en commentaire tout ce qu'il y a dedans avec  un "#".
							   - Rajouter ces lignes:
									#####
									## monprojet.weendy
									## DOMAINE de monprojet
									#####

									<Directory "C:/wamp/www/monprojet">
									AllowOverride All
									Options Indexes MultiViews FollowSymLinks
									Require all granted
									</Directory>

									<VirtualHost *:80>
									DocumentRoot C:/wamp/www/monprojet
									ServerName monprojet.weendy
									</VirtualHost>
Test projet :
=============
 - Connexion: 
   SuperAdmin.wendy@gmail.com
   Admin.wendy@gmail.com
   Client.wendy@gmail.com
   
   MDP => projetweb
 
 - Ajouter un article:
   Article : "Poire" ou "bougeoir"
   prix : comme vous voulez
   description : comme vous voulez
   nom image : "poire.jpg" ou "bougeoir.jpg"
