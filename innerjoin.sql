-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Set-2019 às 21:54
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `innerjoin`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `cargo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salario` float NOT NULL DEFAULT 1000
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `cargo`, `salario`) VALUES
(1, 'administrador', 7000),
(2, 'gerente', 2000),
(3, 'estagiario', 900),
(4, 'Coordenador De Ti', 2500),
(9, 'tÃ©cnico em informÃ¡tica', 2000),
(12, 'tÃ©cnico em redes', 2000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `funcao` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `funcao`, `email`, `senha`, `created`, `modified`) VALUES
(1, 'Christian', 3, 'christian@gmail.com', '', '2019-08-31 16:50:07', NULL),
(2, 'Gesser', 1, 'gesser@gmail.com', '$2y$10$to.l31VBBRye8.KbK.5FR.4KVlJS1/NcOjVpBu6PoYEJEZTbJOBEy', '2019-08-31 16:50:07', NULL),
(4, 'Olegario', 4, 'olegarioifce@gmail.com', 'olestarkifce', '2019-08-31 17:31:12', NULL),
(5, 'maelsom', 4, 'maelsim@gmail.com', 'émorta', '2019-08-31 17:32:49', NULL),
(6, 'marcos', 3, 'marquinplays@gmail.com', 'biancaAmor', '2019-08-31 22:03:55', NULL),
(7, 'welsey', 2, 'ws@gmail.com', 'proteinaNaVeia', '2019-08-31 22:06:00', NULL),
(8, 'Mariana', 3, 'mary@gmail.com', 'doraAventureira', '2019-08-31 22:10:56', NULL),
(9, 'vitoria', 3, 'vitoria@gmail.com', '$2y$10$Pdw0MfoyK/1q3ZLL9JwL3uSaoCfYFU5G84X.iWljBtZJqh6pgupH.', '2019-08-31 22:11:42', NULL),
(10, 'Caio', 4, 'caio@gmail.com', 'bel', '2019-08-31 22:13:39', NULL),
(31, 'herbesom', 5, 'hbs@gmail.com', '$2y$10$PjNv8Rlqf4SyPyAXePoy..ol7kXG2T58d61qH7qQyL6jhCpvMXdjG', '2019-08-31 23:00:05', NULL),
(33, 'christian', 9, 'christianferreira652@gmail.com', '$2y$10$tvdZu2I3zq/Hbq2Pl0uxvOIgXdX3yG60/VHIKPAnIDntSnbBLRbNG', '2019-09-01 16:08:51', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
