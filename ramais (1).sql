-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Jun-2022 às 05:48
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ramais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `callcenter`
--

CREATE TABLE `callcenter` (
  `id` int(11) NOT NULL,
  `statusRamal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `callcenter`
--

INSERT INTO `callcenter` (`id`, `statusRamal`) VALUES
(1, 'chamando'),
(2, 'ocupado'),
(3, 'disponivel'),
(4, 'indisponivel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ramal`
--

CREATE TABLE `ramal` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `ip` int(11) NOT NULL,
  `statusRamalId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ramal`
--

INSERT INTO `ramal` (`id`, `numero`, `nome`, `ip`, `statusRamalId`, `userId`) VALUES
(6, 7000, '7000', 1812191257, 1, 1),
(7, 7001, '7001', 1812191257, 2, 2),
(8, 7004, '7002', 0, 3, 3),
(9, 7003, '7003', 0, 4, 4),
(11, 7002, '7004', 1812191257, 4, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`) VALUES
(1, 'Chaves'),
(2, 'Kiko'),
(3, 'Godines'),
(4, 'Nhonho'),
(5, 'Chiquinha');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `callcenter`
--
ALTER TABLE `callcenter`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ramal`
--
ALTER TABLE `ramal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ramal_FK` (`statusRamalId`),
  ADD KEY `ramal_FK_1` (`userId`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `callcenter`
--
ALTER TABLE `callcenter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `ramal`
--
ALTER TABLE `ramal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `ramal`
--
ALTER TABLE `ramal`
  ADD CONSTRAINT `ramal_FK` FOREIGN KEY (`statusRamalId`) REFERENCES `callcenter` (`id`),
  ADD CONSTRAINT `ramal_FK_1` FOREIGN KEY (`userId`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
