-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Ago-2022 às 20:56
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
  `idDoc` int(11) NOT NULL,
  `tituloDoc` varchar(255) NOT NULL,
  `forma` varchar(255) NOT NULL,
  `formato` varchar(255) NOT NULL,
  `especie` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `anoDocumento` year(4) NOT NULL,
  `plvsChaves` varchar(255) NOT NULL,
  `transcricao` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `documentos`
--

INSERT INTO `documentos` (`idDoc`, `tituloDoc`, `forma`, `formato`, `especie`, `genero`, `localizacao`, `imagem`, `anoDocumento`, `plvsChaves`, `transcricao`) VALUES
(387, 'a', 'Cópia', 'a', 'asdsadaa', 'a ', 'a', '548ad1b6938baf9106ddd0105e39526e.jpg', 0000, 'a', 'kjkjskdjasdasd\r\n');

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
(57, 320, 43),
(59, 320, 30),
(64, 320, 22),
(65, 320, 53),
(68, 357, 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `passwordreset`
--

CREATE TABLE `passwordreset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `dataExpiracao` datetime NOT NULL,
  `tokenVerificacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `passwordreset`
--

INSERT INTO `passwordreset` (`id`, `email`, `token`, `dataExpiracao`, `tokenVerificacao`) VALUES
(26, 'fernandogdemedeirosw@gmail.com', 'ba159bc4f06d85ed4df2aeeab699228896832ca538a56a8d868359b0dce2096c5b9acf63b476f2c60195a42f1fd02b6a141a', '2022-07-13 19:05:55', 0),
(27, 'fernandogdemedeirosw@gmail.com', 'ac771b641723e0a3b435bdc45998d3bb701d4ed2612f4e7f496e826745dff0da41f83bc952d82ce5dba80e4ca94f485e3c4c', '2022-07-13 19:07:12', 0),
(28, 'fernandogdemedeirosw@gmail.com', 'a63fd2c2bdf36200a834e20833228714e9441842eb4130c8933ba86c4a9b98d9eebe82654f241301ec572bc90b6b563c6a4d', '2022-07-13 19:08:25', 0),
(29, 'fernandogdemedeirosw@gmail.com', '27ce4ef86289557edf5cbe45f68d538dd846a36f6b3b2a98bfaae6f4f72a0b2ea1fdf5ee678a4b3961787728f5a56f39236a', '2022-07-13 19:08:50', 0),
(30, 'fernandogdemedeirosw@gmail.com', 'cb368386505c75994bb29ab18dd639218f5a56098ea782a2a29206f224ea6da342568661b4d128df471002cf50720d92f98a', '2022-07-13 19:15:04', 0),
(31, '', '63e662b97afd5b1c4a50cbef8968bd99cf3ed3688bf497d36a9ae3ae55c38380a017e0547ff9f218497121941cce582e8a25', '2022-07-13 19:15:09', 0),
(32, 'fernandogdemedeirosw@gmail.com', '6130cdc122c489f1ebc200b13b0f69a8c2006b2fb6178f24a5f1b72e534257eb9590b5698d1d0692b3cb0ab9a48cbf3fd726', '2022-07-13 19:15:32', 0),
(33, '', '2c5a7376528449f12400c10a225a54d92825f044c86cb24972e9d12443cdc2e31a67a2726078d79298407a390257e5b0f019', '2022-07-13 19:15:37', 0),
(34, 'fernandogdemedeirosw@gmail.com', 'db43a3d1286162559fcf0099099c41e18adac0075325af57e9e8e991ec032dea6c78673eaf9688e8ac8fa9352e264f90cffb', '2022-07-13 19:17:17', 0),
(35, 'fernandogdemedeirosw@gmail.com', '4d2badcf594c0246ed93bcc8c9533438c9346261ea1cdb9bf36baf78ef28bfc69c72f29b261949e6ef261a3c135a41e4c51c', '2022-07-13 19:20:17', 0),
(36, 'fernandogdemedeirosw@gmail.com', 'b20e2e249131370d605c6f1a39a6516fe4cbd226e2f4c03dd6fbda61cf33025fa9084de3211d8826fadfd88b9ef70af18d94', '2022-07-13 19:21:33', 0),
(37, 'fernandogdemedeirosw@gmail.com', 'eea284a759a7fcee2503842ec85c07712ea32ccecd2858c259dbba75802a369452cfdae3d6e4d6114b6b59ea93b1c3d230d2', '2022-07-13 19:30:19', 0),
(38, 'fernandogdemedeirosw@gmail.com', '14f22d64f558f84f844787f21c2b5f8f23319abda537968f0d2890cb9d5249bdacb5ce74c97a9bde18abc59fb86b39eb2e3f', '2022-07-13 19:31:41', 0),
(39, 'fernandogdemedeirosw@gmail.com', '2d6641582ae1d0b724a27ca68d6162ebefe54d59bec4055c283691036d5628a67460094fc5a0cae0f481317ce90758491505', '2022-07-13 20:07:35', 0),
(40, 'fernandogdemedeirosw@gmail.com', 'aad92f056878f020117c61d9d69529b37d07af56a615079a81880e339f182e233f486126361bd9c2dc58d85dc517ac19d97f', '2022-07-13 23:57:36', 0),
(41, 'fernandogdemedeirosw@gmail.com', '4a2177bd1852797a672935a3f8cb00fb501ed3e1c40926ffe4ddfd0a5f6d3332346686c7ae277f2952def7d50f4329c45602', '2022-07-14 00:01:57', 0),
(42, 'fernandogdemedeirosw@gmail.com', '6b6e5f73b09a5ac2cca12af1a974e3d59da18fdee8d5b25e75e198c9ea4afdaff44287fd4c392f5be059743f2267583b6f0a', '2022-07-14 00:02:46', 0),
(43, 'fernandogdemedeirosw@gmail.com', '66408d56e595739c477700cb0bd15d8b739cb857ada5af4d1bf49f061e72ba84252b524d68f53f1480969dc2f09b678abfee', '2022-07-14 00:03:11', 0),
(44, 'fernandogdemedeirosw@gmail.com', '2b8c4e709701b75b89f66de457591d61b8f946c677105cd10d92a3e7994f00518bdf28abcbdee0029ed081c0a057358c7712', '2022-07-14 00:33:16', 0),
(45, 'fernandogdemedeirosw@gmail.com', '50c969e9bca02c2acb5471b099d7fb61536249104e19885f015b58cb385f2062e5b0fdb0f4a5f10014cf01f46ea858ec6116', '2022-07-14 00:42:04', 0),
(46, 'fernandogdemedeirosw@gmail.com', 'fa97e1dc5a6d6c637c6877d43ff41669f6cdcd94722d8d4f3e41394f03cb50ffe387c7a8c08c21ab2aff6436358047f9f05e', '2022-07-14 00:43:09', 0),
(47, 'fernandogdemedeirosw@gmail.com', '2a896be8ce98c2a81ec5eb1a0876e649fd8ea949afd62c5fc3e06937c261a31d7fd7b61f0fb5d9929b2ac8a0d820227cb90e', '2022-07-14 13:18:54', 0),
(48, 'fernandogdemedeirosw@gmail.com', '4f7360c366a17392a71e03be40c1e25690e433fa21fd4c0af395bd3a3033485139f5f0d91a3bc1cb147a6e47c5f27916ab18', '2022-08-17 18:45:38', 1);

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
(526, 387, 27);

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
  `idTop` int(11) NOT NULL,
  `tituloTop` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `topicos`
--

INSERT INTO `topicos` (`idTop`, `tituloTop`) VALUES
(27, 'História'),
(28, 'Geografia'),
(29, 'Literatura'),
(30, 'Jorge');

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
(22, 'Administrador[Fernando]', 'fernandogdemedeirosw@gmail.com', '$2y$10$rSDR1z1DoMtzb4AMAJ/hbuKcYbSU.VLr.pRxf9/k6/0agYphF7SZK', '4260afd9000f2e18b6ecffec08bf5cc6.jpg', 1),
(54, 'Jorge', 'jorge@mail', '$2y$10$nR9LZEqD6xDUSaSfQckJkOl7A0ODakZsiiFi6IiNT5M5d8igMHeQm', '22ee331eef60fec07cd175a6de0f1250.jpg', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`idDoc`);

--
-- Índices para tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `passwordreset`
--
ALTER TABLE `passwordreset`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tabela_assoc`
--
ALTER TABLE `tabela_assoc`
  ADD PRIMARY KEY (`id_tabela`),
  ADD KEY `fk_doc` (`id_doc`),
  ADD KEY `fk_top` (`id_topico`);

--
-- Índices para tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `topicos`
--
ALTER TABLE `topicos`
  ADD PRIMARY KEY (`idTop`);

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
  MODIFY `idDoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de tabela `passwordreset`
--
ALTER TABLE `passwordreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `tabela_assoc`
--
ALTER TABLE `tabela_assoc`
  MODIFY `id_tabela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=528;

--
-- AUTO_INCREMENT de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `topicos`
--
ALTER TABLE `topicos`
  MODIFY `idTop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tabela_assoc`
--
ALTER TABLE `tabela_assoc`
  ADD CONSTRAINT `fk_doc` FOREIGN KEY (`id_doc`) REFERENCES `documentos` (`idDoc`),
  ADD CONSTRAINT `fk_top` FOREIGN KEY (`id_topico`) REFERENCES `topicos` (`idTop`);

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`tipoUsuario`) REFERENCES `tipousuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
