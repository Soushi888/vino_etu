-- -----------------------------------------------------
-- Schema vinodb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema vinodb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `vinodb` DEFAULT CHARACTER SET utf8;

USE `vinodb`;

-- -----------------------------------------------------
-- Table `vinodb`.`vino_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vinodb`.`vino_type` (
  `id` INT(11) NOT NULL,
  `type` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;

-- -----------------------------------------------------
-- Table `vinodb`.`vino_bouteille`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vinodb`.`vino_bouteille` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(200) NOT NULL,
  `image` VARCHAR(200) NOT NULL,
  `code_saq` VARCHAR(50) NOT NULL,
  `pays` VARCHAR(50) NOT NULL,
  `description` VARCHAR(200) NOT NULL,
  `prix_saq` FLOAT NOT NULL,
  `url_saq` VARCHAR(200) NOT NULL,
  `url_img` VARCHAR(200) NOT NULL,
  `format` VARCHAR(20) NOT NULL,
  `vino_type_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vino_bouteille_vino_type1_idx` (`vino_type_id` ASC)
) ENGINE = InnoDB AUTO_INCREMENT = 11 DEFAULT CHARACTER SET = latin1;

-- -----------------------------------------------------
-- Table `vinodb`.`vino_adresse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vinodb`.`vino_adresse` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `rue` VARCHAR(255) NOT NULL,
  `ville` VARCHAR(255) NOT NULL,
  `pays` VARCHAR(255) NOT NULL,
  `cp` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `vinodb`.`vino_utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vinodb`.`vino_utilisateur` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `prenom` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `mdp` VARCHAR(255) NOT NULL,
  `telephone` VARCHAR(255) NOT NULL,
  `type` VARCHAR(255) NOT NULL,
  `adresse_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vino_utilisateur_adresse1_idx` (`adresse_id` ASC)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `vinodb`.`vino_cellier`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vinodb`.`vino_cellier` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `vino_utilisateur_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vino_cellier_vino_utilisateur1_idx` (`vino_utilisateur_id` ASC),
  CONSTRAINT `fk_vino_cellier_vino_utilisateur1` FOREIGN KEY (`vino_utilisateur_id`) REFERENCES `vinodb`.`vino_utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 10 DEFAULT CHARACTER SET = latin1;

-- -----------------------------------------------------
-- Table `vinodb`.`vino_cellier_has_vino_bouteille`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vinodb`.`vino_cellier_has_vino_bouteille` (
  `vino_cellier_id` INT(11) NOT NULL,
  `vino_bouteille_id` INT(11) NOT NULL,
  `quantite` VARCHAR(255) NOT NULL,
  `date_achat` TIMESTAMP NOT NULL,
  `garde_jusqua` TIMESTAMP NOT NULL,
  `notes` VARCHAR(255) NOT NULL,
  `prix` FLOAT NOT NULL,
  `millesime` YEAR NOT NULL,
  PRIMARY KEY (`vino_cellier_id`, `vino_bouteille_id`),
  INDEX `fk_vino_cellier_has_vino_bouteille_vino_bouteille1_idx` (`vino_bouteille_id` ASC),
  INDEX `fk_vino_cellier_has_vino_bouteille_vino_cellier1_idx` (`vino_cellier_id` ASC)
) ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;