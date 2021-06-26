-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2021 at 01:30 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetojl`
--

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `rua` varchar(100) NOT NULL,
  `numero` int NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cep` int NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `idProduto` bigint NOT NULL,
  `quantidade` int NOT NULL,
  `preco` double NOT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estoque`
--

INSERT INTO `estoque` (`idProduto`, `quantidade`, `preco`) VALUES
(11, 9, 122),
(10, 7, 155.12);

-- --------------------------------------------------------

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `telefone` varchar(900) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `descricao`, `telefone`, `email`) VALUES
(5, 'testee123', 'testeeeeee123', '1234567890', '321@321'),
(4, 'teste', 'testeeee', '123456789', '123@123'),
(6, 'Leonardo Palhano Conrado', 'testeeeeete testeeeeete testeeeeete testeeeeete testeeeeete testeeeeete', '54991788934', 'l.conrado10@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `itempedido`
--

DROP TABLE IF EXISTS `itempedido`;
CREATE TABLE IF NOT EXISTS `itempedido` (
  `idProduto` bigint NOT NULL,
  `numeroPedido` bigint NOT NULL,
  `quantidade` int NOT NULL,
  `preco` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itempedido`
--

INSERT INTO `itempedido` (`idProduto`, `numeroPedido`, `quantidade`, `preco`) VALUES
(11, 1, 3, 366),
(10, 1, 5, 775.6);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero` bigint NOT NULL,
  `datapedido` date NOT NULL,
  `dataentrega` date NOT NULL,
  `situacao` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`id`, `numero`, `datapedido`, `dataentrega`, `situacao`) VALUES
(12, 1, '2021-06-26', '2021-07-03', 'Novo');

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `idFornecedor` bigint NOT NULL,
  `foto` varchar(400) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `idFornecedor` (`idFornecedor`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `idFornecedor`, `foto`) VALUES
(8, 'testeeeeete testeeeeete testeeeeete testeeeeete testeeeeete testeeeeete', 'testeeeeete testeeeeete testeeeeete testeeeeete testeeeeete testeeeeete', 6, ''),
(9, 'Leonardo produto', 'produto teste aquele', 4, ''),
(10, '123', '123', 6, './uploads/1236'),
(11, 'testeee', 'teste', 5, './uploads/testeee5poster_nac.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(999) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cartaocredito` varchar(999) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `tipo` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `cartaocredito`, `senha`, `tipo`) VALUES
(6, '321', '321', '321', '321', '321', 0),
(7, 'teste', '123', 'teste@teste', '1234567890', '123', 0),
(9, 'Leonardo Palhano Conrado', '54991788934', 'l.conrado10@gmail.com', '12312343453', 'teste', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
