-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14/12/2022 às 02:10
-- Versão do servidor: 10.4.24-MariaDB
-- Versão do PHP: 7.4.29

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
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `comentario` longtext NOT NULL,
  `idDocumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `idUsuario`, `comentario`, `idDocumento`) VALUES
(11, 60, 'Olá', 432),
(15, 75, 'dsadsa', 432),
(16, 76, 'dadasd', 430);

-- --------------------------------------------------------

--
-- Estrutura para tabela `documentos`
--

CREATE TABLE `documentos` (
  `idDoc` int(11) NOT NULL,
  `tituloDoc` varchar(255) NOT NULL,
  `forma` varchar(255) NOT NULL,
  `formato` varchar(255) NOT NULL,
  `especie` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `anoDocumento` int(4) NOT NULL,
  `palavrasChaves` varchar(255) NOT NULL,
  `transcricao` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `documentos`
--

INSERT INTO `documentos` (`idDoc`, `tituloDoc`, `forma`, `formato`, `especie`, `genero`, `localizacao`, `imagem`, `anoDocumento`, `palavrasChaves`, `transcricao`) VALUES
(430, 'Documento teste', 'Cópia', 'Imagem', 'Imagem', 'Textual', '-', '88febcde4eb76132897e7cdef07a3978.png', 2000, 'Imagem de teste, texto', 'It was the best of\r\ntimes, it was the worst\r\nof times, it was the age\r\nof wisdom, it was the\r\nage of foolishness...'),
(431, 'Universidade Federal do Pampa', 'Cópia', 'Folha solta', 'Jornal', 'Textual e iconográfico ', 'Caixa - Universidades em Uruguaiana', '9368718029cbf092ba4b497369ac27f7.jpg', 2006, 'Universidade, UNIPAMPA, Uruguaiana', NULL),
(432, '43ª Feira do Livro de Uruguaiana', 'Cópia', 'Folhas de jornal', 'Jornal', 'Textual e iconográfico ', 'Caixa - Feira do livro em Uruguaiana', '3d93b0ebc196c31904ac4afcc458de09.jpg', 2019, 'Feira do livro, Uruguaiana', '433\r\n\r\nINTERNACIONAL\r\n\r\n=LIVRO\r\n\r\nURUGUAIANA 2019\r\n\r\nAOS/12 * ,\r\n\r\nby 4 i S ak o A W\' =\r\nAL My / Sl _,ﬂ\"\"‘-‘,‘ {3\r\n\r\nRIO BRANCO\r\n\r\nA\r\ns\\ / W\r\nA, S DRIA D W %\r\n\r\nU, S\r\n\r\n(\"A\\, : i}\r\n\r\n§ g\r\n\r\ne feiradolivro@uruguaiana.rs.gov.br\r\n\r\nQ_ wmounl MK ML AT one sooc St'),
(433, 'Uruguaiana sediará o encontro das sociedades italianas', 'Cópia', 'Folhas de jornal', 'Jornal', 'Textual e iconográfico ', 'Caixa - Imigração', '8dcca1e14b8ec1358f073742e41e1b23.jpg', 1879, 'Imigração em Uruguaiana, Imigração Italiana', '- Uruguaiana sediara Encontro\r\n| . de Sociedades Italianas\r\n\r\nNo préximo dia 4 de julho,\r\nUruguaiana sediar4, no Clube\r\nComercial, Encontro das Socie-\r\ndades Italianas, com represen-\r\ntantes do Brasil, Argentina e\r\nUruguai, em homenagem aos\r\n130 anos da Sociedade ftalo-Bra-\r\nsileira Giuseppe Garibaldi, loca-\r\nlizada em Uruguaiana e fundada\r\nem 1° de junho de 1879. A aber-\r\ntura do evento ser4 as 8h, no\r\nSaldo dos Espelhos do Clube\r\nComercial, com execugdo dos\r\nHinos Nacionais do Brasil, It4-\r\nlia, Argentina e Uruguai, pela\r\nFanfarra da 2°. Brigada de Ca-\r\nvalaria Mecanizada do Exército\r\nBrasileiro. As 9h, apresentagdo\r\ndas entidades representativas.\r\nAp0s, as 9h20min, palestra “A\r\nRepublica da Itilia e as Socie-\r\ndades Italianas da América do\r\n\r\nSul”, com o deputado F4bio Por- -\r\n\r\nta, membro da Comissdo dos\r\nAssuntos Externos e Comunita-\r\nrios da Camara dos Deputados\r\nda Italia, em Roma, representan-\r\nte eleito pela circunscrigio Amé-\r\nrica Meridional, e o Dr. Oscar\r\nJosé Cafless,o, agente consular\r\nda Republica da Itilia para a cir-\r\ncunscrigdo de Santa Maria/RS;\r\n10h30min — Coffee break;\r\n\r\n11h30min — Descerramento da\r\npedra fundamental da Praga It4-\r\nliana Esplanada do Judicirio alu-\r\nsiva aos 130 anos da Sociedade\r\nItaliana; 11h45min — Assinatura\r\ndo edital do concurso para a es-\r\ncolha do projeto do monumento\r\nalusivo aos imigrantes italianos e\r\n\r\nPraga It4lia; 12h — Retomada do -\r\n\r\nEncontro, na Sociedade ftalo-\r\n\r\nBrasileira Giuseppe Garibaldi, si- -\r\n\r\ntuadana rua Domingos de Almei-\r\nda n°. 1703, com apresentacfo\r\ndos homenageados e entrega de\r\ntitulos honorérios ao deputado ita-\r\nliano Fébio Porta, ao Dr. Oscar\r\n\r\n~\r\nTRWTHRT WY A SN TN W WY o~ A wae\r\n\r\nARQUIVO/DF\r\n\r\nJosé Carlesso e ao Bel. Mauro\r\nVieira Maciel; 13h—Almogo ita-\r\nliano (por adesdo), na sede da So-\r\nciedade ftalo-Brasileira Giuseppe\r\nGaribaldi, que tem na presidéncia\r\n\r\n- a professora Thietelina Lunardi-\r\n\r\nni. Integram a atual diretoria: pro-\r\nfessora Thietelina Lunardini Pe-\r\nreira (presidente), Pedro Paulo\r\nChiarelli (1°. Vice-presidente),\r\nDécio Eurico Bortolazzo (2°. Vice-\r\npresidente), Daniel Fantti (1°. Se-\r\ncretario), Gilberto Emilio Melati\r\n(tesoureiro), Nara Ione Jacociu-\r\nnas (diretora social), e Mauro Vi-\r\n\r\n~ eira Maciel (assessor juridico).'),
(436, 'Tráfico arqueológico', 'Cópia', 'Folhas de jornal', 'Jornal', 'Textual e iconográfico ', 'Caixa -> Arquivologia', 'b97f6965725582def40d1d61ef370285.jpg', 2005, 'Arquivologia, Arqueologia, Uruguaiana', '\r\nPecas paleontolégicas (de animais) e arqueoldgicas de povos indigenas que habitaram ha\r\nmais de 8 mil anos o territério de Uruguaiana, Barra do Quarai e cidades préximas, estdao\r\nsendo contrabandeadas por “piratas” e vendidas a pregos de “banana” para\r\ncolecionadores do outro lado da fronteira. O fato é denunciado pelo mestre Flamarion\r\nGomes, da PUCRS, que tem autorizagéo do Instituto-de Patriménio Histdrico e Artistico\r\n\r\nNacional, para explorar os 34 sitios arqueoldgicos do municipio. PAGINAS\r\n\r\nNﬂmmummummumm“.'),
(437, 'Manual de preservação de documentos', 'Cópia', 'Livro', 'Manual', 'Textual e iconográfico ', 'Caixa -> Arquivologia', '063046bc0c07794f1d23e4d1523c4b58.jpg', 2000, 'Arquivologia, Preservação, Manual', NULL),
(443, 'dsad', 'Cópia', 'asdsa', 'dasda', 'das ', 'sdsad', '78399eab7ba6eaf00661ccaa1b20d8ee.jpg', 2000, 'dsdsada,dasdsada,dsadasdas', '~\r\n\r\nreservacao\r\n\r\nde p\r\n\r\n\\\r\n\r\ncumentos\r\n\r\nmanual\r\n\r\nX\r\n\r\nde do\r\n\r\nA\r\n\r\nR 14\r\n\r\n\'ARQUIVO NACIONAL');

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `favoritos`
--

INSERT INTO `favoritos` (`id`, `id_documento`, `id_usuario`) VALUES
(76, 433, 60),
(79, 431, 60),
(80, 432, 60),
(81, 437, 60);

-- --------------------------------------------------------

--
-- Estrutura para tabela `passwordreset`
--

CREATE TABLE `passwordreset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `dataExpiracao` datetime NOT NULL,
  `tokenVerificacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `passwordreset`
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
(48, 'fernandogdemedeirosw@gmail.com', '4f7360c366a17392a71e03be40c1e25690e433fa21fd4c0af395bd3a3033485139f5f0d91a3bc1cb147a6e47c5f27916ab18', '2022-08-17 18:45:38', 1),
(49, 'fernandogdemedeirosw@gmail.com', 'e6a5e53a40e1e2f160e0f36e4456e1430e6be5fa0faa943ab34a9b6c43fb81a322f55660a35947d7dad350536dfc43e32ea5', '2022-11-27 16:48:08', 0),
(50, 'fernandogdemedeirosw@gmail.com', '8408328bd521ef88276e7c365f96752bc14468e98bbc1b54f144cb7069067760677076d5b73eb6efcf7c6f1e0e5dde352a5c', '2022-11-27 16:49:00', 0),
(51, 'fernandogdemedeirosw@gmail.com', '49cd623401194899d68c4369e1cbba399b4433488a217fa55faf7f40c2fe7058942c6d081db013afe4c6048d387e629fd4df', '2022-11-28 22:44:13', 1),
(52, 'fernandogdemedeirosw@gmail.com', '4a0c981c20da503c377f00b4c1ba4a7f355c74c46d11c72e2f89eb3c31279cb0b594a2f794989b049018a6f975a48a2280b4', '2022-11-28 22:45:58', 1),
(53, 'fernandogdemedeirosw@gmail.com', '29ea85545d257da6fa4c5630f5957839d27095954928579513768644cbd3e60739babdb1c8a741a58b83f8b9281d61d5363d', '2022-12-04 01:16:57', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `idComentario` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `resposta` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `respostas`
--

INSERT INTO `respostas` (`id`, `idComentario`, `idUsuario`, `resposta`) VALUES
(20, 11, 60, 'Olá senhor'),
(25, 16, 76, 'dasdsa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_assoc`
--

