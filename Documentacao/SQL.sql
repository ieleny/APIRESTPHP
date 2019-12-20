-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.37-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para 3140397_agendabanco
CREATE DATABASE IF NOT EXISTS `3140397_agendabanco` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `3140397_agendabanco`;

-- Copiando estrutura para tabela 3140397_agendabanco.agenda
CREATE TABLE IF NOT EXISTS `agenda` (
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `nascimento` date NOT NULL,
  `telefone` varchar(35) NOT NULL,
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_agenda`),
  UNIQUE KEY `id_agenda` (`id_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela 3140397_agendabanco.email
CREATE TABLE IF NOT EXISTS `email` (
  `id_agenda` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `id_email` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
