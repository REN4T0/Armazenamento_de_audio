CREATE DATABASE audioDB;
USE audioDB;

CREATE TABLE `audios` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `path` varchar(300) NOT NULL,
  `storageDate` DATETIME NOT NULL,
  `size` varchar(15) NOT NULL
);