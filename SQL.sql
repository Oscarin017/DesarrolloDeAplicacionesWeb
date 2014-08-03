SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema UTT
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `UTT` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `UTT` ;

-- -----------------------------------------------------
-- Table `UTT`.`Profesor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UTT`.`Profesor` (
  `iIDProfesor_Pro` INT NOT NULL AUTO_INCREMENT,
  `vApellidoPaterno_Pro` VARCHAR(20) NOT NULL,
  `vApellidoMaterno_Pro` VARCHAR(20) NOT NULL,
  `vNombre_Pro` VARCHAR(40) NOT NULL,
  `vCorreo_Pro` VARCHAR(50) NOT NULL,
  `cTelefono_Pro` CHAR(10) NOT NULL,
  `bActivo_Pro` BINARY NOT NULL,
  PRIMARY KEY (`iIDProfesor_Pro`),
  UNIQUE INDEX `vCorreo_Pro_UNIQUE` (`vCorreo_Pro` ASC),
  UNIQUE INDEX `cTelefono_Pro_UNIQUE` (`cTelefono_Pro` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UTT`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UTT`.`Usuario` (
  `iIDUsuario_Usu` INT NOT NULL AUTO_INCREMENT,
  `vUsuario_Usu` VARCHAR(15) NOT NULL,
  `vPassword_Usu` VARCHAR(45) NOT NULL,
  `iIDProfesor_Usu` INT NOT NULL,
  PRIMARY KEY (`iIDUsuario_Usu`),
  UNIQUE INDEX `iIDUsuario_Usu_UNIQUE` (`iIDUsuario_Usu` ASC),
  UNIQUE INDEX `Usuario_UNIQUE` (`vUsuario_Usu` ASC),
  INDEX `fk_Usuario_Profesor_idx` (`iIDProfesor_Usu` ASC),
  CONSTRAINT `fk_Usuario_Profesor`
    FOREIGN KEY (`iIDProfesor_Usu`)
    REFERENCES `UTT`.`Profesor` (`iIDProfesor_Pro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UTT`.`Grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UTT`.`Grupo` (
  `iIDGrupo_Gru` INT NOT NULL AUTO_INCREMENT,
  `vNombre_Gru` VARCHAR(60) NOT NULL,
  `bActivo_Gru` BINARY NOT NULL,
  `iIDProfesor_Gru` INT NOT NULL,
  PRIMARY KEY (`iIDGrupo_Gru`),
  UNIQUE INDEX `iIDGrupo_Gru_UNIQUE` (`iIDGrupo_Gru` ASC),
  INDEX `fk_Grupo_Profesor1_idx` (`iIDProfesor_Gru` ASC),
  CONSTRAINT `fk_Grupo_Profesor1`
    FOREIGN KEY (`iIDProfesor_Gru`)
    REFERENCES `UTT`.`Profesor` (`iIDProfesor_Pro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UTT`.`Alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UTT`.`Alumno` (
  `iIDAlumno_Alu` INT NOT NULL AUTO_INCREMENT,
  `vApellidoPaterno_Alu` VARCHAR(20) NOT NULL,
  `vApellidoMaterno_Alu` VARCHAR(20) NOT NULL,
  `vNombre_Alu` VARCHAR(40) NOT NULL,
  `vCorreo_Alu` VARCHAR(50) NOT NULL,
  `vCorreoContacto_Alu` VARCHAR(50) NOT NULL,
  `bActivo_Alu` BINARY NOT NULL,
  PRIMARY KEY (`iIDAlumno_Alu`),
  UNIQUE INDEX `iIDAlumno_Alu_UNIQUE` (`iIDAlumno_Alu` ASC),
  UNIQUE INDEX `vCorreo_Alu_UNIQUE` (`vCorreo_Alu` ASC),
  UNIQUE INDEX `vCorreoContacto_Alu_UNIQUE` (`vCorreoContacto_Alu` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UTT`.`Grupo_Alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UTT`.`Grupo_Alumno` (
  `iIDGrupoAlumno_GA` INT NOT NULL AUTO_INCREMENT,
  `iIDAlumno_GA` INT NOT NULL,
  `iIDGrupo_GA` INT NOT NULL,
  PRIMARY KEY (`iIDGrupoAlumno_GA`),
  UNIQUE INDEX `iIDGrupoAlumno_GA_UNIQUE` (`iIDGrupoAlumno_GA` ASC),
  INDEX `fk_Grupo_Alumno_Alumno1_idx` (`iIDAlumno_GA` ASC),
  INDEX `fk_Grupo_Alumno_Grupo1_idx` (`iIDGrupo_GA` ASC),
  CONSTRAINT `fk_Grupo_Alumno_Alumno1`
    FOREIGN KEY (`iIDAlumno_GA`)
    REFERENCES `UTT`.`Alumno` (`iIDAlumno_Alu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Grupo_Alumno_Grupo1`
    FOREIGN KEY (`iIDGrupo_GA`)
    REFERENCES `UTT`.`Grupo` (`iIDGrupo_Gru`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UTT`.`Asistencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UTT`.`Asistencia` (
  `iIDAsistencia_Asi` INT NOT NULL AUTO_INCREMENT,
  `dFecha_Asi` DATE NOT NULL,
  `cAsistencia_Asi` CHAR(1) NOT NULL,
  `iIDGrupoAlumno_Asi` INT NOT NULL,
  PRIMARY KEY (`iIDAsistencia_Asi`),
  UNIQUE INDEX `iIDAsistencia_Asi_UNIQUE` (`iIDAsistencia_Asi` ASC),
  INDEX `fk_Asistencia_Grupo_Alumno1_idx` (`iIDGrupoAlumno_Asi` ASC),
  CONSTRAINT `fk_Asistencia_Grupo_Alumno1`
    FOREIGN KEY (`iIDGrupoAlumno_Asi`)
    REFERENCES `UTT`.`Grupo_Alumno` (`iIDGrupoAlumno_GA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
