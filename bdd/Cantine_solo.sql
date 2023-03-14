CREATE DATABASE IF NOT EXISTS `cantine` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;

use `cantine`;

DROP TABLE IF EXISTS `Utilisateur`;
CREATE TABLE IF NOT EXISTS `Utilisateur`(
	`id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(50) NOT NULL,
	`prenom` VARCHAR(50) NOT NULL,
	`mail` VARCHAR(50) NOT NULL,
	`motdepasse` VARCHAR(50) NOT NULL,
	`ref_repas` int(11) NOT NULL,
	PRIMARY KEY (`id_utilisateur`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	
DROP TABLE IF EXISTS `Repas`;
CREATE TABLE IF NOT EXISTS `Repas`(
	`id_repas` int(11) NOT NULL AUTO_INCREMENT,
	`plat` VARCHAR(50) NOT NULL,
	`jour` DATE NOT NULL,
	`prix` FLOAT(50) NOT NULL,
	PRIMARY KEY (`id_repas`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	
	ALTER TABLE `Utilisateur`
ADD CONSTRAINT `fk_utilisateur_repas` FOREIGN KEY (`ref_repas`) REFERENCES `repas` (`id_repas`);