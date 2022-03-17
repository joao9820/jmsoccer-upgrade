-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jun-2021 às 06:06
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jmsoccer`
--

CREATE DATABASE jmsoccer;
USE jmsoccer;

-- --------------------------------------------------------

--
-- Estrutura da tabela `camiseta`
--

CREATE TABLE `camiseta` (
  `idcamiseta` int(11) NOT NULL,
  `time` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `valor` varchar(50) NOT NULL,
  `prazo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `camiseta`
--

INSERT INTO `camiseta` (`idcamiseta`, `time`, `modelo`, `cor`, `valor`, `prazo`) VALUES
(16, 'cheseal', 'torcedor', 'azul', '125,00', '15 dias'),
(17, 'cheseal', 'torcedor', 'azul', '125,00', '15 dias');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`usuario`, `senha`) VALUES
('junior', '12345'),
('joao', '202cb962ac59075b964b07152d234b70'),
('junior', '202cb962ac59075b964b07152d234b70'),
('cristiano', 'e10adc3949ba59abbe56e057f20f883e'),
('junior', '81dc9bdb52d04dc20036dbd8313ed055'),
('junior', '289dff07669d7a23de0ef88d2f7129e7'),
('junior', '81dc9bdb52d04dc20036dbd8313ed055'),
('junior', '81dc9bdb52d04dc20036dbd8313ed055'),
('king', '81dc9bdb52d04dc20036dbd8313ed055'),
('carlos', 'eda65f6d1dd1e477421794dd014ad680');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produtos` int(11) NOT NULL,
  `tamanho` int(50) NOT NULL,
  `cor` int(50) NOT NULL,
  `tipo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `camiseta`
--
ALTER TABLE `camiseta`
  ADD PRIMARY KEY (`idcamiseta`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produtos`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `camiseta`
--
ALTER TABLE `camiseta`
  MODIFY `idcamiseta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `produtos`
--
--ALTER TABLE `produtos`
--  MODIFY `id_produtos` int(11) NOT NULL AUTO_INCREMENT;
--COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
