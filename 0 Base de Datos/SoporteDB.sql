-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema soporte
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema soporte
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `soporte` DEFAULT CHARACTER SET utf8 ;
USE `soporte` ;

-- -----------------------------------------------------
-- Table `soporte`.`equipo_tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `soporte`.`equipo_tipos` ;

CREATE TABLE IF NOT EXISTS `soporte`.`equipo_tipos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soporte`.`equipo_marcas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `soporte`.`equipo_marcas` ;

CREATE TABLE IF NOT EXISTS `soporte`.`equipo_marcas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soporte`.`equipo_modelos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `soporte`.`equipo_modelos` ;

CREATE TABLE IF NOT EXISTS `soporte`.`equipo_modelos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `marca_id` INT NOT NULL,
  `nombre` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_equipo_modelos_equipo_marcas1_idx` (`marca_id` ASC),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC),
  CONSTRAINT `fk_equipo_modelos_equipo_marcas1`
    FOREIGN KEY (`marca_id`)
    REFERENCES `soporte`.`equipo_marcas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soporte`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `soporte`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `soporte`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(255) NOT NULL,
  `primer_nombre` VARCHAR(255) NOT NULL,
  `segundo_nombre` VARCHAR(255) NULL,
  `primer_apellido` VARCHAR(255) NOT NULL,
  `segundo_apellido` VARCHAR(255) NOT NULL,
  `telefono` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soporte`.`equipo_clientes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `soporte`.`equipo_clientes` ;

CREATE TABLE IF NOT EXISTS `soporte`.`equipo_clientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(255) NOT NULL,
  `apellidos` VARCHAR(255) NOT NULL,
  `telefono` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `usuario_id` INT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_equipo_clientes_usuarios1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_equipo_clientes_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `soporte`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soporte`.`equipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `soporte`.`equipos` ;

CREATE TABLE IF NOT EXISTS `soporte`.`equipos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero_serie` VARCHAR(255) NOT NULL,
  `tipo_id` INT NOT NULL,
  `marca_id` INT NOT NULL,
  `modelo_id` INT NOT NULL,
  `descripcion` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Equipo_Equipo_tipo_idx` (`tipo_id` ASC),
  INDEX `fk_Equipo_Equipo_marca1_idx` (`marca_id` ASC),
  INDEX `fk_Equipo_Equipo_modelo1_idx` (`modelo_id` ASC),
  CONSTRAINT `fk_Equipo_Equipo_tipo`
    FOREIGN KEY (`tipo_id`)
    REFERENCES `soporte`.`equipo_tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Equipo_Equipo_marca1`
    FOREIGN KEY (`marca_id`)
    REFERENCES `soporte`.`equipo_marcas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Equipo_Equipo_modelo1`
    FOREIGN KEY (`modelo_id`)
    REFERENCES `soporte`.`equipo_modelos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soporte`.`servicio_estados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `soporte`.`servicio_estados` ;

CREATE TABLE IF NOT EXISTS `soporte`.`servicio_estados` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soporte`.`equipo_servicios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `soporte`.`equipo_servicios` ;

CREATE TABLE IF NOT EXISTS `soporte`.`equipo_servicios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `equipo_id` INT NOT NULL,
  `cliente_id` INT NOT NULL,
  `servicio_estados_id` INT UNSIGNED NOT NULL,
  `tecnico_id` INT NULL,
  `motivo_o_problema` VARCHAR(255) NOT NULL,
  `cotizacion` DECIMAL(8,2) NOT NULL,
  `cobro` DECIMAL(8,2) NULL,
  `observaciones` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Equipo_servicio_Equipo1_idx` (`equipo_id` ASC),
  INDEX `fk_equipo_servicios_equipo_clientes1_idx` (`cliente_id` ASC),
  INDEX `fk_equipo_servicios_usuarios1_idx` (`tecnico_id` ASC),
  INDEX `fk_equipo_servicios_servicio_estados1_idx` (`servicio_estados_id` ASC),
  CONSTRAINT `fk_Equipo_servicio_Equipo1`
    FOREIGN KEY (`equipo_id`)
    REFERENCES `soporte`.`equipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_servicios_equipo_clientes1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `soporte`.`equipo_clientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_servicios_usuarios1`
    FOREIGN KEY (`tecnico_id`)
    REFERENCES `soporte`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_servicios_servicio_estados1`
    FOREIGN KEY (`servicio_estados_id`)
    REFERENCES `soporte`.`servicio_estados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soporte`.`equipo_has_cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `soporte`.`equipo_has_cliente` ;

CREATE TABLE IF NOT EXISTS `soporte`.`equipo_has_cliente` (
  `equipo_id` INT NOT NULL,
  `cliente_id` INT NOT NULL,
  PRIMARY KEY (`equipo_id`, `cliente_id`),
  INDEX `fk_equipo_has_equipo_cliente_equipo_cliente1_idx` (`cliente_id` ASC),
  INDEX `fk_equipo_has_equipo_cliente_equipo1_idx` (`equipo_id` ASC),
  CONSTRAINT `fk_equipo_has_equipo_cliente_equipo1`
    FOREIGN KEY (`equipo_id`)
    REFERENCES `soporte`.`equipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_has_equipo_cliente_equipo_cliente1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `soporte`.`equipo_clientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
