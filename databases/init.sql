CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;
set names 'utf8';

USE appDB;

CREATE TABLE `orders` (
	`orderID` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(200),
	`order` VARCHAR(200),
	PRIMARY KEY (`orderID`)
);
INSERT INTO orders VALUE (NULL, 'Алиса', 'Мэдведь'); 
INSERT INTO orders VALUE (NULL, 'Ваня', 'Паравозик'); 
INSERT INTO orders VALUE (NULL, 'Николай', 'Набор Лего'); 

CREATE TABLE IF NOT EXISTS users (user varchar(191) not null, passwd char(191), primary key (user));
INSERT INTO users VALUE ('admin', '{SHA}W6ph5Mm5Pz8GgiULbPgzG37mj9g=');
