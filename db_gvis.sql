-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 18/06/2012 às 22h38min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `db_gvis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usu`
--

CREATE TABLE IF NOT EXISTS `tb_usu` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `no_usu` varchar(40) NOT NULL,
  `se_usu` varchar(40) NOT NULL,
  `dt_criada` int(11) NOT NULL,
  `role` varchar(40) NOT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='tabela de usuários para acesso ao sistema' AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_usu`
--

INSERT INTO `tb_usu` (`id_usu`, `no_usu`, `se_usu`, `dt_criada`, `role`) VALUES
(1, 'admin', '15ce96ab12e039d2f88e4681a163152f', 1339790091, 'admin'),
(2, 'frank', '15ce96ab12e039d2f88e4681a163152f', 1339790091, 'user'),
(3, 'guest', '15ce96ab12e039d2f88e4681a163152f', 1339790091, 'guest'),
(4, 'superuser', '15ce96ab12e039d2f88e4681a163152f', 1339790091, 'superuser');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
