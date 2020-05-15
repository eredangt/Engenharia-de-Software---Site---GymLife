-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Maio-2020 às 19:56
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `Pessoa_idPessoa` int(4) NOT NULL,
  `Plano_idPlano` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `idEquipamento` int(3) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Quantidade` int(2) NOT NULL,
  `Marca` varchar(45) NOT NULL,
  `Ano` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor`
--

CREATE TABLE `instrutor` (
  `Pessoa_idPessoa` int(4) NOT NULL,
  `Salario` decimal(6,2) NOT NULL,
  `Carga_horaria` int(11) NOT NULL,
  `imagem` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `instrutor`
--

INSERT INTO `instrutor` (`Pessoa_idPessoa`, `Salario`, `Carga_horaria`, `imagem`) VALUES
(16, '34.00', 45, 'imgInstrutores/564845_220501701418828_90108910_n.jpg'),
(17, '1900.00', 20, 'imgInstrutores/liam2.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `idPessoa` int(4) NOT NULL,
  `CPF` char(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Telefone` char(11) NOT NULL COMMENT '(99)9 9999 9999',
  `E_MAIL` varchar(45) NOT NULL,
  `Data_nascimento` date NOT NULL,
  `Senha` varchar(45) NOT NULL,
  `Tipo_cargo` enum('C','I') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`idPessoa`, `CPF`, `Nome`, `Telefone`, `E_MAIL`, `Data_nascimento`, `Senha`, `Tipo_cargo`) VALUES
(16, '89', 'Robertinho', '34', 'rober@tinho', '1924-02-02', 'aaa', 'I'),
(17, '101010', 'M', '909134', 'm@m', '1987-01-01', 'm', 'I');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano`
--

CREATE TABLE `plano` (
  `idPlano` int(2) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `numMeses` int(2) NOT NULL,
  `Valor` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `plano`
--

INSERT INTO `plano` (`idPlano`, `Nome`, `numMeses`, `Valor`) VALUES
(1, 'Mensal', 1, '99.99'),
(2, 'Trimestral', 3, '89.99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treino`
--

CREATE TABLE `treino` (
  `idTreino` int(5) NOT NULL,
  `Cliente_Pessoa_idPessoa` int(4) NOT NULL,
  `Funcionario_Pessoa_idPessoa` int(4) NOT NULL,
  `Equipamento_idEquipamento` int(3) NOT NULL,
  `Tipo_treino` enum('A','B','C') NOT NULL,
  `Serie` int(2) NOT NULL,
  `Repeticoes` int(2) NOT NULL,
  `Peso` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Pessoa_idPessoa`),
  ADD KEY `fk_Cliente_Pessoa_idx` (`Pessoa_idPessoa`),
  ADD KEY `fk_Cliente_Plano1_idx` (`Plano_idPlano`);

--
-- Indexes for table `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`idEquipamento`);

--
-- Indexes for table `instrutor`
--
ALTER TABLE `instrutor`
  ADD PRIMARY KEY (`Pessoa_idPessoa`),
  ADD KEY `fk_Funcionario_Pessoa1_idx` (`Pessoa_idPessoa`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idPessoa`),
  ADD UNIQUE KEY `CPF_UNIQUE` (`CPF`);

--
-- Indexes for table `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`idPlano`);

--
-- Indexes for table `treino`
--
ALTER TABLE `treino`
  ADD PRIMARY KEY (`idTreino`),
  ADD KEY `fk_Treino_Cliente1_idx` (`Cliente_Pessoa_idPessoa`),
  ADD KEY `fk_Treino_Funcionario1_idx` (`Funcionario_Pessoa_idPessoa`),
  ADD KEY `fk_Treino_Equipamento1_idx` (`Equipamento_idEquipamento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `idEquipamento` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idPessoa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `plano`
--
ALTER TABLE `plano`
  MODIFY `idPlano` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `treino`
--
ALTER TABLE `treino`
  MODIFY `idTreino` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_Cliente_Pessoa` FOREIGN KEY (`Pessoa_idPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Cliente_Plano1` FOREIGN KEY (`Plano_idPlano`) REFERENCES `plano` (`idPlano`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `instrutor`
--
ALTER TABLE `instrutor`
  ADD CONSTRAINT `fk_Funcionario_Pessoa1` FOREIGN KEY (`Pessoa_idPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `treino`
--
ALTER TABLE `treino`
  ADD CONSTRAINT `fk_Treino_Cliente1` FOREIGN KEY (`Cliente_Pessoa_idPessoa`) REFERENCES `cliente` (`Pessoa_idPessoa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Treino_Equipamento1` FOREIGN KEY (`Equipamento_idEquipamento`) REFERENCES `equipamento` (`idEquipamento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Treino_Funcionario1` FOREIGN KEY (`Funcionario_Pessoa_idPessoa`) REFERENCES `instrutor` (`Pessoa_idPessoa`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
