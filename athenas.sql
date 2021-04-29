-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Abr-2021 às 19:53
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `athenas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nomecat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nomecat`) VALUES
(1, 'Admin'),
(2, 'Gerente'),
(3, 'Normal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `email`, `categoria`) VALUES
(1, 'Jorge da Silva', 'jorge@terra.com.br', 1),
(2, 'Flavia Monteiro', 'flavia@globo.com', 2),
(3, 'Marcos Frota Ribeiro', 'ribeiro@gmail.com', 2),
(4, 'Raphael Souza Santos', 'rsantos@gmail.com', 1),
(5, 'Pedro Paulo Mota', 'ppmota@gmail.com', 1),
(6, 'Winder Carvalho da Silva', 'winder@hotmail.com', 3),
(7, 'Maria da Penha Albuquerque', 'mpa@hotmail.com', 3),
(8, 'Rafael Garcia Souza', 'rgsouza@hotmail.com', 3),
(9, 'Tabata Costa', 'tabata_costa@gmail.com', 2),
(10, 'Ronil Camarote', 'camarote@terra.com.br', 1),
(11, 'Joaquim Barbosa', 'barbosa@globo.com', 1),
(12, 'Eveline Maria Alcantra', 'ev_alcantra@gmail.com', 2),
(13, 'João Paulo Vieira', 'jpvieria@gmail.com', 1),
(14, 'Carla Zamborlini', 'zamborlini@terra.com.br', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
