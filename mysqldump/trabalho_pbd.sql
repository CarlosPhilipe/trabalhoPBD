-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 23-Fev-2017 às 04:25
-- Versão do servidor: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `trabalho_pbd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tipo` int(11) NOT NULL COMMENT '0 ambas/ 1 receita/ 2 despesa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `tipo`) VALUES
(1, 'Transporte', 0),
(2, 'Alimentação', 0),
(3, 'Educação', 1),
(4, 'Saúde', 1),
(5, 'Viagem', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `id` int(11) NOT NULL,
  `data_vencimento` date DEFAULT NULL,
  `valor` double NOT NULL,
  `descricao` text,
  `data_cadastro` datetime DEFAULT NULL,
  `info_adicional` varchar(45) DEFAULT NULL,
  `situacao_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL COMMENT '0 despesa  | 1 receita\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id`, `data_vencimento`, `valor`, `descricao`, `data_cadastro`, `info_adicional`, `situacao_id`, `user_id`, `categoria_id`, `tipo`) VALUES
(1, '2017-02-23', 122.22, '', '2017-02-23 03:56:00', 'curso inglés', 2, 1, 3, 0),
(2, NULL, 100, '', '2017-02-23 03:57:00', ',sjdna', 3, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tipo` int(11) NOT NULL COMMENT '0 ambas/ 1 receita/ 2 despesa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`id`, `nome`, `tipo`) VALUES
(1, 'Cadastrado', 0),
(2, 'Pago', 2),
(3, 'Recebido', 1),
(4, 'vencido', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `auth_key` varchar(45) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `role` char(3) DEFAULT NULL,
  `status` char(3) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `data_nasc` varchar(45) DEFAULT NULL,
  `url_img_perfil` varchar(45) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `nome`, `auth_key`, `password_hash`, `password_reset_token`, `role`, `status`, `created_at`, `updated_at`, `email`, `data_nasc`, `url_img_perfil`, `categoria`) VALUES
(1, 'carlosphbahia', NULL, 'V_YE6AUTLEl-EDyv0r7A0nTYfqXtJSO8', '$2y$13$RnpcZWQ0l3JG2iperEKu..a4coXhdgdsqVtsD4Uv4HGbJ9AO4ocTa', NULL, NULL, '10', '1487818229', '1487818229', 'carlosphbahia@gmail.com', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_despesa_situacao_idx` (`situacao_id`),
  ADD KEY `fk_despesa_user1_idx` (`user_id`),
  ADD KEY `fk_despesa_categoria1_idx` (`categoria_id`);

--
-- Indexes for table `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `fk_despesa_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_despesa_situacao` FOREIGN KEY (`situacao_id`) REFERENCES `situacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_despesa_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
