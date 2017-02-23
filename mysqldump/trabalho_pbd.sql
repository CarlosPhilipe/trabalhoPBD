-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 23-Fev-2017 às 04:13
-- Versão do servidor: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `trabalho_pbd`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_despesa_situacao_idx` (`situacao_id`),
  ADD KEY `fk_despesa_user1_idx` (`user_id`),
  ADD KEY `fk_despesa_categoria1_idx` (`categoria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
