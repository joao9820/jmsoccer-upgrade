-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Mar-2022 às 03:46
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

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
(16, 'cheseal', 'torcedor', 'azul', '125,00', '15'),
(17, 'cheseal', 'torcedor', 'azul', '125,00', '15 dias'),
(18, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cat_camisetas`
--

CREATE TABLE `cat_camisetas` (
  `id` int(11) NOT NULL,
  `nome` varchar(125) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cat_camisetas`
--

INSERT INTO `cat_camisetas` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Nacionais', '2022-03-15 01:35:46', '2022-03-15 01:35:46'),
(2, 'Internacionais', '2022-03-15 01:35:46', '2022-03-15 01:35:46'),
(3, 'Seleções', '2022-03-15 01:35:46', '2022-03-15 01:35:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `usuario`, `senha`) VALUES
(1, 'junior', '12345'),
(2, 'joao', '202cb962ac59075b964b07152d234b70'),
(3, 'joao1', '202cb962ac59075b964b07152d234b70'),
(4, 'cristiano', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'junior2', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'junior3', '289dff07669d7a23de0ef88d2f7129e7'),
(7, 'junior4', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'junior5', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'king', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'carlos', 'eda65f6d1dd1e477421794dd014ad680'),
(11, 'jose', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `cat_camiseta_id` int(11) DEFAULT NULL,
  `nome` varchar(245) NOT NULL,
  `tamanho` varchar(3) DEFAULT NULL,
  `modelo` varchar(245) DEFAULT NULL,
  `cor` varchar(100) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `preco` decimal(8,2) NOT NULL,
  `img` varchar(245) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `cat_camiseta_id`, `nome`, `tamanho`, `modelo`, `cor`, `tipo`, `preco`, `img`, `created_at`, `updated_at`) VALUES
(1, 2, 'Camisa Liverpool', NULL, '2021/2022', '', NULL, '229.99', 'Liverpool-hk-1819-516x680-2-.png', '2022-03-17 23:16:11', '2022-03-17 23:16:11'),
(2, 3, 'Camisa Brasil2', NULL, '2021/2022', 'Azul', NULL, '329.95', 'camisa brasil azul.jpg', '2022-03-17 23:20:00', '2022-03-17 23:20:00'),
(3, 2, 'Camisa Chelsea', NULL, '2021/2022', 'Azul', NULL, '229.99', 'camisa cheseal.jpg', '2022-03-17 23:20:00', '2022-03-17 23:20:00'),
(4, 2, 'Camisa Boca Jr', NULL, '2021/2022', 'Branca', NULL, '119.99', 'Camisa-Boca-Junior.jpg', '2022-03-17 23:20:00', '2022-03-17 23:20:00'),
(5, 3, 'Camisa França', NULL, '2021/2022', 'Preta', NULL, '118.99', 'camisa frana.jpg', '2022-03-17 23:20:00', '2022-03-17 23:20:00'),
(6, 2, 'Camisa Crystal Palace', NULL, '2021/2022', NULL, NULL, '199.99', 'crystalpalace-ak-1819-516x680-1-.png', '2022-03-17 23:16:11', '2022-03-17 23:16:11'),
(7, 3, 'Camisa PSG', NULL, '2021/2022', '', NULL, '118.99', 'camisa paris.jpg', '2022-03-17 23:20:00', '2022-03-17 23:20:00'),
(8, 2, 'Camisa Crystal Palace 2', NULL, '2021/2022', NULL, NULL, '248.99', 'crystalpalace-hk-1819-516x680-2-.png', '2022-03-17 23:27:23', '2022-03-17 23:27:23'),
(9, 2, 'Camisa Man. City', NULL, 'Jogador nº 9', NULL, NULL, '248.99', 'mancity-hk-1819-516x680-2-.png', '2022-03-17 23:27:23', '2022-03-17 23:27:23'),
(10, 2, 'Camisa Liverpool', NULL, 'Clássico', NULL, NULL, '248.99', 'myQlQcXp.png', '2022-03-17 23:16:11', '2022-03-17 23:16:11'),
(13, NULL, 'Flamengo', NULL, 'FLA-2021', 'VERMELHO', NULL, '0.00', NULL, '2022-03-19 01:54:22', '2022-03-19 01:54:22'),
(16, NULL, 'Corinthians', NULL, 'corinthians-2021', 'branca', NULL, '350.25', NULL, '2022-03-19 01:56:21', '2022-03-19 01:56:21'),
(17, 1, 'São Paulo', NULL, '2021', 'Branca', NULL, '250.00', 'camisa-sao-paulo.jpg', '2022-03-19 02:38:17', '2022-03-19 02:38:17');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `camiseta`
--
ALTER TABLE `camiseta`
  ADD PRIMARY KEY (`idcamiseta`);

--
-- Índices para tabela `cat_camisetas`
--
ALTER TABLE `cat_camisetas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produtos_cat_camiseta_id` (`cat_camiseta_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `camiseta`
--
ALTER TABLE `camiseta`
  MODIFY `idcamiseta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `cat_camisetas`
--
ALTER TABLE `cat_camisetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_cat_camiseta_id` FOREIGN KEY (`cat_camiseta_id`) REFERENCES `cat_camisetas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
