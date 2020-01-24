-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Jan-2020 às 23:39
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `feriados`
--

CREATE TABLE `feriados` (
  `id` int(3) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `feriados`
--

INSERT INTO `feriados` (`id`, `name`, `day`) VALUES
(1, 'Dia de Ano Novo', '01-01-*'),
(2, 'Dia de Reis', '06-01-2020'),
(3, 'Sexta-Feira Santa', '10-04-2020'),
(5, 'Páscoa', '12-04-2020'),
(6, '25 de Abril', '25-04-*'),
(7, 'Dia do Trabalhador', '01-05-2020'),
(8, 'Dia de Portugal', '10-06-*'),
(9, 'Corpo de Deus', '11-06-2020'),
(10, 'Assunção de Nossa Senhora', '15-08-*'),
(11, 'Implantação da República', '05-9-*'),
(12, 'Dia de Todos os Santos', '01-11-*'),
(13, 'Restauração da Independência', '01-12-*'),
(14, 'Natal', '25-12-*');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ferias`
--

CREATE TABLE `ferias` (
  `id` int(3) NOT NULL,
  `userId` int(3) NOT NULL,
  `from` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ferias`
--

INSERT INTO `ferias` (`id`, `userId`, `from`, `to`, `days`, `status`) VALUES
(44, 12, '15/01/2020', '17/01/2020', 3, 'aproved'),
(45, 12, '24/01/2020', '24/01/2020', 1, 'aproved'),
(46, 12, '17/01/2020', '22/01/2020', 4, 'aproved'),
(47, 12, '14/01/2020', '16/01/2020', 2, 'aproved'),
(48, 12, '20/01/2020', '24/01/2020', 2, 'pending'),
(49, 12, '03/02/2020', '07/02/2020', 2, 'pending'),
(50, 12, '10/02/2020', '16/02/2020', 7, 'pending');

-- --------------------------------------------------------

--
-- Estrutura da tabela `messages`
--

CREATE TABLE `messages` (
  `id` int(3) NOT NULL,
  `senderId` int(3) NOT NULL,
  `destinationId` int(3) NOT NULL,
  `text` varchar(250) CHARACTER SET utf8 NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `jobTitle` varchar(40) CHARACTER SET utf8 DEFAULT 'Funcionario',
  `permissions` varchar(20) CHARACTER SET utf8 DEFAULT 'normal',
  `hDaysRemaining` int(3) DEFAULT 30,
  `workingDays` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '1,2,3,4,5',
  `status` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `phone`, `address`, `jobTitle`, `permissions`, `hDaysRemaining`, `workingDays`, `status`) VALUES
(11, 'admin', 'admin', 'admin', '', '', 'Administrador', 'admin', 30, '1,2,3,4,5,6,7', 'aproved'),
(12, 'teste', 'teste@teste.com', 'password', '', '', 'Funcionário', 'normal', 19, '1,2,3,4,5', 'aproved');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `feriados`
--
ALTER TABLE `feriados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ferias`
--
ALTER TABLE `ferias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Índices para tabela `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`senderId`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `feriados`
--
ALTER TABLE `feriados`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `ferias`
--
ALTER TABLE `ferias`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `ferias`
--
ALTER TABLE `ferias`
  ADD CONSTRAINT `ferias_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`senderId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
