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


-- A despejar estrutura da base de dados para php_store
CREATE DATABASE IF NOT EXISTS `php_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `php_store`;

-- A despejar estrutura para vista php_store.admins
-- A criar tabela temporária para vencer erros de dependências VIEW
CREATE TABLE `admins` (
	`id_admin` INT(11) NOT NULL,
	`utilizador` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`password` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`created_at` DATETIME NULL,
	`updated_at` DATETIME NULL,
	`deleted_at` DATETIME NULL
) ENGINE=MyISAM;

-- A despejar estrutura para vista php_store.categoria
-- A criar tabela temporária para vencer erros de dependências VIEW
CREATE TABLE `categoria` (
	`id_categoria` INT(11) NOT NULL,
	`descricao` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`icone` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`nota` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`created_at` DATETIME NULL,
	`updated_at` DATETIME NULL,
	`deleted_at` DATETIME NULL,
	`activo` TINYINT(1) NULL
) ENGINE=MyISAM;

-- A despejar estrutura para tabela php_store.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL,
  `nome_completo` varchar(250) DEFAULT NULL,
  `morada` varchar(250) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `purl` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deteled_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados não seleccionada.

-- A despejar estrutura para vista php_store.clientes
-- A criar tabela temporária para vencer erros de dependências VIEW
CREATE TABLE `clientes` (
	`id_cliente` INT(10) UNSIGNED NOT NULL,
	`email` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`senha` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci',
	`nome_completo` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci',
	`morada` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci',
	`cidade` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`telefone` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`purl` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`activo` TINYINT(1) NULL,
	`created_at` DATETIME NULL,
	`updated_at` DATETIME NULL,
	`deleted_at` VARCHAR(45) NULL COLLATE 'utf8mb4_general_ci',
	`updated_img` DATETIME NULL,
	`foto` VARCHAR(300) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- A despejar estrutura para vista php_store.encomendas
-- A criar tabela temporária para vencer erros de dependências VIEW
CREATE TABLE `encomendas` (
	`id_encomenda` INT(11) NOT NULL,
	`id_cliente` VARCHAR(45) NULL COLLATE 'utf8mb4_general_ci',
	`data_encomenda` DATETIME NULL,
	`morada` VARCHAR(200) NULL COLLATE 'utf8mb4_general_ci',
	`cidade` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`telefone` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`codigo_encomenda` VARCHAR(20) NULL COLLATE 'utf8mb4_general_ci',
	`status` VARCHAR(20) NULL COLLATE 'utf8mb4_general_ci',
	`mensagem` VARCHAR(1000) NULL COLLATE 'utf8mb4_general_ci',
	`created_at` DATETIME NULL,
	`updated_at` DATETIME NULL
) ENGINE=MyISAM;

-- A despejar estrutura para vista php_store.encomenda_produto
-- A criar tabela temporária para vencer erros de dependências VIEW
CREATE TABLE `encomenda_produto` (
	`id_encomenda_produto` INT(11) NOT NULL,
	`id_encomenda` VARCHAR(45) NULL COLLATE 'utf8mb4_general_ci',
	`designacao_produto` VARCHAR(200) NULL COLLATE 'utf8mb4_general_ci',
	`preco_unidade` DECIMAL(6,2) NULL,
	`quantidade` INT(11) NULL,
	`created_at` DATETIME NULL
) ENGINE=MyISAM;

-- A despejar estrutura para vista php_store.produtos
-- A criar tabela temporária para vencer erros de dependências VIEW
CREATE TABLE `produtos` (
	`id_produto` INT(11) NOT NULL,
	`categoria` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`nome_produto` VARCHAR(200) NULL COLLATE 'utf8mb4_general_ci',
	`descricao` VARCHAR(200) NULL COLLATE 'utf8mb4_general_ci',
	`imagem` VARCHAR(200) NULL COLLATE 'utf8mb4_general_ci',
	`preco` DECIMAL(6,2) NULL,
	`stock` INT(11) NULL,
	`visivel` TINYINT(4) NULL,
	`created_at` DATETIME NULL,
	`update_at` DATETIME NULL,
	`deleted_at` DATETIME NULL
) ENGINE=MyISAM;

-- A despejar estrutura para vista php_store.admins
-- A remover tabela temporária e a criar estrutura VIEW final
DROP TABLE IF EXISTS `admins`;
;

-- A despejar estrutura para vista php_store.categoria
-- A remover tabela temporária e a criar estrutura VIEW final
DROP TABLE IF EXISTS `categoria`;
;

-- A despejar estrutura para vista php_store.clientes
-- A remover tabela temporária e a criar estrutura VIEW final
DROP TABLE IF EXISTS `clientes`;
;

-- A despejar estrutura para vista php_store.encomendas
-- A remover tabela temporária e a criar estrutura VIEW final
DROP TABLE IF EXISTS `encomendas`;
;

-- A despejar estrutura para vista php_store.encomenda_produto
-- A remover tabela temporária e a criar estrutura VIEW final
DROP TABLE IF EXISTS `encomenda_produto`;
;

-- A despejar estrutura para vista php_store.produtos
-- A remover tabela temporária e a criar estrutura VIEW final
DROP TABLE IF EXISTS `produtos`;
;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
