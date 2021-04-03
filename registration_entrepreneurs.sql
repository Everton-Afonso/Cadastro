-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Abr-2021 às 23:12
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `registration_entrepreneurs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `business_father`
--

CREATE TABLE `business_father` (
  `id_business_father` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `business_father`
--

INSERT INTO `business_father` (`id_business_father`, `name`) VALUES
(1, ''),
(2, 'Ana Tereza de A. Vasques'),
(3, 'Arthur Felipe R. Costa'),
(4, 'Brisa Silva Bracchi'),
(5, 'Diogo Fernandes de Souza'),
(6, 'Debora Kaynara Patricio da Silva'),
(7, 'Elivelton Costa da Silva'),
(8, 'Glaucia Adriana Dantas Pereira'),
(9, 'Genildson Alvez de Oliveira'),
(10, 'Isabele Acciolo P. Lima'),
(11, 'Gerdon Adler Ribeiro Mafra'),
(12, 'Ivausck Maria L. da Costa'),
(13, 'Gilberto Oliveira'),
(14, 'Joane Maria da Silva Carvalho'),
(15, 'Igor Jefferson do Nascimento'),
(16, 'Kalyne Ribeiro Dantas Q. de Vasconcelos'),
(17, 'Jhony Kleyton do Nascimento'),
(18, 'Marli Rodrigues Félix'),
(19, 'Ruy Arruda Cassiano'),
(20, 'Priscila Ramos de Melo'),
(21, 'Pedro Pederneiras'),
(22, 'José das Dores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_information`
--

CREATE TABLE `user_information` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `cell` varchar(15) NOT NULL,
  `state` varchar(2) NOT NULL,
  `city` varchar(30) NOT NULL,
  `joined_on` datetime NOT NULL,
  `business_father` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user_information`
--

INSERT INTO `user_information` (`id_user`, `full_name`, `cell`, `state`, `city`, `joined_on`, `business_father`) VALUES
(15, 'Beltrano Tomé', '(11) 11111-1111', 'AL', 'Água Branca', '2021-04-03 09:41:32', 2),
(16, 'Pedro Pederneiras', '(22) 22222-2222', 'MA', 'Açailândia', '2021-04-03 09:41:57', 2),
(17, 'José Das Dores ', '(15) 46666-6666', 'MS', 'Água Clara', '2021-04-03 09:44:45', 21),
(18, 'Zézinho Dos Codes', '(95) 86554-4444', 'MT', 'Acorizal', '2021-04-03 09:45:15', 2),
(19, 'Maria Recursiva ', '(88) 88888-8888', 'RJ', 'Angra dos Reis', '2021-04-03 09:46:25', 22),
(20, 'Everton', '(14) 53333-3333', 'BA', 'Abaíra', '2021-04-03 12:45:53', 13),
(21, 'Ana Tereza De A. Vasques', '(36) 98888-8888', 'MA', 'Açailândia', '2021-04-03 12:58:13', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `business_father`
--
ALTER TABLE `business_father`
  ADD PRIMARY KEY (`id_business_father`);

--
-- Índices para tabela `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_business_father` (`business_father`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `business_father`
--
ALTER TABLE `business_father`
  MODIFY `id_business_father` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `user_information`
--
ALTER TABLE `user_information`
  ADD CONSTRAINT `fk_business_father` FOREIGN KEY (`business_father`) REFERENCES `business_father` (`id_business_father`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
