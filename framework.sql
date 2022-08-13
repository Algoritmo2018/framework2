-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 13-Ago-2022 às 20:28
-- Versão do servidor: 10.4.16-MariaDB
-- versão do PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `framework`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `usuario_id`, `titulo`, `texto`, `criado_em`) VALUES
(32, 28, 'O que é ser filosofo?', 'Ser filosofo é ser alguém questionar com o objectivo de encontrar a verdade.', '2022-09-05 04:31:23'),
(37, 28, 'Angola', 'é um país', '2022-06-23 06:09:04'),
(38, 39, 'Um dos melhore jogadores do mundo:', 'Sergio Ramos', '2020-04-01 17:59:03'),
(39, 39, 'Artista Valete', 'Nome da música Homo Libero', '2020-04-01 17:59:56'),
(40, 26, 'Ludmila Da silva', 'Mulher do Antonio Carter', '2020-04-01 18:08:10'),
(41, 28, 'Um dos melhores jogadores do mundo:', 'Dordo', '2020-04-01 18:41:06'),
(43, 29, 'Trabalhando', 'Via remoto', '2020-04-01 17:34:30'),
(44, 29, 'O que é o sfrimento?', 'Sofrimento é...', '2020-04-01 18:12:55'),
(52, 28, 'Projectos futuros', '1-Loja virtual', '2022-08-12 15:20:54'),
(54, 43, 'JOker', 'Meu Aliado', '2022-08-13 18:26:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `biografia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `criado_em`, `biografia`) VALUES
(26, 'Antonio Carter', 'antoniocarter@gmail.com', '$2y$10$FbClkMnw8pbUD/TUyrkmFePmoKeqqlp1PBtiXEDjfnOhLWGsXjDFS', '2020-04-01 19:02:51', ''),
(28, 'Luis Chilembo Mateus', 'admin@gmail.com', '$2y$10$5cnEBLqxqG9Sf/HHEEVQ1.eeQIlFpe5aqDTi2aSin6hy1fShMEVKK', '2020-04-01 18:04:20', 'Eu sou Programador'),
(29, 'Domingos Braganha', 'db@gmail.com', '$2y$10$oolMo7WERARzZvu6vJJcFuEmbDHaXKaEam7Yf3KXbZVnKSKQr0nJC', '2020-04-01 18:03:26', 'Programador fullstack'),
(30, 'Maria Mateus', 'mariamateus@gmail.com', '$2y$10$xaxGaEt7vAub/tc/0.RQFuUMUU9wetLCWQUCPdkgL56k4PYWf4ika', '2020-04-01 18:18:06', ''),
(31, 'Ludmila', 'Ludmila@gmail.com', '$2y$10$hgCEdnjYfXFSkMONGL3MoeSa/cXWomRW099lQQVoeD2VtycV5bm7i', '2020-04-01 18:20:32', ''),
(32, 'Sofar', 'sofar@gmail.com', '$2y$10$Skf70/qaY7SzheqQu3zyY.hYFsayJoROsL81vmwhbk7J8CQ9UwDH2', '2020-04-01 18:21:39', ''),
(33, 'star', 'star@gmail.com', '$2y$10$2qczBy7QMYoyHM.AhGhxOuDCU1smfcOkn0MM1ur0.Qllc4KrBwvCi', '2020-04-01 18:57:17', ''),
(34, 'Carmélia', 'carmelia@gmail.com', '$2y$10$gcG5lydhmfV8iiL7jwypzOnsH1STzBYsxD1CoY/7HNSks66.fVmfu', '2020-04-01 18:57:57', ''),
(35, 'Odeth', 'odeth@gmail.com', '$2y$10$vuamahe2Y6VF.5Y0MW/.kOCHnkkRqtdLI/oTFN/GmZLn1Ycv/drXC', '2020-04-01 19:14:22', ''),
(36, 'Eli', 'eli@gmail.com', '$2y$10$Z4SoG.joKKRY/fA9SO7Xtu224doCkdq5I2Bk1PnjHrUhchTolQ0uC', '2020-04-01 19:15:43', ''),
(37, 'Miimi', 'mimi@gmail.com', '$2y$10$FjdSTf7BSEa/trU2jtmQ5OZ/sbXa8hV8Cqfoe86PFBVWsYxIV2emC', '2020-04-01 19:17:54', ''),
(38, 'Edy', 'edy@gmail.com', '$2y$10$ozuKm953BHJ7FUac8J0nKu.wRXXSuf3pRowvWbtv2T3EEVc8xowo6', '2020-04-01 19:19:52', ''),
(39, 'Job Mateus', 'job@gmail.com', '$2y$10$jRc4PunuE8KXi/Eua1wCk.LuXL74/fDmtPFCBVMjK7BOeC4hErgTy', '2020-04-01 17:36:04', ''),
(40, 'Kali', 'kali@gmail.com', '$2y$10$vBw7QnrpHGZXCKXMkMsX3.HtAC3h3EbIa6zALU2xh8BNyvntTdvoW', '2020-04-01 18:12:22', ''),
(42, 'Kadafe', 'kadafe@gmail.com', '$2y$10$0qAIKgliOTU7nhZ5BePxc.BpYK2wypODxZMkKpTJMT3MIP0RRy5Bu', '2020-04-01 20:24:08', 'Eu souo nkadafe'),
(43, 'Kaido', 'kaido@gmail.com', '$2y$10$9wkn.YYF0f1Vd/OfddDK..w8PhYwYcfnED8YKRAwWiBuM5X9WB5vy', '2022-08-13 18:25:05', 'A criatura mais forte no universo One Piece');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
