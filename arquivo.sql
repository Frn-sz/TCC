-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jul-2022 às 18:56
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

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
(320, 'dasdsadas', 'Original', '6 folhas soltas', 'Impressão de trechos de livro', 'Textual e iconográfico ', 'Caixa \"Escravidão e movimento negro\"', '77de3a70f6d92cfd53e236e6f5e65c85.jpg'),
(321, 'A Uruguaiana de 12 mil anos atrás', 'Original', 'Folha solta', 'Artigo de jornal', 'Textual ', ' Caixa \"Arquivologia\" ', '5f6d594301908809ba47636917780657.png'),
(322, 'A formação dos arquivos nacionais', 'Cópia', 'Folhas grampeadas', 'Artigo acadêmico', 'Textual ', 'Caixa \"Arquivologia\"', '0d1e4dbcd5d4efbe165e211d2e0a4984.png'),
(328, 'A Uruguaiana de 12 mil anos atrás', 'Cópia', 'Folha solta', 'Artigo de jornal', 'Textual ', 'Caixa \"Arquivologia\"', '9d09f26ef317c3e9270db306c8e916c5.jpg');

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
(59, 320, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `passwordreset`
--

CREATE TABLE `passwordreset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `dataExpiracao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `passwordreset`
--

INSERT INTO `passwordreset` (`id`, `email`, `token`, `dataExpiracao`) VALUES
(1, 'fernandogdemedeirosw@gmail.com', 'b277567969f54b1136a6212a6a2e77937d459271427238044d4923bd225cc27a0dd7ac282562cbf96ce7f833f4ab4e0dd162', '2022-07-02 00:50:52'),
(2, 'fernandogdemedeirosw@gmail.com', 'ccbcd49654dcf025c249d0e2ffd2283a923b704a1f42db324c3e86cd0f44808abbd2ceba5981eb128ea9fb76f9df8f1101b4', '2022-07-02 00:53:25'),
(3, 'fernandogdemedeirosw@gmail.com', '131a23dec27479379f57f21972203b8d8a68466f52a5d2012a63247caae6299704f356a86f1ddba562afa0eeca93c2de9a17', '2022-07-02 00:53:50'),
(4, 'fernandogdemedeirosw@gmail.com', '3af4b0c31266a8f87d69a8cd056393178779e9ae7be6c803aeac9c568bdb9a6be56290e978d74d4ef2cd1f8d45b278310148', '2022-07-02 00:54:29'),
(5, 'fernandogdemedeirosw@gmail.com', 'ef0626edb1a8700a68e4c3b0746a1fb677c23cc9f19fa8bab25b07edbbddbb56c9e73167c317b696b984a455ffae2346aa69', '2022-07-02 00:55:20'),
(6, 'fernandogdemedeirosw@gmail.com', '7cae206902a16fae7cd571089894714b7bc1a0a086b666e00d3f5f07fe1d81886746b83a9cb1a62dbc672388815127c78363', '2022-07-02 00:55:45'),
(7, 'fernandogdemedeirosw@gmail.com', 'bf489089e97a3ca45af51e7a55bbd6d91f9c60c627c4f11fbee309912d8f62ee6e1ecf99113eae047afaa49d6228474a32c6', '2022-07-02 00:59:02'),
(8, 'fernandogdemedeirosw@gmail.com', '71b106ab7a15d13a7b736e30ced69fe3b739fb36fa6136ebc3baa8ca5e3a73e51a4d0551f2c4fa6204784d6c7e333bf4ec2d', '2022-07-02 00:59:39'),
(9, 'fernandogdemedeirosw@gmail.com', 'ad184648163dbee5e91a803c9917026eace1d5ae8a1230c0b30d36bb2e14070ca1f1aa9f7eebe1cb847ea45ceac131ccd16b', '2022-07-02 01:04:45'),
(10, 'fernandogdemedeirosw@gmail.com', 'ab624e9abe4d750576ddec8eb8bb1715689a0e3086e5b60d5b6c1fc4fbf2a784bfd1e50e92ff2b7d6259e9d9bcd6bedb30a8', '2022-07-02 01:25:24'),
(11, 'fernandogdemedeirosw@gmail.com', '0e7df6123fc6d4402c47d716feb742faad8bd811ce52c168f7a374b97d4d081e2e71165569bd60d961160bdf77bf320577a4', '2022-07-02 13:09:37'),
(12, 'fernandogdemedeirosw@gmail.com', 'd6095e64e68b63e56e5018e6b7c2db1e9fe2c5e7e736ad1bf5f9d7f3f5ad7446ff7b5e6df215c922f878778691d2582ed5b3', '2022-07-03 17:12:42'),
(13, 'fernandogdemedeirosw@gmail.com', '8b6ebe288bd56977a30e6940dc6de75b8c7ea4ecff682e5d682f2c92d3bb4f409483fbe0beb19efcf20d822ca68c5199331f', '2022-07-05 13:57:11'),
(14, 'fernandogdemedeirosw@gmail.com', 'f32b30648601988bdc37057163c55d24201ffa0c594436ad768471cfc0949aeb5e96e54e869d33d1e4904e5cbbe7bf5b053f', '2022-07-05 13:58:57'),
(15, 'fernandogdemedeirosw@gmail.com', '6ea7fe9207fbba3e0702f70cfa3100bf077d223980cf93ecca15536725a8215f2212a82a83a3fecc651dfe24e3e6b376693e', '2022-07-05 15:53:17'),
(16, 'cilmara.2020315815@aluno.iffar.edu.br', 'b423fac3048650049a503b9e8472f9fc394724a7e7a4c286e8cdea7f606d8ddcdc7c9aac8a9329fc6484275dd67ce9315b4f', '2022-07-05 17:42:45'),
(17, 'fernandogdemedeirosw@gmail.com', '6784e7e3649b5643c40b0108110a96fbd5e780122b21cc011da76c389107dc506163c34a94f6a67d917c4658295e2138aca3', '2022-07-05 21:09:20'),
(18, 'fernandogdemedeirosw@gmail.com', '32dd19fa55759f766d547c6675cc7bbe1f656465c800d6d7ab202375d03eb9e5c5ed5ff055991fffb14249915cc7871666ed', '2022-07-13 01:21:16'),
(19, 'fernandogdemedeirosw@gmail.com', 'f69fbe46d7291823bc0ad57595239c565d0b721d0308b82792bfead7480382d18d4eb5b69d6f7e8e5515748c4f47addd30f7', '2022-07-13 01:22:53'),
(20, '', 'aeadc6099f260eddbeab9f74bdd9789052e0e373120ea423a6cc248267f272c19d63d77453bf7cbdecb728b377d2293291e8', '2022-07-13 01:23:30'),
(21, 'fernandogdemedeirosw@gmail.com', '8c2243e715b15a84bce9ebc52eaef359bac8c94069a65d0aa32aac3228a1a2dfbb57e84be00aaa97f9c2ef4db52bbcbe5a3b', '2022-07-13 01:23:33'),
(22, 'fernandogdemedeirosw@gmail.com', '3217280fd2570e4598d3a21c1b5a31d3b1f85db2a687302e0b6d43ec6696d3d71f3802b3ee7cd3a818cd556ed6ee66e966d3', '2022-07-13 01:24:19'),
(23, 'fernandogdemedeirosw@gmail.com', '86931f6cd7143f0edae9cd10114fcb99a90e4ef0acf0a41a32d648a37b51a179caf8802f6c0f1b6cb9113383f2b6c2599c7f', '2022-07-13 15:39:45'),
(24, 'fernandogdemedeirosw@gmail.com', '7cb11aeeee387a3e271d33944ce704bd490b2683bb32a882b4e67e083bf5e9c523810eac9d9970ec18ab5c3928327b2e0105', '2022-07-13 15:42:11'),
(25, 'fernandogdemedeirosw@gmail.com', 'dc6a6e2aa191473e1f5ab2847de025292c46957b96468154121e85dcf18d2e04de760aadaa8e03f8d6ca4ec1283661045e56', '2022-07-13 19:05:19'),
(26, 'fernandogdemedeirosw@gmail.com', 'ba159bc4f06d85ed4df2aeeab699228896832ca538a56a8d868359b0dce2096c5b9acf63b476f2c60195a42f1fd02b6a141a', '2022-07-13 19:05:55'),
(27, 'fernandogdemedeirosw@gmail.com', 'ac771b641723e0a3b435bdc45998d3bb701d4ed2612f4e7f496e826745dff0da41f83bc952d82ce5dba80e4ca94f485e3c4c', '2022-07-13 19:07:12'),
(28, 'fernandogdemedeirosw@gmail.com', 'a63fd2c2bdf36200a834e20833228714e9441842eb4130c8933ba86c4a9b98d9eebe82654f241301ec572bc90b6b563c6a4d', '2022-07-13 19:08:25'),
(29, 'fernandogdemedeirosw@gmail.com', '27ce4ef86289557edf5cbe45f68d538dd846a36f6b3b2a98bfaae6f4f72a0b2ea1fdf5ee678a4b3961787728f5a56f39236a', '2022-07-13 19:08:50'),
(30, 'fernandogdemedeirosw@gmail.com', 'cb368386505c75994bb29ab18dd639218f5a56098ea782a2a29206f224ea6da342568661b4d128df471002cf50720d92f98a', '2022-07-13 19:15:04'),
(31, '', '63e662b97afd5b1c4a50cbef8968bd99cf3ed3688bf497d36a9ae3ae55c38380a017e0547ff9f218497121941cce582e8a25', '2022-07-13 19:15:09'),
(32, 'fernandogdemedeirosw@gmail.com', '6130cdc122c489f1ebc200b13b0f69a8c2006b2fb6178f24a5f1b72e534257eb9590b5698d1d0692b3cb0ab9a48cbf3fd726', '2022-07-13 19:15:32'),
(33, '', '2c5a7376528449f12400c10a225a54d92825f044c86cb24972e9d12443cdc2e31a67a2726078d79298407a390257e5b0f019', '2022-07-13 19:15:37'),
(34, 'fernandogdemedeirosw@gmail.com', 'db43a3d1286162559fcf0099099c41e18adac0075325af57e9e8e991ec032dea6c78673eaf9688e8ac8fa9352e264f90cffb', '2022-07-13 19:17:17'),
(35, 'fernandogdemedeirosw@gmail.com', '4d2badcf594c0246ed93bcc8c9533438c9346261ea1cdb9bf36baf78ef28bfc69c72f29b261949e6ef261a3c135a41e4c51c', '2022-07-13 19:20:17'),
(36, 'fernandogdemedeirosw@gmail.com', 'b20e2e249131370d605c6f1a39a6516fe4cbd226e2f4c03dd6fbda61cf33025fa9084de3211d8826fadfd88b9ef70af18d94', '2022-07-13 19:21:33'),
(37, 'fernandogdemedeirosw@gmail.com', 'eea284a759a7fcee2503842ec85c07712ea32ccecd2858c259dbba75802a369452cfdae3d6e4d6114b6b59ea93b1c3d230d2', '2022-07-13 19:30:19'),
(38, 'fernandogdemedeirosw@gmail.com', '14f22d64f558f84f844787f21c2b5f8f23319abda537968f0d2890cb9d5249bdacb5ce74c97a9bde18abc59fb86b39eb2e3f', '2022-07-13 19:31:41'),
(39, 'fernandogdemedeirosw@gmail.com', '2d6641582ae1d0b724a27ca68d6162ebefe54d59bec4055c283691036d5628a67460094fc5a0cae0f481317ce90758491505', '2022-07-13 20:07:35'),
(40, 'fernandogdemedeirosw@gmail.com', 'aad92f056878f020117c61d9d69529b37d07af56a615079a81880e339f182e233f486126361bd9c2dc58d85dc517ac19d97f', '2022-07-13 23:57:36'),
(41, 'fernandogdemedeirosw@gmail.com', '4a2177bd1852797a672935a3f8cb00fb501ed3e1c40926ffe4ddfd0a5f6d3332346686c7ae277f2952def7d50f4329c45602', '2022-07-14 00:01:57'),
(42, 'fernandogdemedeirosw@gmail.com', '6b6e5f73b09a5ac2cca12af1a974e3d59da18fdee8d5b25e75e198c9ea4afdaff44287fd4c392f5be059743f2267583b6f0a', '2022-07-14 00:02:46'),
(43, 'fernandogdemedeirosw@gmail.com', '66408d56e595739c477700cb0bd15d8b739cb857ada5af4d1bf49f061e72ba84252b524d68f53f1480969dc2f09b678abfee', '2022-07-14 00:03:11'),
(44, 'fernandogdemedeirosw@gmail.com', '2b8c4e709701b75b89f66de457591d61b8f946c677105cd10d92a3e7994f00518bdf28abcbdee0029ed081c0a057358c7712', '2022-07-14 00:33:16'),
(45, 'fernandogdemedeirosw@gmail.com', '50c969e9bca02c2acb5471b099d7fb61536249104e19885f015b58cb385f2062e5b0fdb0f4a5f10014cf01f46ea858ec6116', '2022-07-14 00:42:04'),
(46, 'fernandogdemedeirosw@gmail.com', 'fa97e1dc5a6d6c637c6877d43ff41669f6cdcd94722d8d4f3e41394f03cb50ffe387c7a8c08c21ab2aff6436358047f9f05e', '2022-07-14 00:43:09'),
(47, 'fernandogdemedeirosw@gmail.com', '2a896be8ce98c2a81ec5eb1a0876e649fd8ea949afd62c5fc3e06937c261a31d7fd7b61f0fb5d9929b2ac8a0d820227cb90e', '2022-07-14 13:18:54');

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
(476, 321, 20),
(477, 322, 20),
(478, 328, 20),
(479, 328, 21),
(483, 320, 20);

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
(20, 'Histórias'),
(21, 'Geografias');

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
(19, 'dsada', 'adsad@gmail.com', '$2y$10$Qx/jVxtx6.vsde7UhvK0XuPJ3sYj.nU6gMDacCwl5zizp6ot/eNbG', 'f6bfea0a26528396c713ee83986fd587.jpg', 3),
(20, 'sq', 'sqs@gmail.com', '$2y$10$qTQnQWBNUCqiT32zxXBn/eIDqA4UwryOiZSpVm1FqpNnARZ4LRbTC', 'cee84b54d78367aa6aff2586aff73f13.jpg', 2),
(21, 'jorge', 'jorge@gmail.com', '$2y$10$y3GuTjzPOaVBxgf00LXQoeOmmEs3WYLjglR4uUlJLwxzIAd60/MOq', '0f4afc695d0c650a7b7cd8815eddc19f.jpg', 3),
(22, 'Administrador[Fernando]', 'fernandogdemedeirosw@gmail.com', '$2y$10$P3OzBCGL.19yWxvlpio4bee1Cm84KDBYnbQhFp0nleqE/5zaRh/MO', '171cd0a897e50d475e0afcf18b6d20c3.jpg', 1),
(24, 'Matheusinho', 'matheus.2020316590@aluno.iffar.edu.br', '$2y$10$E3YCZ//SQf21eaJ8hoym2e.SSCS2qx/4WIEfS2SH2CLPyxw5aAOE2', '', 2),
(25, 'Matheusinho', 'SDADS@gmail.com', '$2y$10$2Pr7Qcle7D6kD0rnL1oxXuM6xJ09s6Yci96DLsSLZ8Fu9MWDl0I9e', '', 2),
(26, 'Cassi', 'cassianodallosto@yahoo.com', '$2y$10$qGqvhmDJF12hciP7pz9kUubRvYdvSfhKieBlUvr9J1tBdJWdzN9eC', '', 2),
(27, 'francisco', 'luisfrancisco@gmail.com', '$2y$10$9VoWnWvp5QENhI4FjBf3HuGQZIvYDPZBEU9pyyJTJDzV3gJXxwf/a', '', 2),
(28, 'k', 'bostil@mail.com', '$2y$10$ili/3ZTC7H5YpEFDwBKzOu/OtFtwac5nQczul5bAXGEyIYelQ0XR2', '', 2),
(30, 'teste', 'teste@gmail.com', '$2y$10$N5HC2ufe./bizZkZ.n83k.nPrZelkrCumeqI9Io216wpA03rZfXTK', '', 2),
(32, 'fernanda', 'mariaferdacosta139@gmail.com', '$2y$10$jgKC8/yOlnBqiiTdsbton.rgHdyrMxiv/nw0Q4C.0aWp9/8IokWie', '7f638f22fda35cfce5e1140a11a60ea5.jpg', 2),
(33, 'Fernando', 'kleber@gmail.com', '$2y$10$RA3FBo4aKu91vFLbj2wKE.ZqqJTp.dkara6TzIpJMINcXNHVUsaHu', '', 2),
(34, 'Fernando', 'dksakda@gmail.com', '$2y$10$iCPOXlXazl2vXbR6intz2eR8.piLn9fKznCHrP6i0rPEXrJWJJZm2', '', 2),
(38, 'Cilmara', 'cilmara.2020315815@aluno.iffar.edu.br', '$2y$10$33Slm0ARQw.RKUANoMANf.RvjJ5xTIWyjqE.Mp4pBKRbaOGG/cKUS', '', 2),
(39, 'Fernando', 'dasjdska@gmail.com', '$2y$10$uuJBmXEftiZ7fm7BdQo2a.M8c0PUPkpLQvT5Iu8gUQBeefxWemee6', '4447597c429c6ad090c7b0091f7c8212.png', 2),
(40, 'Conta teste', 'teste@gmailom', '$2y$10$zgfxGLs04GQ3CXoYD0EbMeAjdiw.ndfnGRe77NicBu3ft.n/.Z.BW', '', 2),
(43, 'teste', 'contateste@gmail.com', '$2y$10$NsbTaQTd1ssX7eiNOKoIou4mgPK9AqA.6nT.UCT7MBQ02piIVSi/C', '7b8081ad893515ee452a474072fb67d3.jpg', 2),
(44, '', '', '$2y$10$3FZ5.Y530OFSpii6qdld6.U1atEahVkd7NXtRJTJxASHHiKtV2uwy', 'c36ea75841bcc519d080b9ceeaeead52.jpg', 3),
(45, 'dsadasdadsa', 'dsaokdasdaskda@gmail.com', '$2y$10$oamaYqiWEV/DlqhzsfPce.dI852YrQr6Hqqa56GPUN89E5krofU36', '2b6356dd54f5e674823b9bb6c90e0631.jpg', 2),
(46, 'fer', 'fernando@gmail.com', '$2y$10$4okv.kctrP6Ka7BkEw5yYeQoBFa7JUIvjk3q0xT03GuDvpR6ZYAnC', '6a8dbbdb08be1b4b52d9c846a495933f.jpg', 2),
(47, 'Gerente', 'gerente@gmail.com', '$2y$10$.9p1uyv7TOGWNWIHpmqkieGfPftWDJed4XYNhAzojkfQX4pp2UBg2', '40d5a3e4e6f6735d187ead7d09bd8edd.jpg', 3),
(48, 'Jorge', 'gerente2@gmail.com', '$2y$10$56ueOHZ2P8VAcivwadh2.ODmwhCsd6bH9j1Vb.ucEzyoZ6EsfFf2.', 'c6c1e46986b7d5184be9c7c198d7d52e.jpg', 3),
(50, 'João', 'joao@gmail.com', '$2y$10$V76.ocwUARXO8B.p3HBRCucVR6WRG91KLOVtKzlqDS0leZqoK4cea', '1875c3ede3a23f493457c2311b4f84f7.png', 3),
(52, 'Fernando', 'dsadas@gmail.com', '$2y$10$I7OTygECxKZzYUbMA4eGXegMabc9wjuw32fzHxieUsEkkCKOLSAPy', 'bc64dc5a4b082730d49f11f251cd7715.jpg', 3);

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
-- Índices para tabela `passwordreset`
--
ALTER TABLE `passwordreset`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `passwordreset`
--
ALTER TABLE `passwordreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `tabela_assoc`
--
ALTER TABLE `tabela_assoc`
  MODIFY `id_tabela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `topicos`
--
ALTER TABLE `topicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
