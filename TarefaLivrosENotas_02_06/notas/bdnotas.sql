-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/06/2024 às 04:45
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdnotas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbaluno`
--

CREATE TABLE `tbaluno` (
  `raaluno` int(11) NOT NULL,
  `nomealuno` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbaluno`
--

INSERT INTO `tbaluno` (`raaluno`, `nomealuno`) VALUES
(1, 'joão'),
(2, 'sergio'),
(3, 'tawan'),
(4, 'ygor'),
(5, 'vinicius');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdisciplina`
--

CREATE TABLE `tbdisciplina` (
  `coddisciplina` int(11) NOT NULL,
  `disciplina` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbdisciplina`
--

INSERT INTO `tbdisciplina` (`coddisciplina`, `disciplina`) VALUES
(1, 'sociologia'),
(2, 'algoritmos'),
(3, 'matematica'),
(4, 'historia'),
(5, 'ed. fisica');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbnota`
--

CREATE TABLE `tbnota` (
  `codnota` int(11) NOT NULL,
  `raaluno` int(11) DEFAULT NULL,
  `codprofessor` int(11) DEFAULT NULL,
  `coddisciplina` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `faltas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbnota`
--

INSERT INTO `tbnota` (`codnota`, `raaluno`, `codprofessor`, `coddisciplina`, `nota`, `faltas`) VALUES
(1, 2, 4, 5, 10, 9),
(2, 3, 2, 3, 10, 2),
(3, 1, 2, 1, 8, 0),
(4, 1, 1, 1, 4, 0),
(5, 5, 1, 5, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbprofessor`
--

CREATE TABLE `tbprofessor` (
  `codprofessor` int(11) NOT NULL,
  `nomeprofessor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbprofessor`
--

INSERT INTO `tbprofessor` (`codprofessor`, `nomeprofessor`) VALUES
(1, 'tadeu'),
(2, 'angelo'),
(3, 'penha'),
(4, 'guilherme'),
(5, 'alvaro');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD PRIMARY KEY (`raaluno`);

--
-- Índices de tabela `tbdisciplina`
--
ALTER TABLE `tbdisciplina`
  ADD PRIMARY KEY (`coddisciplina`);

--
-- Índices de tabela `tbnota`
--
ALTER TABLE `tbnota`
  ADD PRIMARY KEY (`codnota`),
  ADD KEY `raaluno` (`raaluno`),
  ADD KEY `codprofessor` (`codprofessor`),
  ADD KEY `coddisciplina` (`coddisciplina`);

--
-- Índices de tabela `tbprofessor`
--
ALTER TABLE `tbprofessor`
  ADD PRIMARY KEY (`codprofessor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbaluno`
--
ALTER TABLE `tbaluno`
  MODIFY `raaluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbdisciplina`
--
ALTER TABLE `tbdisciplina`
  MODIFY `coddisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbnota`
--
ALTER TABLE `tbnota`
  MODIFY `codnota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbprofessor`
--
ALTER TABLE `tbprofessor`
  MODIFY `codprofessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbnota`
--
ALTER TABLE `tbnota`
  ADD CONSTRAINT `tbnota_ibfk_1` FOREIGN KEY (`raaluno`) REFERENCES `tbaluno` (`raaluno`),
  ADD CONSTRAINT `tbnota_ibfk_2` FOREIGN KEY (`codprofessor`) REFERENCES `tbprofessor` (`codprofessor`),
  ADD CONSTRAINT `tbnota_ibfk_3` FOREIGN KEY (`coddisciplina`) REFERENCES `tbdisciplina` (`coddisciplina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
