DROP DATABASE IF EXISTS el_baul_dorado;

CREATE DATABASE el_baul_dorado;

USE el_baul_dorado;

CREATE TABLE `users`(
    `id`                 int NOT NULL AUTO_INCREMENT,
    `userName`			VARCHAR(100) NOT NULL,
    `userLastName`		VARCHAR(100) NOT NULL,
    `userBirth`			DATE,
    `userGenre` 		VARCHAR(100) NOT NULL,
	`userEmail`			VARCHAR(100) NOT NULL,
	`userPass`			VARCHAR(100) NOT NULL,
     PRIMARY KEY (`id`)
);