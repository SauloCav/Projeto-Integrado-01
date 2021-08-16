create database quizGame;

drop database quizGame;

CREATE TABLE users (
    id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nickname VARCHAR(20) NOT NULL
);

CREATE TABLE questoes_respostas (
    id_questao INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    pergunta varchar(100) NOT NULL,
    resp_correta varchar(50) NOT NULL,
    resp_a varchar(50) NOT NULL,
	resp_b varchar(50) NOT NULL,
	resp_c varchar(50) NOT NULL,
	valida enum ('v','i') NOT NULL
);

select *from questoes_respostas;

select *from users;


desc users;
truncate table users;
drop table questoes_respostas;

delete from questoes_respostas where id_questao = 10;


insert into questoes_respostas values
	(default, 'Normalmente, quantos litros de sangue uma pessoa tem?', 'Tem entre 4 a 6 litros', 'Tem entre 2 a 4 litros', 'Tem 10 litros', 'Tem 7 litros', 'i'),
    (default, 'De quem é a famosa frase “Penso, logo existo”?', 'Descartes', 'Platão', 'Galileu Galilei', 'Sócrates', 'i'),
    (default, 'De onde é a invenção do chuveiro elétrico?', 'Brasil', 'França', 'Inglaterra', 'Austrália', 'i'),
    (default, 'Quais o menor e o maior país do mundo?', 'Vaticano e Rússia', 'Nauru e China', 'Mônaco e Canadá', 'Malta e Estados Unidos', 'i'),
    (default, 'Qual o nome do presidente do Brasil que ficou conhecido como Jango?', 'João Goulart', 'Jacinto Anjos', 'Getúlio Vargas', 'João Figueiredo', 'i'),
    (default, 'Qual o livro mais vendido no mundo a seguir à Bíblia?', 'Dom Quixote', 'O Senhor dos Anéis', 'O Pequeno Príncipe', 'Ela, a Feiticeira', 'i'),
    (default, 'Quantas casas decimais tem o número pi?', 'Infinitas', 'Duas', 'Centenas', 'Vinte', 'i'),
    (default, 'Atualmente, quantos elementos químicos a tabela periódica possui?', '118', '113', '109', '108', 'i'),
    (default, 'O que a palavra legend significa em português?', 'Lenda', 'Legenda', 'Conto', 'História', 'i'),
    (default, 'Qual o número mínimo de jogadores numa partida de futebol?', '7', '10', '9', '5', 'i'),
    (default, 'Quem pintou "Guernica"?', 'Pablo Picasso', 'Paul Cézanne', 'Diego Rivera', 'Tarsila do Amaral', 'i'),
    (default, 'Quanto tempo a luz do Sol demora para chegar à Terra?', '8 minutos', '12 minutos', '1 dia', '12 horas', 'i'),
    (default, 'Qual a nacionalidade de Che Guevara?', 'Argentina', 'Peruana', 'Panamenha', 'Boliviana', 'i'),
    (default, 'Qual a altura da rede de vôlei nos jogos masculino e feminino?', '2,43 m e 2,24 m', '2,5 m e 2,0 m', '1,8 m e 1,5 m', '2,45 m e 2,15 m', 'i'),
    (default, 'Em que período da pré-história o fogo foi descoberto?', 'Paleolítico', 'Neolítico', 'Idade dos Metais', 'Período da Pedra Polida', 'i');



