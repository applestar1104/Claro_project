-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jan-2020 às 19:24
-- Versão do servidor: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `claro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `docs_footers`
--

CREATE TABLE IF NOT EXISTS `docs_footers` (
  `id_footer` int(11) NOT NULL,
  `nome_footer` varchar(255) NOT NULL,
  `conteudo_footer` text NOT NULL,
  `criado_por` int(11) NOT NULL,
  `criado_em` datetime NOT NULL,
  `actualizado_por` int(11) NOT NULL,
  `actualizado_em` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `principal` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `docs_footers`
--

INSERT INTO `docs_footers` (`id_footer`, `nome_footer`, `conteudo_footer`, `criado_por`, `criado_em`, `actualizado_por`, `actualizado_em`, `activo`, `principal`) VALUES
(1, 'Footer 1', 'This is a footer!<br /><br />Another line.', 1, '2020-01-16 19:14:34', 1, '2020-01-16 19:18:30', 1, 1),
(2, 'Header 2', 'This is another footer!', 1, '2020-01-16 19:14:34', 1, '2020-01-16 19:18:30', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `docs_headers`
--

CREATE TABLE IF NOT EXISTS `docs_headers` (
  `id_header` int(11) NOT NULL,
  `nome_header` varchar(255) NOT NULL,
  `conteudo_header` text NOT NULL,
  `criado_por` int(11) NOT NULL,
  `criado_em` datetime NOT NULL,
  `actualizado_por` int(11) NOT NULL,
  `actualizado_em` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `principal` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `docs_headers`
--

INSERT INTO `docs_headers` (`id_header`, `nome_header`, `conteudo_header`, `criado_por`, `criado_em`, `actualizado_por`, `actualizado_em`, `activo`, `principal`) VALUES
(1, 'Header 1', 'This is a header!<br /><br />Another line.', 1, '2020-01-16 19:14:34', 1, '2020-01-16 19:14:34', 1, 1),
(2, 'Header 2', 'This is another header!', 1, '2020-01-16 19:14:34', 0, '0000-00-00 00:00:00', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `docs_footers`
--
ALTER TABLE `docs_footers`
  ADD PRIMARY KEY (`id_footer`);

--
-- Indexes for table `docs_headers`
--
ALTER TABLE `docs_headers`
  ADD PRIMARY KEY (`id_header`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docs_footers`
--
ALTER TABLE `docs_footers`
  MODIFY `id_footer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `docs_headers`
--
ALTER TABLE `docs_headers`
  MODIFY `id_header` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
