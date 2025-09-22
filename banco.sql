-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema AgroFrota
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema AgroFrota
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `AgroFrota` DEFAULT CHARACTER SET utf8 ;
USE `AgroFrota` ;

-- -----------------------------------------------------
-- Table `AgroFrota`.`locador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AgroFrota`.`locador` ;

CREATE TABLE IF NOT EXISTS `AgroFrota`.`locador` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `telefone` VARCHAR(255) NOT NULL,
  `endereco` VARCHAR(255) NOT NULL,
  `cnpj_cpf` VARCHAR(255) NOT NULL,
  `documentos_validados` TINYINT NOT NULL,
  `reputacao_media` FLOAT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AgroFrota`.`locatario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AgroFrota`.`locatario` ;

CREATE TABLE IF NOT EXISTS `AgroFrota`.`locatario` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `telefone` VARCHAR(255) NOT NULL,
  `endereco` VARCHAR(255) NOT NULL,
  `classificacao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AgroFrota`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AgroFrota`.`categoria` ;

CREATE TABLE IF NOT EXISTS `AgroFrota`.`categoria` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `titulo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AgroFrota`.`equipamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AgroFrota`.`equipamento` ;

CREATE TABLE IF NOT EXISTS `AgroFrota`.`equipamento` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `nome` VARCHAR(255) NOT NULL,
  `marca` VARCHAR(255) NOT NULL,
  `modelo` VARCHAR(255) NOT NULL,
  `ano` INT NOT NULL,
  `capacidade` VARCHAR(255) NOT NULL,
  `preco_periodo` FLOAT NOT NULL,
  `disponibilidade_calendario` VARCHAR(255) NOT NULL,
  `raio_atendimento` FLOAT NOT NULL,
  `exige_operador_certificado` TINYINT NOT NULL,
  `seguro_obrigatorio` TINYINT NOT NULL,
  `caucao_obrigatoria` TINYINT NOT NULL,
  `locador_id` INT UNSIGNED NOT NULL,
  `categoria_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_equipamento_locador1_idx` (`locador_id` ASC),
  INDEX `fk_equipamento_categoria1_idx` (`categoria_id` ASC),
  CONSTRAINT `fk_equipamento_locador1`
    FOREIGN KEY (`locador_id`)
    REFERENCES `AgroFrota`.`locador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipamento_categoria1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `AgroFrota`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AgroFrota`.`locacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AgroFrota`.`locacao` ;

CREATE TABLE IF NOT EXISTS `AgroFrota`.`locacao` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  `status_equipamento` VARCHAR(255) NOT NULL,
  `tipo_locacao` TINYINT NOT NULL,
  `valor_total` FLOAT NOT NULL,
  `status_pagamento` VARCHAR(255) NOT NULL,
  `locatario_id` INT UNSIGNED NOT NULL,
  `equipamento_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_locacao_locatario_idx` (`locatario_id` ASC),
  INDEX `fk_locacao_equipamento1_idx` (`equipamento_id` ASC),
  CONSTRAINT `fk_locacao_locatario`
    FOREIGN KEY (`locatario_id`)
    REFERENCES `AgroFrota`.`locatario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_locacao_equipamento1`
    FOREIGN KEY (`equipamento_id`)
    REFERENCES `AgroFrota`.`equipamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AgroFrota`.`locatariosDaLocacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AgroFrota`.`locatariosDaLocacao` ;

CREATE TABLE IF NOT EXISTS `AgroFrota`.`locatariosDaLocacao` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  `valor_individual` FLOAT NOT NULL,
  `status_pagamento` VARCHAR(255) NOT NULL,
  `locacao_id` INT UNSIGNED NOT NULL,
  `locatario_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_locadores_locatario1_idx` (`locatario_id` ASC),
  INDEX `fk_locadores_locacao1_idx` (`locacao_id` ASC),
  CONSTRAINT `fk_locadores_locatario1`
    FOREIGN KEY (`locatario_id`)
    REFERENCES `AgroFrota`.`locatario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_locadores_locacao1`
    FOREIGN KEY (`locacao_id`)
    REFERENCES `AgroFrota`.`locacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AgroFrota`.`avaliacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AgroFrota`.`avaliacao` ;

CREATE TABLE IF NOT EXISTS `AgroFrota`.`avaliacao` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `nota` INT NOT NULL,
  `comentario` TEXT NOT NULL,
  `estado_equipamento` VARCHAR(255) NOT NULL,
  `cumprimento_contrato` VARCHAR(255) NOT NULL,
  `locacao_id` INT UNSIGNED NOT NULL,
  `locadores_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_avaliacao_locacao1_idx` (`locacao_id` ASC),
  INDEX `fk_avaliacao_locadores1_idx` (`locadores_id` ASC),
  CONSTRAINT `fk_avaliacao_locacao1`
    FOREIGN KEY (`locacao_id`)
    REFERENCES `AgroFrota`.`locacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliacao_locadores1`
    FOREIGN KEY (`locadores_id`)
    REFERENCES `AgroFrota`.`locatariosDaLocacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
