CREATE DATABASE audioDB;
USE audioDB;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/08/2023 às 07:25
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `audiodb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `audios`
--

CREATE TABLE `audios` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(300) NOT NULL,
  `storageDate` datetime NOT NULL,
  `size` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `audios`
--

INSERT INTO `audios` (`id`, `name`, `path`, `storageDate`, `size`) VALUES
(1, 'teste.mp3', '../../audio/teste.mp3', '2023-08-20 01:50:50', '8.02MB'),
(2, 'test2.mp3', 'Array', '2023-08-20 02:00:44', '9.13MB'),
(3, 'test3.mp3', 'http://localhost:80/Projetos/Armazenamento_de_audio/audio/test3.mp3', '2023-08-20 02:01:54', '3.82MB'),
(4, 'test4.mp3', 'http://localhost:80/Projetos/Armazenamento_de_audio/audio/test4.mp3', '2023-08-20 02:16:27', '5.94MB');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `audios`
--
ALTER TABLE `audios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
