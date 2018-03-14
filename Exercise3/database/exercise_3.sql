CREATE DATABASE `exercise_3` DEFAULT CHARACTER SET utf8;

USE `exercise_3`;

CREATE TABLE movies (
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    actors VARCHAR(255),
    director VARCHAR(255),
    producer VARCHAR(255),
    year_of_prod YEAR,
    `language` VARCHAR(255),
    category ENUM('comedy', 'sci-fi', 'action', 'thriller', 'animation', 'fantasy'),
    storyline TEXT,
    video VARCHAR(255)
)ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_bin;