CREATE TABLE `tabela_assoc` (
  `id_tabela` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `id_topico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tabela_assoc`
--

INSERT INTO `tabela_assoc` (`id_tabela`, `id_doc`, `id_topico`) VALUES
(787, 432, 36),
(792, 433, 37),
(797, 430, 36),
(798, 430, 37),
(802, 431, 36),
(803, 431, 37),
(809, 436, 41),
(810, 436, 33),
(811, 436, 33),
(812, 436, 33),
(813, 436, 33),
(835, 443, 36),
(836, 443, 37),
(837, 443, 38);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL,
  `tipoUsuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `tipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'Usuário'),
(3, 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `topicos`
--

CREATE TABLE `topicos` (
  `idTop` int(11) NOT NULL,
  `tituloTop` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `topicos`
--

INSERT INTO `topicos` (`idTop`, `tituloTop`) VALUES
(36, 'Feira do livro em Uruguaiana'),
(37, 'Imigração'),
(38, 'Movimento negro em Uruguaiana'),
(40, 'Escolas Públicas'),
(41, 'Arqueologia em Uruguaiana'),
(42, 'Geografia'),
(44, 'Teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `email`, `senha`, `foto`, `tipoUsuario`) VALUES
(60, 'Administrador', 'fernandogdemedeirosw@gmail.com', '$2y$10$AEuTYKl8tSI3i.p3c0MunuAEqEeIi1b8LA8qidMWTXnUdJGmxl.QC', '234f2392ca3d1d7e0a4c22c6d04feaf4.jpg', 1),
(75, 'Stéphane', 'stepanhe@gmail.com', '$2y$10$NzpIie6B0XtWYqtUeTszRO23t71f.3Her2tKmijOMB6joFEWiZUm2', 'c118341279004a790160e8f1573c627c.jpg', 3),
(76, 'teste', 'teste@mail.com', '$2y$10$URvrfr9ogWKCl1yDcMxb1u7hitBuB60lfolOaSF7xNecuQ2stLteC', NULL, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`idDoc`);

--
-- Índices de tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `passwordreset`
--
ALTER TABLE `passwordreset`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tabela_assoc`
--
ALTER TABLE `tabela_assoc`
  ADD PRIMARY KEY (`id_tabela`),
  ADD KEY `fk_doc` (`id_doc`),
  ADD KEY `fk_top` (`id_topico`);

--
-- Índices de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `topicos`
--
ALTER TABLE `topicos`
  ADD PRIMARY KEY (`idTop`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipoUsuario` (`tipoUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `idDoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de tabela `passwordreset`
--
ALTER TABLE `passwordreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tabela_assoc`
--
ALTER TABLE `tabela_assoc`
  MODIFY `id_tabela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=838;

--
-- AUTO_INCREMENT de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `topicos`
--
ALTER TABLE `topicos`
  MODIFY `idTop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`tipoUsuario`) REFERENCES `tipousuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
