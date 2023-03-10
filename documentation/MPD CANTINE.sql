CREATE DATABASE 'Cantine' DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE 'Cantine';

CREATE TABLE IF NOT EXISTS 'Eleve'(
'id_eleve' int(11) NOT NULL AUTO_INCREMENT,
'nom' varchar(50) NOT NULL,
'prenom' varchar(50) NOT NULL,
'ref_classe' int(11) NOT NULL,
PRIMARY KEY('id_eleve')
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'Classe'(
'id_classe' int(11) NOT NULL AUTO_INCREMENT,
'type' varchar(50) NOT NULL,
PRIMARY KEY('id_classe')
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'Assigner'(
'ref_classe' int(11) NOT NULL,
'ref_enseignant' int(11) NOT NULL,
PRIMARY KEY('ref_classe','ref_enseignant')
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'Enseignant'(
'id_enseignant' int(11) NOT NULL AUTO_INCREMENT,
'nom' varchar(50) NOT NULL,
'prenom' varchar(50) NOT NULL,
PRIMARY KEY('id_enseignant')
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'Réservation'(
'ref_eleve' int(11) NOT NULL AUTO_INCREMENT,
'type' varchar(50) NOT NULL,
'ref_ouverture' int (11) NOT NULL,
'ref_menu' int (11) NOT NULL,
PRIMARY KEY('ref_eleve','ref_enseignant','ref_ouverture','ref_menu')
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'Ouverture'(
'id_ouverture' int(11) NOT NULL AUTO_INCREMENT,
'date_ouverture' varchar(50) NOT NULL,
'ref_chef_cantine' int(11) NOT NULL,
PRIMARY KEY('id_ouverture','ref_chef_cantine')
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'Menu'(
'id_menu' int(11) NOT NULL AUTO_INCREMENT,
'journée' DATE NOT NULL,
'ref_ouverture' int(11) NOT NULL,
'ref_plat' int(11) NOT NULL,
PRIMARY KEY('id_menu','ref_ouverture','ref_plat')
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'ChefCantine'(
'id_chef_cantine' int(11) NOT NULL ,
'nom' varchar(50) NOT NULL ,
'quantite' int(11) NOT NULL,
PRIMARY KEY('id_chef_cantine')
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'Concevoir'(
'ref_chef_cantine' int(11) NOT NULL,
'ref_plat' int(11) NOT NULL,
PRIMARY KEY('ref_chef_cantine','ref_plat')
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'Plat'(
'id_plat' int(11) NOT NULL AUTO_INCREMENT,
'nom_plat' varchar(50) NOT NULL,
'type_plat' varchar(50) NOT NULL,
PRIMARY KEY('id_classe')
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE'Eleve'
ADD CONSTRAINT'fk_eleve_classe'FOREIGN KEY('ref_classe') REFERENCES 'Classe' ('id_classe');
ADD CONSTRAINT'fk_eleve_reservation'FOREIGN KEY('ref_eleve') REFERENCES 'Eleve' ('id_eleve');

ALTER TABLE'Assigner'
ADD CONSTRAINT'fk_assigner_classe'FOREIGN KEY('ref_classe') REFERENCES 'Classe' ('id_classe');
ADD CONSTRAINT'fk_assigner_enseignant'FOREIGN KEY('ref_enseignant') REFERENCES 'Enseignant' ('id_enseignant');

ALTER TABLE'Enseignant'
ADD CONSTRAINT'fk_enseignant_reservation'FOREIGN KEY('ref_enseignant') REFERENCES 'Enseignant' ('id_enseignant')

ALTER TABLE'Ouverture'
ADD CONSTRAINT'fk_ouverture_reservation'FOREIGN KEY('ref_ouverture') REFERENCES 'Ouverture' ('id_ouverture')
ADD CONSTRAINT'fk_ouverture_menu'FOREIGN KEY('ref_menu') REFERENCES 'Ouverture' ('id_ouverture')
ADD CONSTRAINT'fk_ouverture_chef_cantine'FOREIGN KEY('ref_chef_cantine') REFERENCES 'Chef Cantine' ('id_chef_cantine')

ALTER TABLE'Menu'
ADD CONSTRAINT'fk_reservation_menu'FOREIGN KEY('ref_menu') REFERENCES 'Menu' ('id_menu')
ADD CONSTRAINT'fk_menu_plat'FOREIGN KEY('ref_plat') REFERENCES 'Plat' ('id_plat')

ALTER TABLE'Concevoir'
ADD CONSTRAINT'fk_concevoir_chef_cantine'FOREIGN KEY('ref_chef_cantine') REFERENCES 'Chef Cantine' ('id_chef_cantine')
ADD CONSTRAINT'fk_concevoir_menu'FOREIGN KEY('ref_menu') REFERENCES 'Menu' ('id_menu')
