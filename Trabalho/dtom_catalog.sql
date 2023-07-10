-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jul-2023 às 22:19
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dtom_catalog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `games`
--

CREATE TABLE `games` (
  `game_ID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `games`
--

INSERT INTO `games` (`game_ID`, `Title`, `Description`) VALUES
(1, 'Ketamina', 'Jogo de puzzle com ambientação em terror, que se passa em um apartamento'),
(2, 'Little Mages', 'Jogo 2D, Roguelike, com estilo pixel art'),
(3, 'Cyberpunk', 'Jogo de RPG, com ambientação Cyberpunk e mundo aberto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'kanan', 'kanan123'),
(2, 'nathy', 'nathy123'),
(3, 'dubsttep', 'kanan123'),
(4, 'joel', 'joel123'),
(5, 'carlos', 'carlos123'),
(6, 'isac', 'isac123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_ID`),
  ADD UNIQUE KEY `Title` (`Title`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `games`
--
ALTER TABLE `games`
  MODIFY `game_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
