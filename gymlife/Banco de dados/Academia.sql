-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Academia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Academia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Academia` DEFAULT CHARACTER SET utf8 ;
USE `Academia` ;

-- -----------------------------------------------------
-- Table `Academia`.`Plano`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academia`.`Plano` (
  `idPlano` INT(2) NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `numMeses` INT(2) NOT NULL,
  `Valor` DECIMAL(3,2) NOT NULL,
  PRIMARY KEY (`idPlano`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academia`.`Pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academia`.`Pessoa` (
  `idPessoa` INT(4) NOT NULL,
  `CPF` CHAR(11) NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Telefone` CHAR(11) NOT NULL COMMENT '(99)9 9999 9999',
  `E-MAIL` VARCHAR(45) NOT NULL,
  `Data_nascimento` DATE NOT NULL,
  `Senha` VARCHAR(45) NOT NULL,
  `Tipo_cargo` ENUM('C', 'I') NOT NULL,
  PRIMARY KEY (`idPessoa`),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academia`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academia`.`Cliente` (
  `Pessoa_idPessoa` INT(4) NOT NULL,
  `Plano_idPlano` INT(2) NOT NULL,
  INDEX `fk_Cliente_Pessoa_idx` (`Pessoa_idPessoa` ASC) VISIBLE,
  PRIMARY KEY (`Pessoa_idPessoa`),
  INDEX `fk_Cliente_Plano1_idx` (`Plano_idPlano` ASC) VISIBLE,
  CONSTRAINT `fk_Cliente_Pessoa`
    FOREIGN KEY (`Pessoa_idPessoa`)
    REFERENCES `Academia`.`Pessoa` (`idPessoa`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Cliente_Plano1`
    FOREIGN KEY (`Plano_idPlano`)
    REFERENCES `Academia`.`Plano` (`idPlano`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academia`.`Instrutor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academia`.`Instrutor` (
  `Pessoa_idPessoa` INT(4) NOT NULL,
  `Salario` DECIMAL(4,2) NOT NULL,
  `Carga_horaria` TIME NOT NULL,
  INDEX `fk_Funcionario_Pessoa1_idx` (`Pessoa_idPessoa` ASC) VISIBLE,
  PRIMARY KEY (`Pessoa_idPessoa`),
  CONSTRAINT `fk_Funcionario_Pessoa1`
    FOREIGN KEY (`Pessoa_idPessoa`)
    REFERENCES `Academia`.`Pessoa` (`idPessoa`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academia`.`Equipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academia`.`Equipamento` (
  `idEquipamento` INT(3) NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Quantidade` INT(2) NOT NULL,
  `Marca` VARCHAR(45) NOT NULL,
  `Ano` YEAR(4) NOT NULL,
  PRIMARY KEY (`idEquipamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Academia`.`Treino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Academia`.`Treino` (
  `idTreino` INT(5) NOT NULL,
  `Cliente_Pessoa_idPessoa` INT(4) NOT NULL,
  `Funcionario_Pessoa_idPessoa` INT(4) NOT NULL,
  `Equipamento_idEquipamento` INT(3) NOT NULL,
  `Tipo_treino` ENUM('A', 'B', 'C') NOT NULL,
  `Serie` INT(2) NOT NULL,
  `Repeticoes` INT(2) NOT NULL,
  `Peso` DECIMAL(3,2) NOT NULL,
  PRIMARY KEY (`idTreino`),
  INDEX `fk_Treino_Cliente1_idx` (`Cliente_Pessoa_idPessoa` ASC) VISIBLE,
  INDEX `fk_Treino_Funcionario1_idx` (`Funcionario_Pessoa_idPessoa` ASC) VISIBLE,
  INDEX `fk_Treino_Equipamento1_idx` (`Equipamento_idEquipamento` ASC) VISIBLE,
  CONSTRAINT `fk_Treino_Cliente1`
    FOREIGN KEY (`Cliente_Pessoa_idPessoa`)
    REFERENCES `Academia`.`Cliente` (`Pessoa_idPessoa`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Treino_Funcionario1`
    FOREIGN KEY (`Funcionario_Pessoa_idPessoa`)
    REFERENCES `Academia`.`Instrutor` (`Pessoa_idPessoa`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Treino_Equipamento1`
    FOREIGN KEY (`Equipamento_idEquipamento`)
    REFERENCES `Academia`.`Equipamento` (`idEquipamento`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
