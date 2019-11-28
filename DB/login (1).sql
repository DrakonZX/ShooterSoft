-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Nov-2019 às 16:14
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
  `desconto` decimal(6,2) NOT NULL,
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

INSERT INTO `produtos_airsoft` (`id`, `nome`, `preco`, `preco_antigo`, `parcelas`, `desconto`, `marca`, `img`, `img2`, `img3`, `categoria`, `mais_vendidos`, `promocao`, `promocao_preco`, `peso`, `sistema`, `disparo`, `gas`, `calibre`, `comprimento`, `altura`, `mira`, `bateria`, `material`, `texto_carac`, `tipo`, `caminho`, `caminho_categoria`, `slide`, `img_slide`) VALUES
(1, 'SHOTGUN AIRSOFT MOSSBERG 500 ', '500.00', '759.00', '50.00', '435.00', 'ActionX airsoft', 'img_produtos/Imagens_correta/5.jpg', 'img_produtos/Imagens_correta/5_2.jpg', 'img_produtos/Imagens_correta/5_3.jpg', 'Escopetas', 0, 0, '0.00', '14.00', 'Spring', 'Manual', '', '6mm', '98.00', '13.00', '1x Fake Red-dot', 'Não contém', 'Polímero e Metal', '', 'Airsoft', 'escopeta.php', 'airsoft.php', 0, ''),
(2, 'RIFLE AEG M4A1 CM507', '999.00', '1350.00', '99.90', '869.13', 'slin', 'img_produtos/Imagens_correta/14.jpg', 'img_produtos/Imagens_correta/14_2.jpg', 'img_produtos/Imagens_correta/14_3.jpg', 'Rifles', 0, 1, '0.00', '15.24', 'Pressão', 'Manual', '', '4.3', '58.00', '15.00', 'Não contém', 'Não contém', 'Polimero e Metal', '', 'Airsoft', 'rifle.php', 'airsoft.php', 1, 'img/a.png'),
(3, 'PISTOLA 247 KWC', '299.00', '499.00', '59.80', '260.13', 'slin', 'img_produtos/Imagens_correta/11.jpg', 'img_produtos/Imagens_correta/11_2.jpg', 'img_produtos/Imagens_correta/11_3.jpg', 'Pistolas', 1, 0, '0.00', '0.00', 'Pressão', 'Manual', '', '4.3', '36.00', '6.00', 'Não contém', 'Não contém', 'Polímero e Metal', '', 'Airsoft', 'pistola.php', 'airsoft.php', 1, 'img/c.png'),
(4, 'PISTOLA 1911 GBB CO2', '999.00', '2191.00', '99.00', '869.13', 'slin', 'img_produtos/Imagens_correta/12.jpg', 'img_produtos/Imagens_correta/12_2.jpg', 'img_produtos/Imagens_correta/12_3.jpg', 'Pistolas CO2', 0, 0, '0.00', '0.00', 'Gás CO2', 'Manual', '', '4.3', '46.00', '7.00', 'Não contém', 'Contém', 'Polímero e Metal', '', 'Airsoft', 'pistola.php', 'airsoft.php', 0, ''),
(5, 'PISTOLA GLOCK GBB  GREEN GAS R17', '999.00', '1320.00', '99.00', '869.13', 'slin', 'img_produtos/Imagens_correta/13.jpg', 'img_produtos/Imagens_correta/13_2.jpg', 'img_produtos/Imagens_correta/13_3.jpg', 'Pistolas GBB', 1, 1, '0.00', '0.00', 'Gás CO2', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'pistola.php', 'airsoft.php', 0, ''),
(6, 'BERETTA AEP UMAREX', '890.00', '1250.00', '89.00', '774.30', 'slin', 'img_produtos/Imagens_correta/10.jpg', 'img_produtos/Imagens_correta/10_2.jpg', 'img_produtos/Imagens_correta/10_3.jpg', 'Pistolas Elétrica', 0, 0, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'pistola.php', 'airsoft.php', 0, ''),
(7, 'SNIPER GREEN GAS G86B', '3799.00', '4591.20', '379.00', '3305.13', 'slin', 'img_produtos/Imagens_correta/16.jpg', 'img_produtos/Imagens_correta/16_2.jpg', 'img_produtos/Imagens_correta/16_3.jpg', 'Rifles', 1, 1, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'rifle.php', 'airsoft.php', 1, 'img/b.png'),
(8, 'RIFLE M62', '719.10', '1199.00', '79.90', '625.62', 'slin', 'img_produtos/Imagens_correta/15.jpg', 'img_produtos/Imagens_correta/15_2.jpg', 'img_produtos/Imagens_correta/15_3.jpg', 'Rifles', 0, 0, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'rifle.php', 'airsoft.php', 0, ''),
(9, 'MARCADOR PAINTBALL RIFLE LASER TAG EAGLE  EYE SYSTEM – PRETO', '4850.40', '7000.79', '485.04', '4219.85', 'slin', 'img_produtos/Imagens_correta/8.jpg', 'img_produtos/Imagens_correta/8_2.jpg', '', 'Marcadores', 0, 1, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Paintball', 'paintball.php', 'paintball.php', 0, ''),
(10, 'MARCADOR PAINTBALL PISTOLA RAP4 DESERT EAGLE - PRETO', '1527.00', '2005.00', '152.74', '1328.49', 'slin', 'img_produtos/Imagens_correta/7_3.jpg', 'img_produtos/Imagens_correta/7.jpg', 'img_produtos/Imagens_correta/7_2.jpg', 'Marcadores', 0, 0, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Paintball', 'paintball.php', 'paintball.php', 0, ''),
(11, 'ESCOPETA M300 WESSON', '259.00', '300.00', '51.00', '225.33', 'slin', 'img_produtos/Imagens_correta/6.jpg', 'img_produtos/Imagens_correta/6_2.jpg', 'img_produtos/Imagens_correta/6_3.jpg', 'Escopetas', 1, 1, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'escopeta.php', 'airsoft.php', 0, ''),
(12, 'CILINDRO AIRSOFT CO2 - 12G', '6.29', '8.30', '6.29', '5.47', 'slin', 'img_produtos/Imagens_correta/1.jpg', 'img_produtos/Imagens_correta/1_2.jpg', '', 'Acessórios', 1, 0, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'acessorios_airsoft.php', 'airsoft.php', 0, ''),
(13, 'MUNIÇÃO AIRSOFT TOKYO MARUI BBS 0.25g - 1300 UNIDADES', '62.91', '100.00', '6.29', '54.73', 'slin', 'img_produtos/Imagens_correta/2.jpg', '', '', 'Acessórios', 1, 1, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Airsoft', 'acessorios_airsoft.php', 'airsoft.php', 0, ''),
(14, 'ARCO CRUZ JANDÃO CROSSBOW HWXR - 33 35 - 60 180', '2839.94', '3000.00', '283.99', '2470.75', 'slin', 'img_produtos/Imagens_correta/3.jpg', 'img_produtos/Imagens_correta/3_2.jpg', 'img_produtos/Imagens_correta/3_3.jpg', 'Arcos', 0, 0, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Arquearia', 'arquearia.php', 'arquearia.php', 0, ''),
(15, 'BALESTRA CHACE SUN JANDÃO 2009F - 176', '2404.56', '2600.00', '240.56', '2091.97', 'slin', 'img_produtos/Imagens_correta/4.jpg', 'img_produtos/Imagens_correta/4.2jpg', 'img_produtos/Imagens_correta/4_3.jpg', 'Balestras', 0, 0, '0.00', '0.00', '', '', '', '', '0.00', '0.00', '', '', '', '', 'Arquearia', 'arquearia.php', 'arquearia.php', 0, '');

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
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filtro`
--
ALTER TABLE `filtro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
