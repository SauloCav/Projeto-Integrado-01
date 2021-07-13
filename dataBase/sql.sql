create database quizGame;

CREATE TABLE users (
    id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nickname VARCHAR(20),
    avatar VARCHAR(100)
);

select *from users;
desc users;
truncate table users;
drop table users;

drop database quizGame;
