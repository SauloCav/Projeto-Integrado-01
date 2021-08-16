create database quizGame;

drop database quizGame;

CREATE TABLE users (
    id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nickname VARCHAR(20) NOT NULL
);

CREATE TABLE questoes (
    id_questao INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    pergunta varchar(100) NOT NULL,
    resp_a varchar(50) NOT NULL,
	resp_b varchar(50) NOT NULL,
	resp_c varchar(50) NOT NULL,
	valida enum ('v','i') NOT NULL
);

CREATE TABLE resposta_correta (
    id_resp_correta INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	resp_correta varchar(50) NOT NULL,
    id_quest int NOT NULL,
	FOREIGN KEY(id_quest) references questoes(id_questao)
);


select *from users;

select *from questoes;

select *from resposta_correta;


desc users;
truncate table users;
drop table users;

delete from users where id_user = 2;

delete from questoes where id_questao = 10;

delete from resposta_correta where id_quest = 8;
