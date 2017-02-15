-- MySQL Script generated by MySQL Workbench
-- Wed Feb 15 12:15:52 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema trabalho_pbd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema trabalho_pbd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `trabalho_pbd` DEFAULT CHARACTER SET utf8 ;
USE `trabalho_pbd` ;

-- -----------------------------------------------------
-- Table `trabalho_pbd`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho_pbd`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL,
  `nome` VARCHAR(45) NULL,
  `auth_key` VARCHAR(45) NULL,
  `password_hash` VARCHAR(255) NULL,
  `password_reset_token` VARCHAR(255) NULL,
  `role` CHAR(3) NULL,
  `status` CHAR(3) NULL,
  `created_at` VARCHAR(45) NULL,
  `updated_at` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `data_nasc` VARCHAR(45) NULL,
  `url_img_perfil` VARCHAR(45) NULL,
  `categoria` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho_pbd`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho_pbd`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `tipo` INT NOT NULL DEFAULT 0 ambas/ 1 receita/ 2 despesa,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho_pbd`.`situacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho_pbd`.`situacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `tipo` INT NOT NULL DEFAULT 0 ambas/ 1 receita/ 2 despesa,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho_pbd`.`despesa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho_pbd`.`despesa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `categoria_des_id` INT NOT NULL,
  `data_vencimento` DATE NULL,
  `valor` DOUBLE NOT NULL,
  `descricao` TEXT NULL,
  `data_cadastro` DATETIME NULL,
  `info_adicional` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  `situacao_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_despesa_categoria_des_idx` (`categoria_des_id` ASC),
  INDEX `fk_despesa_user1_idx` (`user_id` ASC),
  INDEX `fk_despesa_situacao1_idx` (`situacao_id` ASC),
  CONSTRAINT `fk_despesa_categoria_des`
    FOREIGN KEY (`categoria_des_id`)
    REFERENCES `trabalho_pbd`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_despesa_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `trabalho_pbd`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_despesa_situacao1`
    FOREIGN KEY (`situacao_id`)
    REFERENCES `trabalho_pbd`.`situacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho_pbd`.`receita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho_pbd`.`receita` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_cadastro` VARCHAR(45) NULL,
  `valor` VARCHAR(45) NOT NULL,
  `info_adicional` VARCHAR(45) NULL,
  `descricao` TEXT NULL,
  `user_id` INT NOT NULL,
  `categoria_id` INT NOT NULL,
  `situacao_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_receita_user1_idx` (`user_id` ASC),
  INDEX `fk_receita_categoria1_idx` (`categoria_id` ASC),
  INDEX `fk_receita_situacao1_idx` (`situacao_id` ASC),
  CONSTRAINT `fk_receita_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `trabalho_pbd`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_receita_categoria1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `trabalho_pbd`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_receita_situacao1`
    FOREIGN KEY (`situacao_id`)
    REFERENCES `trabalho_pbd`.`situacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
