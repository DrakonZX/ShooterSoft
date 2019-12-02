-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Dez-2019 às 16:09
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `login`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `quantidade` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `produto_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `gasto` decimal(6,2) NOT NULL,
  `data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `datas`
--

CREATE TABLE `datas` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `hora` varchar(100) NOT NULL,
  `estado` enum('logado','cadastrado','deslogado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `datas`
--

INSERT INTO `datas` (`id`, `data`, `email`, `hora`, `estado`) VALUES
(1, '2019-11-15', 'TheDrakonZXD@gmail.com', '20:04:13', 'logado'),
(2, '2019-11-16', 'TheDrakonZXD@gmail.com', '14:10:29', 'logado'),
(3, '2019-11-16', 'TheDrakonZXD@gmail.com', '14:10:41', 'deslogado'),
(4, '2019-11-16', 'TheDrakonZXD@gmail.com', '14:32:52', 'logado'),
(5, '2019-11-28', 'TheDrakonZXD@gmail.com', '14:49:48', 'logado'),
(6, '2019-11-30', 'TheDrakonZXD@gmail.com', '00:07:06', 'logado'),
(7, '2019-11-30', 'TheDrakonZXD@gmail.com', '13:50:46', 'logado'),
(8, '2019-12-01', 'TheDrakonZXD@gmail.com', '12:44:54', 'logado'),
(9, '2019-12-01', 'TheDrakonZXD@gmail.com', '19:10:33', 'logado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filtro`
--

CREATE TABLE `filtro` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `filtro`
--

INSERT INTO `filtro` (`id`, `categoria_id`, `categoria`) VALUES
(1, 1, 'Escopeta'),
(2, 2, 'Rifle'),
(3, 3, 'Pistola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_airsoft`
--

CREATE TABLE `produtos_airsoft` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `preco_antigo` decimal(6,2) NOT NULL,
  `parcelas` decimal(6,2) NOT NULL,
  `avista` decimal(6,2) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `img2` varchar(200) NOT NULL,
  `img3` varchar(200) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `mais_vendidos` int(2) NOT NULL,
  `promocao` int(2) NOT NULL,
  `promocao_preco` decimal(6,2) NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `sistema` varchar(20) NOT NULL,
  `disparo` varchar(20) NOT NULL,
  `gas` varchar(20) NOT NULL,
  `calibre` varchar(20) NOT NULL,
  `comprimento` decimal(5,2) NOT NULL,
  `altura` decimal(5,2) NOT NULL,
  `mira` varchar(20) NOT NULL,
  `bateria` varchar(20) NOT NULL,
  `material` varchar(20) NOT NULL,
  `texto_carac` varchar(1500) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `caminho` varchar(100) NOT NULL,
  `caminho_categoria` varchar(100) NOT NULL,
  `slide` int(11) NOT NULL,
  `img_slide` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos_airsoft`
--

INSERT INTO `produtos_airsoft` (`id`, `nome`, `preco`, `preco_antigo`, `parcelas`, `avista`, `marca`, `img`, `img2`, `img3`, `categoria`, `mais_vendidos`, `promocao`, `promocao_preco`, `peso`, `sistema`, `disparo`, `gas`, `calibre`, `comprimento`, `altura`, `mira`, `bateria`, `material`, `texto_carac`, `tipo`, `caminho`, `caminho_categoria`, `slide`, `img_slide`) VALUES
(1, 'SHOTGUN AIRSOFT MOSSBERG 500 ', '500.00', '0.00', '50.00', '315.00', 'ActionX airsoft', 'img_produtos/Imagens_correta/5.jpg', 'img_produtos/Imagens_correta/5_2.jpg', 'img_produtos/Imagens_correta/5_3.jpg', 'Escopetas', 0, 0, '0.00', '14.00', 'Spring', 'Manual', '', '6mm', '98.00', '13.00', '1x Fake Red-dot', 'Não contém', 'Polímero e Metal', '', 'Airsoft', 'escopeta.php', 'airsoft.php', 0, ''),
(2, 'RIFLE AEG M4A1 CM507', '999.00', '1350.00', '99.90', '999.00', 'slin', 'img_produtos/Imagens_correta/14.jpg', 'img_produtos/Imagens_correta/14_2.jpg', 'img_produtos/Imagens_correta/14_3.jpg', 'Rifles', 0, 1, '0.00', '15.24', 'Pressão', 'Manual', '', '4.3', '58.00', '15.00', 'Não contém', 'Não contém', 'Polimero e Metal', '', 'Airsoft', 'rifle.php', 'airsoft.php', 1, 'img/a.png'),
(3, 'PISTOLA 247 KWC', '299.00', '499.00', '59.80', '269.00', 'slin', 'img_produtos/Imagens_correta/11.jpg', 'img_produtos/Imagens_correta/11_2.jpg', 'img_produtos/Imagens_correta/11_3.jpg', 'Pistolas', 1, 0, '0.00', '0.00', 'Pressão', 'Manual', '', '4.3', '36.00', '6.00', 'Não contém', 'Não contém', 'Polímero e Metal', '', 'Airsoft', 'pistola.php', 'airsoft.php', 1, 'img/c.png'),
(4, 'PISTOLA 1911 GBB CO2', '999.00', '2191.00', '99.00', '899.10', 'slin', 'img_produtos/Imagens_correta/12.jpg', 'img_produtos/Imagens_correta/12_2.jpg', 'img_produtos/Imagens_correta/12_3.jpg', 'Pistolas ', 0, 0, '0.00', '0.00', 'Gás CO2', 'Manual', '', '4.3', '46.00', '7.00', 'Não contém', 'Contém', 'Polímero e Metal', '', 'Airsoft', 'pistola.php', 'airsoft.php', 0, ''),
(5, 'PISTOLA GLOCK GBB  GREEN GAS R17', '999.00', '1320.00', '99.00', '899.00', 'slin', 'img_produtos/Imagens_correta/13.jpg', 'img_produtos/Imagens_correta/13_2.jpg', 'img_produtos/Imagens_correta/13_3.jpg', 'Pistolas ', 1, 1, '0.00', '0.00', 'Gás CO2', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'pistola.php', 'airsoft.php', 0, ''),
(6, 'BERETTA AEP UMAREX', '890.00', '1250.00', '89.00', '801.00', 'slin', 'img_produtos/Imagens_correta/10.jpg', 'img_produtos/Imagens_correta/10_2.jpg', 'img_produtos/Imagens_correta/10_3.jpg', 'Pistolas', 0, 0, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'pistola.php', 'airsoft.php', 0, ''),
(7, 'SNIPER GREEN GAS G86B', '3799.00', '4591.20', '379.00', '3419.10', 'slin', 'img_produtos/Imagens_correta/16.jpg', 'img_produtos/Imagens_correta/16_2.jpg', 'img_produtos/Imagens_correta/16_3.jpg', 'Rifles', 1, 1, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'rifle.php', 'airsoft.php', 1, 'img/b.png'),
(8, 'RIFLE M62', '719.10', '1199.00', '79.90', '719.10', 'slin', 'img_produtos/Imagens_correta/15.jpg', 'img_produtos/Imagens_correta/15_2.jpg', 'img_produtos/Imagens_correta/15_3.jpg', 'Rifles', 0, 0, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'rifle.php', 'airsoft.php', 0, ''),
(9, 'MARCADOR PAINTBALL RIFLE LASER TAG EAGLE  EYE SYSTEM – PRETO', '4850.40', '0.00', '485.04', '4122.84', 'slin', 'img_produtos/Imagens_correta/8.jpg', 'img_produtos/Imagens_correta/8_2.jpg', '', 'Marcadores', 0, 1, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Paintball', 'paintball.php', 'paintball.php', 0, ''),
(10, 'MARCADOR PAINTBALL PISTOLA RAP4 DESERT EAGLE - PRETO', '1527.00', '0.00', '152.74', '1298.26', 'slin', 'img_produtos/Imagens_correta/7_3.jpg', 'img_produtos/Imagens_correta/7.jpg', 'img_produtos/Imagens_correta/7_2.jpg', 'Marcadores', 0, 0, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Paintball', 'paintball.php', 'paintball.php', 0, ''),
(11, 'ESCOPETA M300 WESSON', '259.00', '0.00', '51.00', '233.10', 'slin', 'img_produtos/Imagens_correta/6.jpg', 'img_produtos/Imagens_correta/6_2.jpg', 'img_produtos/Imagens_correta/6_3.jpg', 'Escopetas', 1, 1, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'escopeta.php', 'airsoft.php', 0, ''),
(12, 'CILINDRO AIRSOFT CO2 - 12G', '6.29', '8.30', '6.29', '5.32', 'slin', 'img_produtos/Imagens_correta/1.jpg', 'img_produtos/Imagens_correta/1_2.jpg', '', 'Acessórios', 1, 0, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'acessorios_airsoft.php', 'airsoft.php', 0, ''),
(13, 'MUNIÇÃO AIRSOFT TOKYO MARUI BBS 0.25g - 1300 UNIDADES', '62.91', '0.00', '6.29', '53.47', 'slin', 'img_produtos/Imagens_correta/2.jpg', '', '', 'Acessórios', 1, 1, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'acessorios_airsoft.php', 'airsoft.php', 0, ''),
(14, 'ARCO CRUZ JANDÃO CROSSBOW HWXR - 33 35 - 60 180', '2839.94', '0.00', '283.99', '2413.94', 'slin', 'img_produtos/Imagens_correta/3.jpg', 'img_produtos/Imagens_correta/3_2.jpg', 'img_produtos/Imagens_correta/3_3.jpg', 'Arcos', 0, 0, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Arquearia', 'arquearia.php', 'arquearia.php', 0, ''),
(15, 'BALESTRA CHACE SUN JANDÃO 2009F - 176', '2404.56', '0.00', '240.56', '2043.88', 'slin', 'img_produtos/Imagens_correta/4.jpg', 'img_produtos/Imagens_correta/4.2jpg', 'img_produtos/Imagens_correta/4_3.jpg', 'Balestras', 0, 0, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Arquearia', 'arquearia.php', 'arquearia.php', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `soma_total`
--

CREATE TABLE `soma_total` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `soma` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `img` varchar(100) NOT NULL,
  `sem_img` varchar(100) NOT NULL,
  `cpf` char(14) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `num` int(10) UNSIGNED NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` char(2) NOT NULL,
  `refe` text NOT NULL,
  `comple` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `img`, `sem_img`, `cpf`, `email`, `senha`, `cep`, `endereco`, `num`, `bairro`, `cidade`, `uf`, `refe`, `comple`) VALUES
(1, 'Juliano', 'Tosta', 'perfil/img/12345678915.jpg', 'perfil/img/sem.png', '12345678915', 'TheDrakonZXD@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '11675-490', '', 0, '', 'Caraguatatuba', 'SP', '', ''),
(7, 'Natã', 'Tidioli Girotto', 'perfil/img/478.502.518-22.jpg', 'perfil/img/sem.png', '478.502.518-22', 'natatidioligirotto@gmail.com', '53051b09a24d7263fc967ca9cf53ecc1d2db41bc', '11672340', 'Av Thereza Albino Chacon', 0, 'Jardim Palmeiras', 'Caraguatatuba', 'SP', 'Perto da escola', 'Casa'),
(8, 'Flavio', 'Bitencourt', '', 'perfil/img/sem.png', '999.999.999-99', 'flavio.bitencourt@aluno.ifsp.edu.br', '7c4a8d09ca3762af61e59520943dc26494f8941b', '115230-96', 'Av.Bahia', 622, '', 'Caraguatatuba', 'SP', '', ''),
(14, 'sdadsads', 'dasda', '', 'perfil/img/sem.png', '14152036353', 'teste01@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '11675-490', 'Travessa JoÃ£o Moreira CÃ©sar, 14', 0, '', 'Caraguatatuba', 'SP', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datas`
--
ALTER TABLE `datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filtro`
--
ALTER TABLE `filtro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos_airsoft`
--
ALTER TABLE `produtos_airsoft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soma_total`
--
ALTER TABLE `soma_total`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datas`
--
ALTER TABLE `datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `filtro`
--
ALTER TABLE `filtro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `soma_total`
--
ALTER TABLE `soma_total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;