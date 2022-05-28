-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Maio-2022 às 07:35
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
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `login_id`, `nome`, `cpf`, `created_at`, `updated_at`) VALUES
(5, 22, 'Maria Silva', '44556122122', '2022-04-02 01:01:46', '2022-04-02 01:01:46'),
(6, 23, '', '', '2022-04-02 01:53:59', '2022-04-02 01:53:59'),
(19, 36, 'Heloisa Helena', '83764639', '2022-04-02 02:31:57', '2022-04-02 02:31:57'),
(20, 37, 'Maria Antonieta', '456456454', '2022-04-22 22:10:41', '2022-04-22 22:10:41'),
(26, 43, 'João Victor Morgado Viana', '0000000000', '2022-04-23 02:20:20', '2022-04-23 02:20:20'),
(29, 46, 'André Belle ', '8312746231', '2022-04-23 02:33:10', '2022-04-23 02:33:10'),
(30, 47, 'teste', '12345678909', '2022-05-21 01:39:11', '2022-05-21 01:39:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `recado` varchar(16) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `cliente_id`, `telefone`, `recado`, `email`) VALUES
(1, 5, '(99) 9999-9999', '(99) 9999-9999', 'maria.silva@gmail.com'),
(2, 6, '', '', ''),
(15, 19, '312879312', '3782317989', 'heloisa@gmail.com'),
(16, 20, '(61) 998561381', '(61) 998561381', 'maria.antonieta@gmail.com'),
(22, 26, '998561381', '998561381', 'joaovictor9238@gmail.com'),
(25, 29, '124125135', '3124234123123', 'andre@gmail.com'),
(26, 30, '3192731012', '7831297391', 'teste@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` int(5) DEFAULT NULL,
  `bairro` varchar(245) DEFAULT NULL,
  `cidade` varchar(255) NOT NULL,
  `cep` varchar(12) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cliente_id`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `uf`, `created_at`, `updated_at`) VALUES
(7, 5, 'QNE 10', 21, 'Taguatinga Norte (Taguatinga)', 'BrasÃ­lia', '72125-100', 'DF', '2022-04-02 01:01:46', '2022-04-02 01:01:46'),
(8, 6, '', NULL, NULL, '', '', '', '2022-04-02 01:53:59', '2022-04-02 01:53:59'),
(21, 19, 'dhf 213 hdhaf ', NULL, NULL, 'Baúru', '82378129', 'sp', '2022-04-02 02:31:57', '2022-04-02 02:31:57'),
(22, 20, 'qne 132099 ', NULL, NULL, 'fasdofjaj', '72125-199', 'DF', '2022-04-22 22:10:41', '2022-04-22 22:10:41'),
(28, 26, '21', NULL, 'Taguatinga Norte (Taguatinga)', 'Brasília', '72125300', 'DF', '2022-04-23 02:20:20', '2022-04-23 02:20:20'),
(31, 29, 'QNE 30', 21, 'Taguatinga Norte (Taguatinga)', 'Brasília', '72125300', 'DF', '2022-04-23 02:33:10', '2022-04-23 02:33:10'),
(32, 30, 'QNE 20', 21, 'Taguatinga Norte (Taguatinga)', 'Brasília', '72125-200', 'DF', '2022-05-21 01:39:11', '2022-05-21 01:39:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `is_admin`, `usuario`, `senha`) VALUES
(1, 0, 'junior', '12345'),
(2, 1, 'joao', '202cb962ac59075b964b07152d234b70'),
(3, 0, 'joao1', '202cb962ac59075b964b07152d234b70'),
(4, 0, 'cristiano', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 0, 'junior2', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 0, 'junior3', '289dff07669d7a23de0ef88d2f7129e7'),
(7, 0, 'junior4', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 0, 'junior5', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 0, 'king', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 0, 'carlos', 'eda65f6d1dd1e477421794dd014ad680'),
(11, 1, 'jose', '202cb962ac59075b964b07152d234b70'),
(22, 0, 'maria', '202cb962ac59075b964b07152d234b70'),
(23, 0, '', 'd41d8cd98f00b204e9800998ecf8427e'),
(36, 0, 'Heloisa', 'e10adc3949ba59abbe56e057f20f883e'),
(37, 0, 'maria.antonieta', '202cb962ac59075b964b07152d234b70'),
(43, 0, 'joao9820', '202cb962ac59075b964b07152d234b70'),
(46, 0, 'andre', '202cb962ac59075b964b07152d234b70'),
(47, 0, 'teste', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `codigo_rastreamento` varchar(250) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 3,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `codigo_rastreamento`, `cliente_id`, `status_id`, `created_at`, `updated_at`) VALUES
(21, 'JM6290eb463aBR', 5, 3, '2022-05-27 15:16:22', '2022-05-27 15:16:22'),
(22, 'JM629109572eBR', 5, 2, '2022-05-27 17:24:39', '2022-05-27 17:24:39'),
(23, 'JM6291a4651aBR', 30, 3, '2022-05-28 04:26:13', '2022-05-28 04:26:13'),
(24, 'JM6291adefd2BR', 30, 1, '2022-05-28 05:06:55', '2022-05-28 05:06:55'),
(25, 'JM6291b32900BR', 5, 2, '2022-05-28 05:29:13', '2022-05-28 05:29:13'),
(26, 'JM6291b39b90BR', 5, 1, '2022-05-28 05:31:07', '2022-05-28 05:31:07'),
(27, 'JM6291b3bbe3BR', 30, 1, '2022-05-28 05:31:39', '2022-05-28 05:31:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produtos`
--

CREATE TABLE `pedido_produtos` (
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `tamanho` enum('P','M','G','GG') NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido_produtos`
--

INSERT INTO `pedido_produtos` (`pedido_id`, `produto_id`, `tamanho`, `quantidade`) VALUES
(6, 1, 'P', 3),
(6, 3, 'P', 1),
(6, 2, 'P', 1),
(6, 1, 'P', 1),
(6, 4, 'G', 3),
(6, 1, 'P', 2),
(7, 3, 'P', 1),
(7, 2, 'P', 1),
(7, 1, 'P', 1),
(8, 1, 'P', 1),
(9, 10, 'P', 3),
(10, 10, 'P', 3),
(11, 1, 'P', 3),
(11, 9, 'P', 5),
(12, 10, 'P', 2),
(13, 17, 'P', 3),
(13, 10, 'P', 9),
(14, 3, 'P', 6),
(14, 17, 'P', 1),
(15, 1, 'P', 1),
(16, 9, 'P', 1),
(17, 1, 'P', 1),
(18, 10, 'P', 1),
(19, 1, 'P', 1),
(20, 1, 'P', 1),
(20, 24, 'P', 1),
(21, 2, 'P', 1),
(21, 3, 'P', 1),
(21, 4, 'P', 1),
(21, 1, 'P', 1),
(21, 2, 'GG', 1),
(22, 1, 'M', 4),
(22, 24, 'P', 4),
(23, 1, 'P', 4),
(23, 4, 'P', 1),
(24, 17, 'P', 4),
(24, 24, 'P', 1),
(25, 17, 'P', 4),
(26, 24, 'P', 1),
(26, 3, 'P', 2),
(27, 2, 'P', 4);

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
(9, 2, 'Camisa Man. City', NULL, 'Jogador nº 9', NULL, NULL, '248.99', 'mancity-hk-1819-516x680-2-.png', '2022-03-17 23:27:23', '2022-03-17 23:27:23'),
(10, 2, 'Camisa Liverpool', NULL, 'Clássico', NULL, NULL, '248.99', 'myQlQcXp.png', '2022-03-17 23:16:11', '2022-03-17 23:16:11'),
(13, NULL, 'Flamengo', NULL, 'FLA-2021', 'VERMELHO', NULL, '0.00', NULL, '2022-03-19 01:54:22', '2022-03-19 01:54:22'),
(16, NULL, 'Corinthians', NULL, 'corinthians-2021', 'branca', NULL, '350.25', NULL, '2022-03-19 01:56:21', '2022-03-19 01:56:21'),
(17, 1, 'Sao Paulo', NULL, '2021', 'Branca', NULL, '250.00', 'camisa-sao-paulo.jpg', '2022-03-19 02:38:17', '2022-03-19 02:38:17'),
(24, 2, 'Flamengo', NULL, 'fds2', 'vermelha', NULL, '355.00', 'Camisa-Boca-Junior.jpg', '2022-04-22 23:42:24', '2022-04-22 23:42:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cor_bs` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `nome`, `cor_bs`, `created_at`) VALUES
(1, 'Aguardando Pagamento', 'secondary', '2022-05-12 23:49:15'),
(2, 'Pagamento aprovado', 'primary', '2022-05-12 23:49:15'),
(3, 'Preparando Entrega', 'warning', '2022-05-12 23:49:15'),
(4, 'Pedido Entregue', 'success', '2022-05-12 23:49:15'),
(5, 'Pedido Cancelado', 'danger', '2022-05-20 01:27:56');

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
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jmsoccer_cpf` (`cpf`),
  ADD KEY `clientes_login_id_fk` (`login_id`);

--
-- Índices para tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contatos_cliente_id_fk` (`cliente_id`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `endereco_cliente_id_fk` (`cliente_id`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_cliente_fk` (`cliente_id`),
  ADD KEY `pedidos_status_fk` (`status_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produtos_cat_camiseta_id` (`cat_camiseta_id`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_login_id_fk` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`);

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `contatos_cliente_id_fk` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_cliente_id_fk` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_cliente_fk` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `pedidos_status_fk` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_cat_camiseta_id` FOREIGN KEY (`cat_camiseta_id`) REFERENCES `cat_camisetas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
