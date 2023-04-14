-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para cadeira
CREATE DATABASE IF NOT EXISTS `cadeira` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cadeira`;

-- Copiando estrutura para tabela cadeira.cadeiras
CREATE TABLE IF NOT EXISTS `cadeiras` (
  `idcadeira` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `tipo_suspensao` varchar(50) DEFAULT NULL,
  `tipo_encosto` varchar(50) DEFAULT NULL,
  `tipo_material` varchar(50) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `valor` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`idcadeira`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela cadeira.cadeiras: ~2 rows (aproximadamente)
DELETE FROM `cadeiras`;
INSERT INTO `cadeiras` (`idcadeira`, `nome`, `tipo_suspensao`, `tipo_encosto`, `tipo_material`, `cor`, `valor`) VALUES
	(20, '', '', '', '', '', 0.000000),
	(21, 'GHDF', 'GHFH', 'GFH', 'GFHFD', 'GHGFDH', 582.000000),
	(22, 'GHDF', 'GHFH', 'GFH', 'GFHFD', 'GHGFDH', 582.000000),
	(23, 'vhgh', 'ghsg', 'ghs', 'gsh', 'gsshg', 555.000000),
	(24, 'cccc', 'ccc', 'cccc', 'cccc', 'cccc', 22222.000000),
	(25, 'cccc', 'ccc', 'cccc', 'cccc', 'cccc', 1111.000000);

-- Copiando estrutura para tabela cadeira.henrimack
CREATE TABLE IF NOT EXISTS `henrimack` (
  `IDTIPO` int(11) NOT NULL AUTO_INCREMENT,
  `TIPO` varchar(50) NOT NULL DEFAULT '',
  `MODELOS` varchar(50) NOT NULL DEFAULT '',
  `COR` varchar(50) NOT NULL DEFAULT '',
  `VALOR` decimal(15,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`IDTIPO`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela cadeira.henrimack: ~5 rows (aproximadamente)
DELETE FROM `henrimack`;
INSERT INTO `henrimack` (`IDTIPO`, `TIPO`, `MODELOS`, `COR`, `VALOR`) VALUES
	(12, 'Decoracao', 'grthrt', 'htrhr', 445.00);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
