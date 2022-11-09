CREATE DATABASE orgbooks; 

USE orgbooks; 

CREATE TABLE tb_admin (
	id_admin INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	nome VARCHAR(150) NOT NULL, 
	email VARCHAR(200) NOT NULL, 
	senha VARCHAR(50) NOT NULL, 
	genero BOOL NOT NULL, 
	endereco VARCHAR(255) NOT NULL, 
	telefone CHAR(15) NOT NULL, 
	data_nascimento DATE NOT NULL, 
	location VARCHAR(200) DEFAULT NULL,
	last_login DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE tb_aluno (
	id_aluno INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	nome VARCHAR(100) NOT NULL, 
	curso VARCHAR(100) NOT NULL,
	email VARCHAR(200) NOT NULL, 
	genero BOOL NOT NULL, 
	endereco VARCHAR(200) NOT NULL,
	telefone CHAR(15) NOT NULL, 
	data_nascimento DATE NOT NULL,
	location VARCHAR(200) DEFAULT NULL
); 

CREATE TABLE tb_edicao (
	id_edicao INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	nome VARCHAR(100) NOT NULL, 
	materia VARCHAR(50) NOT NULL, 
	autor VARCHAR(200) NOT NULL, 
	validade DATE NOT NULL
);


CREATE TABLE tb_livro (
	id_livro INT NOT NULL PRIMARY KEY  AUTO_INCREMENT, 
	cod_edicao INT NOT NULL, 
	status_livro BOOL NOT NULL, 
	descricao VARCHAR(100) DEFAULT NULL,
	FOREIGN KEY(cod_edicao) REFERENCES tb_edicao(id_edicao)
);


CREATE TABLE tb_emprestimo (
	id_emprestimo INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	cod_unidade INT NOT NULL, 
	cod_aluno INT NOT NULL, 
	data_retirada DATE NOT NULL, 
	data_devolucao DATE NOT NULL, 
	FOREIGN KEY(cod_unidade) REFERENCES tb_livro(id_livro), 
	FOREIGN KEY(cod_aluno) REFERENCES tb_aluno(id_aluno)
);

DELIMITER 
CREATE PROCEDURE `sp_atualizar_status_livro`(IN id INT, IN _status BOOL)
BEGIN
	UPDATE tb_livro SET status_livro = _status WHERE id_livro = id;
END
DELIMITER;

CALL sp_atualizar_status_livro(484978, 1);

DELIMITER 
CREATE PROCEDURE `sp_total_livros_vencidos`()
BEGIN
	SELECT COUNT(id_livro) FROM tb_livro WHERE cod_edicao IN (SELECT id_edicao FROM tb_edicao WHERE validade < NOW());
END
DELIMITER;
