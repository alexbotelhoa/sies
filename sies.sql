-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jun 15, 2012 as 12:47 PM
-- Versão do Servidor: 5.1.49
-- Versão do PHP: 5.3.3-7+squeeze1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `sies`
--
CREATE DATABASE `sies` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sies`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor`
--

CREATE TABLE IF NOT EXISTS `cor` (
  `id_cor` int(6) NOT NULL AUTO_INCREMENT,
  `nome_cor` varchar(32) NOT NULL,
  PRIMARY KEY (`id_cor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`id_cor`, `nome_cor`) VALUES
(1, ' Nenhuma'),
(2, 'Verde'),
(3, 'Amarelo'),
(4, 'Azul'),
(5, 'Branco'),
(6, 'Laranja'),
(7, 'Preto'),
(8, 'Cinza'),
(9, 'Marron'),
(10, 'Bege'),
(11, 'Vermelho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `esquadrao`
--

CREATE TABLE IF NOT EXISTS `esquadrao` (
  `id_esquadrao` int(6) NOT NULL AUTO_INCREMENT,
  `nome_esquadrao` varchar(32) NOT NULL,
  PRIMARY KEY (`id_esquadrao`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `esquadrao`
--

INSERT INTO `esquadrao` (`id_esquadrao`, `nome_esquadrao`) VALUES
(1, 'Comando'),
(2, 'Intendência'),
(3, 'Pessoal'),
(4, 'Saúde'),
(5, 'Infantaria'),
(6, 'Infraestrutura'),
(7, 'GSB'),
(8, '2º/3º GAv'),
(9, '2º/8º GAv'),
(10, 'Obras');

-- --------------------------------------------------------

--
-- Estrutura da tabela `militar`
--

CREATE TABLE IF NOT EXISTS `militar` (
  `id_militar` int(6) NOT NULL AUTO_INCREMENT,
  `nome_militar` varchar(250) NOT NULL,
  `pstgrd_militar` varchar(6) NOT NULL,
  `esp_militar` varchar(12) NOT NULL,
  `guerra_militar` varchar(32) NOT NULL,
  `secao_militar` int(1) NOT NULL,
  `admin_militar` int(1) NOT NULL,
  `login_militar` varchar(50) NOT NULL,
  `senha_militar` varchar(12) NOT NULL,
  PRIMARY KEY (`id_militar`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `militar`
--

INSERT INTO `militar` (`id_militar`, `nome_militar`, `pstgrd_militar`, `esp_militar`, `guerra_militar`, `secao_militar`, `admin_militar`, `login_militar`, `senha_militar`) VALUES
(3, 'Alex Botelho de Almeida', 'Cb', 'BSP', 'Botelho', 0, 1, 'botelhoaba', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id_pessoa` int(12) NOT NULL AUTO_INCREMENT,
  `nome_pessoa` varchar(250) NOT NULL,
  `cnh_pessoa` bigint(12) DEFAULT NULL,
  `cnh_uf_pessoa` varchar(2) DEFAULT NULL,
  `rg_pessoa` bigint(12) DEFAULT NULL,
  `rg_uf_pessoa` varchar(2) DEFAULT NULL,
  `cpf_pessoa` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Extraindo dados da tabela `pessoa`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `pstgrd`
--

CREATE TABLE IF NOT EXISTS `pstgrd` (
  `id_pstgrd` int(6) NOT NULL AUTO_INCREMENT,
  `nome_pstgrd` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pstgrd`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `pstgrd`
--

INSERT INTO `pstgrd` (`id_pstgrd`, `nome_pstgrd`) VALUES
(1, 'Cel'),
(2, 'TCel'),
(3, 'Maj'),
(4, 'Cap'),
(5, '1T'),
(6, '2T'),
(7, 'Asp'),
(8, 'SO'),
(9, 'Asp'),
(10, '1S'),
(11, '2S'),
(12, '3S'),
(13, 'Cb'),
(14, 'S1'),
(15, 'S2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id_registro` int(12) NOT NULL AUTO_INCREMENT,
  `pessoa_registro` int(12) NOT NULL,
  `veiculo_registro` int(12) NOT NULL,
  `cracha_registro` int(6) NOT NULL,
  `secao_registro` int(6) NOT NULL,
  `esquadrao_registro` int(6) NOT NULL,
  `militar_registro` int(6) NOT NULL,
  `dt_entrada_registro` varchar(10) NOT NULL,
  `dt_saida_registro` varchar(10) NOT NULL,
  `hr_entrada_registro` varchar(8) NOT NULL,
  `hr_saida_registro` varchar(8) NOT NULL,
  PRIMARY KEY (`id_registro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Extraindo dados da tabela `registro`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `secao`
--

CREATE TABLE IF NOT EXISTS `secao` (
  `id_secao` int(6) NOT NULL AUTO_INCREMENT,
  `nome_secao` varchar(32) NOT NULL,
  PRIMARY KEY (`id_secao`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Extraindo dados da tabela `secao`
--

INSERT INTO `secao` (`id_secao`, `nome_secao`) VALUES
(1, 'Secretaria'),
(2, 'Ajudância'),
(3, 'Informática'),
(4, 'Protocolo'),
(5, 'Comunicação Social'),
(6, 'PRVF'),
(7, 'Licitação'),
(8, 'Emergência'),
(9, 'Odontologia'),
(10, 'SAME'),
(11, 'Laboratório'),
(12, 'Posto de Medicamento'),
(13, 'Fisioterapia'),
(14, 'Mobolizadora'),
(15, 'Investigação e Justiça'),
(16, 'Inteligência'),
(17, 'Rancho'),
(18, 'HT Oficiais'),
(19, 'HT SO/Sgt'),
(20, 'HT Cb/Sd'),
(21, 'Material Bélico'),
(22, 'Educação Física'),
(23, 'Banda de Música'),
(24, 'Almoxarifado'),
(25, 'Ferramentaria'),
(26, 'SOT'),
(27, 'SOA'),
(28, 'SCOAM'),
(29, 'Simulador'),
(30, 'S1'),
(31, 'S2'),
(32, 'S3'),
(33, 'S4'),
(34, 'Doutrina'),
(35, 'Suprimento'),
(36, 'COMARA'),
(37, 'Atendimento'),
(38, 'ETM'),
(39, 'Chefia'),
(40, 'CPL'),
(41, 'Tesouraria'),
(42, 'Assistência Social'),
(43, 'Inativos e Pensionista'),
(44, 'Assistência Religiosa'),
(45, 'Serviços Gerais'),
(46, 'Refrigeração'),
(47, 'Patrimônio'),
(48, 'Serralheria'),
(49, 'Pintura'),
(50, 'Polícia da Aeronáutica'),
(51, 'S5'),
(52, 'S6');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(6) NOT NULL AUTO_INCREMENT,
  `nome_tipo` varchar(32) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nome_tipo`) VALUES
(1, 'Caminhão'),
(2, 'Caminhonete'),
(3, 'Van'),
(4, 'Carro'),
(5, 'Moto'),
(6, 'Bicicleta'),
(7, 'Ônibus'),
(8, 'A pé');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE IF NOT EXISTS `veiculo` (
  `id_veiculo` int(12) NOT NULL AUTO_INCREMENT,
  `tipo_veiculo` int(6) NOT NULL,
  `placa_veiculo` varchar(7) NOT NULL,
  `cor_veiculo` int(2) NOT NULL,
  PRIMARY KEY (`id_veiculo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Extraindo dados da tabela `veiculo`
--

