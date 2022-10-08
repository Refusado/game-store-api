-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: us-cdbr-east-06.cleardb.net
-- Tempo de geração: 08-Out-2022 às 09:18
-- Versão do servidor: 5.6.50-log
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `heroku_874781869d32b3d`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `games`
--

CREATE TABLE `games` (
  `id` int(4) NOT NULL,
  `name` varchar(35) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `company` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `games`
--

INSERT INTO `games` (`id`, `name`, `price`, `category`, `company`) VALUES
(1, 'Grand Theft Auto V', '24.99', 'Ação-Aventura', 'Rockstar Games'),
(2, 'Assassin\'s Creed: The Ezio Collecti', '119.95', 'Ubisoft', 'Ação-Aventura'),
(3, 'The Witcher 3: Wild Hunt', '143.00', 'RPG', 'CD Projekt RED'),
(4, 'Uncharted 4: A Thief\'s End', '64.00', 'Ação-Aventura', 'Naughty Dog'),
(5, 'Elden Ring', '299.90', 'RPG', 'FromSoftware'),
(6, 'How To Survive 2', '29.00', 'Ação', 'EKO Software'),
(7, 'Mafia II: Definitive Edition', '124.95', 'Tiro', 'Hangar 13'),
(8, 'Assassin\'s Creed Unity', '99.00', 'Ação-Aventura', 'Ubisoft Montreal'),
(9, 'BioShock: The Collection', '207.90', 'fps', 'Blind Squirrel Games'),
(10, 'Call of Duty: Black Ops II', '199.00', 'FPS', 'Treyarch'),
(11, 'Far Cry 4', '89.99', 'FPS', 'Ubisoft Montreal'),
(12, 'Cyberpunk 2077', '249.00', 'RPG', 'CD Projekt'),
(13, 'Songs for a Hero - Definitive Editi', '26.99', 'Aventura', 'Dumativa Game Studio'),
(14, 'Minecraft', '74.95', 'Sandbox', 'Mojang Studios'),
(16, 'Final Fantasy VII Remake', '248.42', 'RPG', 'Square Enix'),
(17, 'Metro: Redux', '59.00', 'Tiro', '4A Games'),
(18, 'Need for Speed: Payback', '159.00', 'Corrida', 'Ghost Games'),
(19, 'Little Nightmares Complete Edition', '100.00', 'Terror', 'Tarsier Studios'),
(20, 'Cuphead: The Delicious Last Course', '67.45', 'Run and gun', 'Studio MDHR'),
(21, 'The Witcher 3: Wild Hunt – Complete', '190.00', 'Mundo Aberto', 'CD Projekt RED'),
(22, 'Dragon Ball Xenoverse 2', '250.00', 'Luta', 'Dimps'),
(23, 'Mafia: Definitive Edition', '164.95', 'Tiro', 'Hangar 13'),
(24, 'A Knight\'s Quest', '92.45', 'Aventura', 'Sky9 Games'),
(25, 'Assetto Corsa', '59.00', 'Simulação-Corrida', 'Kunos Simulazioni'),
(26, 'Batman: Arkham Collection', '250.00', 'Beat \'em up', 'Rocksteady Studios'),
(27, 'Backbone', '23.74', 'RPG', 'EggNut'),
(28, 'Tunche', '37.99', 'Ação', 'Leap Game Studios'),
(29, 'NORCO', '28.99', 'Aventura', 'Geography of Robots'),
(30, 'Cris Tales', '149.99', 'RPG', 'Dreams Uncorporated'),
(31, 'Final Fantasy VII Remake', '248.42', 'RPG', 'Square Enix'),
(32, 'The Eternal Cylinder', '56.99', 'Sobrevivência', 'ACE Team'),
(33, 'Horizon Chase Turbo', '47.99', 'Corrida', 'AQUIRIS'),
(34, 'Aztech Forgotten Gods', '51.99', 'Ação-Aventura', 'Lienzo'),
(35, 'Neko Ghost. Jump!', '28.99', 'Puzzle', 'Burgos Games'),
(36, 'Hazel Sky', '49.99', 'Aventura', 'CoffeeAddict Studio'),
(37, 'Pato Box', '28.99', 'Ação-Aventura', 'Bromio'),
(38, 'Mafia: Definitive Edition', '164.95', 'Tiro', 'Hangar 13'),
(39, 'BioShock: The Collection', '207.90', 'fps', 'Blind Squirrel Games'),
(40, 'Need for Speed: Payback', '159.00', 'Corrida', 'Ghost Games');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
