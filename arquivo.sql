-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jun-2022 às 07:33
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `arquivo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `forma` varchar(255) NOT NULL,
  `formato` varchar(255) NOT NULL,
  `especie` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `documentos`
--

INSERT INTO `documentos` (`id`, `titulo`, `forma`, `formato`, `especie`, `genero`, `localizacao`, `imagem`) VALUES
(289, 'a', '', 'a', 'a', 'a ', '  a', 'cb3b4fedaf6e6659c38e76cf7045c5c5.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_assoc`
--

CREATE TABLE `tabela_assoc` (
  `id_tabela` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `id_topico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tabela_assoc`
--

INSERT INTO `tabela_assoc` (`id_tabela`, `id_doc`, `id_topico`) VALUES
(311, 289, 11),
(312, 289, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `topicos`
--

CREATE TABLE `topicos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `topicos`
--

INSERT INTO `topicos` (`id`, `titulo`) VALUES
(11, 'Escravidão'),
(12, 'História'),
(13, 'Português'),
(14, 'Literatura');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tabela_assoc`
--
ALTER TABLE `tabela_assoc`
  ADD PRIMARY KEY (`id_tabela`);

--
-- Índices para tabela `topicos`
--
ALTER TABLE `topicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT de tabela `tabela_assoc`
--
ALTER TABLE `tabela_assoc`
  MODIFY `id_tabela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT de tabela `topicos`
--
ALTER TABLE `topicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
