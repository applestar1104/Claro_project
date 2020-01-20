-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jan-2020 às 20:45
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
-- Estrutura da tabela `docs_templates`
--

CREATE TABLE IF NOT EXISTS `docs_templates` (
  `id_template` int(11) NOT NULL,
  `id_tipodedocumento` varchar(255) NOT NULL,
  `id_header` varchar(255) NOT NULL,
  `id_footer` varchar(255) NOT NULL,
  `versao_template` varchar(255) NOT NULL,
  `conteudo_template` text NOT NULL,
  `criado_por` int(11) NOT NULL,
  `criado_em` datetime NOT NULL,
  `actualizado_por` int(11) NOT NULL,
  `actualizado_em` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `docs_templates`
--
ALTER TABLE `docs_templates`
  ADD PRIMARY KEY (`id_template`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docs_templates`
--
ALTER TABLE `docs_templates`
  MODIFY `id_template` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
