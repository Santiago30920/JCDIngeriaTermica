-- MySQL Script generated by MySQL Workbench
-- Tue Jul 21 12:04:10 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema jcdingeneriatermica
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema jcdingeneriatermica
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `jcdingeneriatermica` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `jcdingeneriatermica` ;

-- -----------------------------------------------------
-- Table `jcdingeneriatermica`.`empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jcdingeneriatermica`.`empleados` (
  `Nombre` VARCHAR(45) NOT NULL,
  `Apellidos` VARCHAR(45) NOT NULL,
  `Cedula` INT NOT NULL,
  `Email` VARCHAR(100) NOT NULL,
  `Telefono` INT NOT NULL,
  `Contrasena` VARCHAR(60) NOT NULL,
  `Rol` VARCHAR(20) NOT NULL,
  `Estado` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`Cedula`),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `jcdingeneriatermica`.`empresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jcdingeneriatermica`.`empresas` (
  `Nit` INT NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Telefono` INT NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Direccion` VARCHAR(45) NOT NULL,
  `Estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Nit`),
  UNIQUE INDEX `Telefono_UNIQUE` (`Telefono` ASC),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `jcdingeneriatermica`.`sucursal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jcdingeneriatermica`.`sucursal` (
  `idSucursal` INT NOT NULL AUTO_INCREMENT,
  `NombreSucursal` VARCHAR(45) NOT NULL,
  `Telefono` VARCHAR(45) NOT NULL,
  `Estasdo` VARCHAR(45) NOT NULL,
  `NitEmpresa` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idSucursal`),
  INDEX `NitEmpresa_idx` (`NitEmpresa` ASC),
  CONSTRAINT `NitEmpresa`
    FOREIGN KEY (`NitEmpresa`)
    REFERENCES `jcdingeneriatermica`.`empresas` (`Nit`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `jcdingeneriatermica`.`equipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jcdingeneriatermica`.`equipos` (
  `NumeroSerie` INT NOT NULL,
  `NombreEquipos` VARCHAR(45) NOT NULL,
  `Referencia` VARCHAR(45) NULL DEFAULT NULL,
  `Voltaje` VARCHAR(45) NULL DEFAULT NULL,
  `Modelo` VARCHAR(45) NULL DEFAULT NULL,
  `TipoGas` VARCHAR(45) NULL DEFAULT NULL,
  `Marca` VARCHAR(45) NULL DEFAULT NULL,
  `Capacidad` VARCHAR(45) NULL DEFAULT NULL,
  `Descripcion` VARCHAR(300) NULL DEFAULT NULL,
  `IdSurcursal` INT NULL DEFAULT NULL,
  `CedulaEmpleado` INT NULL DEFAULT NULL,
  PRIMARY KEY (`NumeroSerie`),
  INDEX `IdSurcursal_idx` (`IdSurcursal` ASC),
  INDEX `CedulaEmpleados_idx` (`CedulaEmpleado` ASC),
  CONSTRAINT `CedulaEmpleados`
    FOREIGN KEY (`CedulaEmpleado`)
    REFERENCES `jcdingeneriatermica`.`empleados` (`Cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `IdSurcursal`
    FOREIGN KEY (`IdSurcursal`)
    REFERENCES `jcdingeneriatermica`.`sucursal` (`idSucursal`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `jcdingeneriatermica`.`mantenimientos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jcdingeneriatermica`.`mantenimientos` (
  `idMantenimientos` INT NOT NULL AUTO_INCREMENT,
  `FechaIngreso` DATETIME NULL DEFAULT NULL,
  `FechaSalida` DATETIME NULL DEFAULT NULL,
  `Observaciones` VARCHAR(300) NULL DEFAULT NULL,
  `CedulaEmpleado` INT NULL DEFAULT NULL,
  `IdEquipos` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idMantenimientos`),
  INDEX `CedulaEmpleado_idx` (`CedulaEmpleado` ASC),
  INDEX `NumeroSerie_idx` (`IdEquipos` ASC),
  CONSTRAINT `CedulaEmp`
    FOREIGN KEY (`CedulaEmpleado`)
    REFERENCES `jcdingeneriatermica`.`empleados` (`Cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `NumeroSerie`
    FOREIGN KEY (`IdEquipos`)
    REFERENCES `jcdingeneriatermica`.`equipos` (`NumeroSerie`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `jcdingeneriatermica`.`correctivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jcdingeneriatermica`.`correctivo` (
  `idCorrectivo` INT NOT NULL,
  `OrdenServicio` VARCHAR(45) NULL DEFAULT NULL,
  `Solicitud` VARCHAR(45) NULL DEFAULT NULL,
  `IdMan` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idCorrectivo`),
  INDEX `IdMante_idx` (`IdMan` ASC),
  INDEX `IdMan_idx` (`IdMan` ASC),
  CONSTRAINT `IdMan`
    FOREIGN KEY (`IdMan`)
    REFERENCES `jcdingeneriatermica`.`mantenimientos` (`idMantenimientos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `jcdingeneriatermica`.`preventivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jcdingeneriatermica`.`preventivo` (
  `idPreventivo` INT NOT NULL AUTO_INCREMENT,
  `OrdenServicio` VARCHAR(45) NULL DEFAULT NULL,
  `Solicitud` VARCHAR(45) NULL DEFAULT NULL,
  `IdMante` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idPreventivo`),
  INDEX `IdMante_idx` (`IdMante` ASC),
  CONSTRAINT `IdMante`
    FOREIGN KEY (`IdMante`)
    REFERENCES `jcdingeneriatermica`.`mantenimientos` (`idMantenimientos`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
