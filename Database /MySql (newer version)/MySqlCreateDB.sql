-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Dingo
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Dingo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Dingo` DEFAULT CHARACTER SET utf8 ;
USE `Dingo` ;

-- -----------------------------------------------------
-- Table `Dingo`.`restoran`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Dingo`.`restoran` (
  `id_restorana` INT NOT NULL AUTO_INCREMENT,
  `naziv_restorana` VARCHAR(30) NOT NULL,
  `ukupan_broj_stolova` INT(100) NOT NULL DEFAULT 20,
  `grad` VARCHAR(45) NOT NULL,
  `adresa` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_restorana`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Dingo`.`korisnik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Dingo`.`korisnik` (
  `id_korisnika` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(45) NOT NULL,
  `prezime` VARCHAR(45) NOT NULL,
  `broj_mobilnog` VARCHAR(15) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_korisnika`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Dingo`.`rezervacija`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Dingo`.`rezervacija` (
  `id_rezervacije` BIGINT NOT NULL AUTO_INCREMENT,
  `id_restorana` INT NOT NULL,
  `id_korisnika` INT NOT NULL,
  `sat` INT NOT NULL,
  `datum` DATE NULL,
  `broj_stolova` INT NULL,
  PRIMARY KEY (`id_rezervacije`, `id_restorana`, `id_korisnika`),
  INDEX `id_korisnika_idx` (`id_korisnika` ASC),
  CONSTRAINT `id_restorana`
    FOREIGN KEY (`id_restorana`)
    REFERENCES `Dingo`.`restoran` (`id_restorana`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_korisnika`
    FOREIGN KEY (`id_korisnika`)
    REFERENCES `Dingo`.`korisnik` (`id_korisnika`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Dingo`.`vrsta_hrane`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Dingo`.`vrsta_hrane` (
  `vrsta_hrane` VARCHAR(50) NOT NULL DEFAULT 'Razno',
  PRIMARY KEY (`vrsta_hrane`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Dingo`.`restoran_vrsta_hrane`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Dingo`.`restoran_vrsta_hrane` (
  `id_restorana` INT NOT NULL,
  `vrsta_hrane` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_restorana`, `vrsta_hrane`),
  INDEX `fk_restoran_has_vrsta_hrane_vrsta_hrane1_idx` (`vrsta_hrane` ASC),
  INDEX `fk_restoran_has_vrsta_hrane_restoran1_idx` (`id_restorana` ASC),
  CONSTRAINT `fk_restoran_has_vrsta_hrane_restoran1`
    FOREIGN KEY (`id_restorana`)
    REFERENCES `Dingo`.`restoran` (`id_restorana`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_restoran_has_vrsta_hrane_vrsta_hrane1`
    FOREIGN KEY (`vrsta_hrane`)
    REFERENCES `Dingo`.`vrsta_hrane` (`vrsta_hrane`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
