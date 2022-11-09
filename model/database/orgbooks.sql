/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `orgbooks` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `orgbooks`;

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` char(15) NOT NULL,
  `data_nascimento` date NOT NULL,
  `location` varchar(200) DEFAULT NULL,
  `last_login` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` (`id_admin`, `nome`, `email`, `senha`, `genero`, `endereco`, `telefone`, `data_nascimento`, `location`, `last_login`) VALUES
	(1, 'Janobe', 'janobe@janobe.com', '36d59e2369f00c4d9f336acf', 0, 'N NEPO', '0248865955', '0000-00-00', 'NO-IMAGE-AVAILABLE.jpg', '0000-00-00 00:00:00'),
	(2, 'Lucas', 'lucalima@gmail.com', 'b4cc344d25a2efe540adbf26', 0, 'Bairro do Souza ', '(17) 99842-2414', '1994-06-28', 'chad.jpg', '2022-08-30 20:24:49'),
	(4, 'Nathaniel', 'nat@gmail.com', 'b4cc344d25a2efe540adbf26', 0, 'N NEPO', '587944255', '0000-00-00', 'NO-IMAGE-AVAILABLE.jpg', '0000-00-00 00:00:00'),
	(5, 'Gideon', 'gideon@gmail.com', 'b4cc344d25a2efe540adbf26', 0, 'N NEPO', '587944255', '0000-00-00', 'photo5.jpg', '2022-08-25 20:16:54'),
	(6, 'Martha', 'mat@gmail.com', 'b4cc344d25a2efe540adbf26', 0, 'N NEPO', '587944255', '0000-00-00', 'NO-IMAGE-AVAILABLE.jpg', '0000-00-00 00:00:00'),
	(7, 'Bridget', 'bridget@gmail.com', 'b4cc344d25a2efe540adbf26', 0, 'N NEPO', '0596667981', '0000-00-00', '1920_File_logo4.png', '0000-00-00 00:00:00'),
	(8, 'Anna', 'an@gmail.com', 'b4cc344d25a2efe540adbf26', 0, 'N NEPO', '587944255', '0000-00-00', 'NO-IMAGE-AVAILABLE.jpg', '0000-00-00 00:00:00'),
	(9, 'Ryan', 'test123@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 0, 'teste', '(15) 99933-2342', '2020-05-12', '../uploads/admin/63574aed681552022-10-24-23-33-17imagem.png', '2022-10-25 00:04:09'),
	(10, 'Robertinho', 'robertinho201@gmail.com', '698dc19d489c4e4db73e28a713eab07b', 0, '12133123', '(14) 31039-2193', '1993-03-11', '', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `tb_aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `telefone` char(15) NOT NULL,
  `data_nascimento` date NOT NULL,
  `location` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=97798 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `tb_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_aluno` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `tb_edicao` (
  `id_edicao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `autor` varchar(200) NOT NULL,
  `validade` date NOT NULL,
  PRIMARY KEY (`id_edicao`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `tb_edicao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_edicao` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `tb_emprestimo` (
  `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_unidade` int(11) NOT NULL,
  `cod_aluno` int(11) NOT NULL,
  `data_retirada` date NOT NULL,
  `data_devolucao` date NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  KEY `cod_unidade` (`cod_unidade`),
  KEY `cod_aluno` (`cod_aluno`),
  CONSTRAINT `tb_emprestimo_ibfk_1` FOREIGN KEY (`cod_unidade`) REFERENCES `tb_livro` (`id_livro`),
  CONSTRAINT `tb_emprestimo_ibfk_2` FOREIGN KEY (`cod_aluno`) REFERENCES `tb_aluno` (`id_aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `tb_emprestimo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_emprestimo` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `tb_livro` (
  `id_livro` int(11) NOT NULL AUTO_INCREMENT,
  `cod_edicao` int(11) NOT NULL,
  `status_livro` tinyint(1) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `cod_edicao` (`cod_edicao`),
  CONSTRAINT `tb_livro_ibfk_1` FOREIGN KEY (`cod_edicao`) REFERENCES `tb_edicao` (`id_edicao`)
) ENGINE=InnoDB AUTO_INCREMENT=904404 DEFAULT CHARSET=utf8mb4;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_atualizar_status_livro`(IN id INT, IN _status BOOL)
BEGIN
	UPDATE tb_livro SET status_livro = _status WHERE id_livro = id;
END//
DELIMITER ;

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_total_livros_vencidos`()
BEGIN
	SELECT COUNT(id_livro) FROM tb_livro WHERE cod_edicao IN (SELECT id_edicao FROM tb_edicao WHERE validade < NOW());
END//
DELIMITER ;


/*!40000 ALTER TABLE `tb_livro` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_livro` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;


