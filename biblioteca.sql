-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Mar-2022 às 18:38
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `biblioteca`
--

CREATE TABLE `biblioteca` (
  `id` int(99) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `forma` varchar(255) NOT NULL,
  `formato` varchar(255) NOT NULL,
  `especie` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `locali` varchar(255) NOT NULL,
  `nv1` varchar(255) NOT NULL,
  `nv2` varchar(255) NOT NULL,
  `nv3` varchar(255) NOT NULL,
  `nv4` varchar(255) NOT NULL,
  `nv5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `biblioteca`
--

INSERT INTO `biblioteca` (`id`, `titulo`, `forma`, `formato`, `especie`, `genero`, `locali`, `nv1`, `nv2`, `nv3`, `nv4`, `nv5`) VALUES
(6, 'a', 'a', 'a', 'a', 'a ', 'a', 'História de Uruguaiana', 'Brasil Império', 'Brasil Império', '', ''),
(7, 'A', 'A', 'A', 'A', 'A ', 'A', 'sas', '', '', '', ''),
(8, 'A', 'A', 'A', 'A', 'A ', 'A', 'sas', 'sas', 'sas', 'sas', 'sas'),
(10, 'sada', 'a', 'a', 'a', 'a ', 'a', 'História do Brasil', 'Brasil Império', 's', 'dasda', 'Brasil Império'),
(11, 'Teste', 'Teste', 'Teste', 'Teste', 'Teste ', 'Teste', 'História do Brasil', '', '', '', ''),
(12, 'a', 'Cópia', 'a', 'a', 'a ', 'a', 'História do Brasil', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `topicos`
--

CREATE TABLE `topicos` (
  `id` int(99) NOT NULL,
  `topicos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `topicos`
--

INSERT INTO `topicos` (`id`, `topicos`) VALUES
(13, 'História do Brasil'),
(15, 'Brasil Império'),
(23, 'História de Uruguaiana');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `topicos`
--
ALTER TABLE `topicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `biblioteca`
--
ALTER TABLE `biblioteca`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `topicos`
--
ALTER TABLE `topicos`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
