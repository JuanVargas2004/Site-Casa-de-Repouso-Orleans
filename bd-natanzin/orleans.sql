-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/11/2024 às 23:25
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `orleans`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `cod_pessoa` int(11) NOT NULL,
  `sit` int(1) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `senha` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoas`
--

INSERT INTO `pessoas` (`cod_pessoa`, `sit`, `nome`, `email`, `data_nascimento`, `senha`) VALUES
(17, 0, 'da', 'dadd@gmail.com', '2003-12-05', 'dadd@gmail.com'),
(18, 0, 'da', 'dadd@gmail.com', '2003-12-05', 'dadd@gmail.com'),
(20, 0, 'Natan ', 'socafofo@gmail.com', '2001-12-12', '123456'),
(23, 0, 'test', 'teste@gmail.com', '1111-11-11', '1234'),
(24, 0, 'Porra', 'agoravai@gmail.com', '1202-05-06', '4321'),
(25, 0, 'Natan ', 'nr020@gmail.com', '2003-12-05', '123456'),
(26, 0, 'Rodo', 'rod@gmail.com', '0000-00-00', '22'),
(27, 0, 'Kaua travesti passivo', 'kaua-vevequinho69@outlook.com', '1400-07-30', '696969'),
(28, 1, 'Natan', 'nr0207755@gmail.com', '1111-01-01', '$2y$10$xIM.0Xh7HuEWd1FbkwF1rOwSz6V6ptxoQJJ8P48kxaovKolUVAHP.'),
(29, 1, 'Paula tejano', 'paula@gmail.com', '2003-02-12', '$2y$10$YfcouZ1fsqebI3mrUC2Age5znT8HvxEUw5GdFe4Buj0EjMbC7lEY6');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`cod_pessoa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `cod_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
