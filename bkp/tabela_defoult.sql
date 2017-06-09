-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Jun-2017 às 02:32
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_defoult`
--

CREATE TABLE `tabela_defoult` (
  `nome_imagem` varchar(264) COLLATE utf8_bin DEFAULT '',
  `fonetica` varchar(264) COLLATE utf8_bin DEFAULT '',
  `categoria` varchar(264) COLLATE utf8_bin DEFAULT '',
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tabela_defoult`
--

INSERT INTO `tabela_defoult` (`nome_imagem`, `fonetica`, `categoria`, `id`) VALUES
('1.jpg', 'suricato', 'Animal', 1),
('2.jpg', 'cachorro', 'Animal', 2),
('3.jpg', 'castor', 'Animal', 3),
('4.jpg', 'burro', 'Animal', 4),
('5.jpg', 'caracol', 'Animal', 5),
('6.jpg', 'urso', 'Animal', 6),
('7.jpg', 'passaro', 'Animal', 7),
('8.jpg', 'ovelha', 'Animal', 8),
('9.jpg', 'esquilo', 'Animal', 9),
('10.jpg', 'sapo', 'Animal', 10),
('11.jpg', '', 'comida', 11),
('12.jpg', '', 'bebida', 12),
('13.jog', '', 'doeanc', 13),
('14.jpg', '', 'geral', 14),
('15.jpg', '', 'sentimento', 15),
('16.jpg', '', 'cores', 16),
('17.jog', '', 'formas', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabela_defoult`
--
ALTER TABLE `tabela_defoult`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabela_defoult`
--
ALTER TABLE `tabela_defoult`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
