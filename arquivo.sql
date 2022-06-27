-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jun-2022 às 02:08
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
(314, 'a', 'Cópia', 'a', 'a', 'a ', 'a', '57c45be44e04ab0dc6958d5737305f15.jpg'),
(317, 'a', 'Cópia', 'a', 'a', 'a ', 'a', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `favoritos`
--

INSERT INTO `favoritos` (`id`, `id_documento`, `id_usuario`) VALUES
(1, 314, 15);

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
(425, 314, 12),
(426, 314, 13),
(427, 314, 14),
(429, 317, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL,
  `tipoUsuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `tipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'Usuário'),
(3, 'Gerente');

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
(12, 'História'),
(13, 'Português'),
(14, 'Literatura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `email`, `senha`, `foto`, `tipoUsuario`) VALUES
(15, 'Fernando', 'admin@gmail.com', '$2y$10$uWDu9D.yrXamQodKXBM.8eCifjhhyyqyNavN8OMipk/BogTPb3.mi', 'bf128a93d3e75896f1d794b896486428.jpg', 1),
(18, 'Jorge', 'jorge@gmail.com', '$2y$10$TgjuT4NTHlxayfLd4y05/eKE9MSO0q70cpj5TKEs6av7DlY0GTchy', '32a401ef78daee660d89dab9705664af.jpg', 2),
(19, 'dsada', 'adsad@gmail.com', '$2y$10$Qx/jVxtx6.vsde7UhvK0XuPJ3sYj.nU6gMDacCwl5zizp6ot/eNbG', 'f6bfea0a26528396c713ee83986fd587.jpg', 2),
(20, 'sq', 'sqs@gmail.com', '$2y$10$qTQnQWBNUCqiT32zxXBn/eIDqA4UwryOiZSpVm1FqpNnARZ4LRbTC', 'cee84b54d78367aa6aff2586aff73f13.jpg', 2),
(21, 'jorge', 'jorge@gmail.com', '$2y$10$y3GuTjzPOaVBxgf00LXQoeOmmEs3WYLjglR4uUlJLwxzIAd60/MOq', '0f4afc695d0c650a7b7cd8815eddc19f.jpg', 2),
(22, 'fernando', 'fernandogdemedeirosw@gmail.com', '$2y$10$0qb8WGG7dWZUxJIB/kElMuBOrEzGhjJqR/Lgz9TlC.AMm2ooZNBXG', 'd21e34c812bca40133fbda64e6706b11.jpg', 2),
(23, '', '', '$2y$10$a3fcp9l0dEjvFJk3/12MS.CgIwhcd10DUKA1zfBa2H3Px/oTfKvVO', '', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tabela_assoc`
--
ALTER TABLE `tabela_assoc`
  ADD PRIMARY KEY (`id_tabela`);

--
-- Índices para tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `topicos`
--
ALTER TABLE `topicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipoUsuario` (`tipoUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tabela_assoc`
--
ALTER TABLE `tabela_assoc`
  MODIFY `id_tabela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=430;

--
-- AUTO_INCREMENT de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `topicos`
--
ALTER TABLE `topicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`tipoUsuario`) REFERENCES `tipousuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
