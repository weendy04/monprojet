CREATE DATABASE menuiserie;
-- drop database menuiserie
USE menuiserie;

/* Utilisateur*/
CREATE TABLE roles(idRole INT PRIMARY KEY AUTO_INCREMENT, nomRole VARCHAR(255))ENGINE = INNODB;		
CREATE TABLE utilisateurs (idUtilisateur INT PRIMARY KEY AUTO_INCREMENT, idRole INT, nom VARCHAR(255), prenom VARCHAR(255), email VARCHAR(500) UNIQUE, mdp VARCHAR(255), isActive INT, FOREIGN KEY (idRole) REFERENCES roles (idRole) )ENGINE = INNODB;

/*Article*/
CREATE TABLE articles (idArticle INT PRIMARY KEY AUTO_INCREMENT, nomArticle VARCHAR(255), prixArticle NUMERIC (10,2), descriptionArticle VARCHAR(500), nomImageArticle VARCHAR(255), isActive INT)ENGINE = INNODB;
/*Commande*/
CREATE TABLE panier (idPanier INT PRIMARY KEY AUTO_INCREMENT, idUtilisateur INT, idArticle INT, FOREIGN KEY (idUtilisateur) REFERENCES utilisateurs (idUtilisateur), FOREIGN KEY (idArticle) REFERENCES articles (idArticle))ENGINE = INNODB;
CREATE TABLE statut(idStatut INT PRIMARY KEY AUTO_INCREMENT, nomStatut VARCHAR(255))ENGINE = INNODB;
CREATE TABLE enTeteCommande(idEnTeteCommande INT PRIMARY KEY AUTO_INCREMENT, idUtilisateur INT, idStatut INT, prixTotal NUMERIC (10,2), dateCommande DATE, FOREIGN KEY (idUtilisateur) REFERENCES utilisateurs (idUtilisateur), FOREIGN KEY (idStatut) REFERENCES statut (idStatut))ENGINE = INNODB;
CREATE TABLE detailsCommande(idDetailsCommande INT PRIMARY KEY AUTO_INCREMENT, idEnTeteCommande INT, idArticle INT, prixUnitaire NUMERIC (10,2), FOREIGN KEY (idArticle) REFERENCES articles (idArticle), FOREIGN KEY (idEnTeteCommande) REFERENCES enTeteCommande (idEnTeteCommande))ENGINE = INNODB; 

-- -----------------------------------------------------------------------------------------------------------------------

/*Utilisateur*/
INSERT INTO roles (nomRole)
	VALUES  ('SuperAdmin'),
		('Admin'),
		('Client');		
INSERT INTO utilisateurs (idRole, nom, prenom, email, mdp, isActive) -- /!\ Le mot de passe est projetweb pour tous
	VALUES  (1, 'SuperAdmin', 'Wendy', 'SuperAdmin.wendy@gmail.com', '$2y$10$JlaJFTprINgMLeFQrA3FhO0pGOswSbH9FjDVZbIKlOO9t2lwxar7y',1),
		(2, 'Admin', 'Wendy', 'Admin.wendy@gmail.com', '$2y$10$erSaLTfv4e1xAV08uRmvtun3U5ooXhCM/58O1EpgDTW6Atj73G2/.',1),
		(3, 'Client', 'Wendy', 'Client.wendy@gmail.com', '$2y$10$CYs4Co9bBi42jx.ct9M1e.z9uBwlRq1R7/DAL2Fei5lkw2dooLBEO',1);

/*Article*/				
INSERT INTO articles (nomArticle, prixArticle, descriptionArticle, nomImageArticle, isActive)
	VALUES  ('Armoire', 50.50, 'Armoire de rangement : dimension 100x50x80', 'armoire.jpg',1),
		('Cage', 200.00, 'Cage pour animaux: dimension 100x100x150', 'cage.jpg',1),
		('Parc', 250.00, 'Parc pour animaux: dimension 200x120x80', 'parc.jpg',1),
		('Armoire1', 40.50, 'Armoire de rangement: dimension 90x40x60', 'armoire.jpg',1),
		('Cage1', 150.00, 'Cage pour animaux: dimension 100x50x80', 'cage.jpg',1),
		('Parc1', 300.00, 'Parc pour animaux: dimension 250x180x80', 'parc.jpg',0),
		('Armoire2', 30.50, 'Armoire de rangement: dimension 50x50x50', 'armoire.jpg',1),
		('Cage2', 100.00, 'Cage pour animaux: dimension 50x50x40', 'cage.jpg',1),
		('Parc2', 100.00, 'Parc pour animaux: dimension 150x90x60', 'parc.jpg',0);
				
/*Commande*/
INSERT INTO statut (nomStatut)
	VALUES  ('En cours'),
		('En attente'),
		('Envoyer');
/*INSERT INTO enTeteCommande (idUtilisateur, idStatut, prixTotal, dateCommande)
	VALUES  (1, 1,'2019-12-12', 50.50),
		(2, 2,'2020-12-12', 250.50),
		(3, 3,'2014-12-12',100.00),
		(1, 1,'2012-12-12',,),
		(2, 2,'2012-09-12',),
		(3, 3,'2019-12-12',),
		(1, 1,'2012-12-12',),
		(1, 2,'2016-08-12',),
		(2, 3,'2012-12-31',);
		
INSERT INTO detailsCommande (idEnTeteCommande, idArticle, prixUnitaire)
	VALUES  (1, 1, 50.50),
		(2, 2, 200.00),
		(3, 3, 100.00),
		(2, 1, 50.50),
		(6, 2, 200.00),
		(7, 3, 100.00),
                (7, 1, 50.50),
		(5, 2, 200.00),
		(4, 3, 100.00);*/
INSERT INTO panier (idUtilisateur, idArticle)
	VALUES  (1,1),
		(1,2),
		(3,2);	


