-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- SO do servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para loja
CREATE DATABASE IF NOT EXISTS `loja` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `loja`;

-- A despejar estrutura para tabela loja.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `nome_completo` varchar(200) DEFAULT NULL,
  `morada` varchar(200) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `purl` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_At` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela loja.clientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id_cliente`, `email`, `senha`, `nome_completo`, `morada`, `cidade`, `telefone`, `purl`, `activo`, `created_at`, `updated_at`, `deleted_At`) VALUES
	(1, 'testegmail@gmail.com', '$2y$10$Ta54Q6N3keSAn139Fo2y7OBN9hpLA6YG1EBixxmj6964KJPbCZB9u', 'Ivan fsdfdsa', 'fdsfdsfdfds', '432142134', 'olhao', 'depKQbq65NP9', 0, '2024-04-26 15:14:13', '2024-04-26 15:14:13', NULL),
	(2, 'qwerty123@gmail.com', '$2y$10$yw/k8rGfi.w076Kr8Y4Fu.DONl.uasA7wHnaCDyu2qcG3eq/sPW7q', 'Ivan fsdfdsa', 'fdsfdsfdfds', '13214213321', 'olhao', 'SrF4AMioLxqu', 0, '2024-04-26 15:14:45', '2024-04-26 15:14:45', NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
