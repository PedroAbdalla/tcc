-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Maio-2018 às 02:39
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_usuario_categoria`
--

CREATE TABLE `tabela_usuario_categoria` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `categoria` varchar(245) DEFAULT NULL,
  `img` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tabela_usuario_categoria`
--

INSERT INTO `tabela_usuario_categoria` (`id`, `id_usuario`, `categoria`, `img`) VALUES
(1, 1, 'cat 1', '1-cat-20180319165511000000-0.png'),
(2, 1, 'cat2', '1-cat-20180319165511000000-1.jpeg'),
(3, 1, 'cat 3', '1-cat-20180319165511000000-2.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_usuario_imagens`
--

CREATE TABLE `tabela_usuario_imagens` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `fonetica` varchar(245) DEFAULT NULL,
  `imagem` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tabela_usuario_imagens`
--

INSERT INTO `tabela_usuario_imagens` (`id`, `id_categoria`, `fonetica`, `imagem`) VALUES
(4, 1, 'burro', '4.jpg'),
(6, 1, 'urso', '6.jpg'),
(11, 2, '77777', '1-img-20180523015212000000.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(145) DEFAULT NULL,
  `senha` varchar(145) DEFAULT NULL,
  `nome` varchar(145) DEFAULT NULL,
  `permicao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`, `nome`, `permicao`) VALUES
(1, 'pedro', 'MTIzNDU=', 'Pedro Abdalla', 'a'),
(2, 'joao', 'NDMyMQ==', 'João da Silva 1', 'a'),
(3, 'maria', 'YWJjZA==', 'Maria Machado', 'a'),
(4, 'joana', 'YWJjZA==', 'Joana Arantes ', 'n'),
(5, ' romualdo', 'MTIzNDU=', 'Romualdo Monteiro', 'a'),
(6, 'romualdo ', 'MTIzNDU=', 'Romualdo Monteiro', 'a'),
(7, 'joaona', 'YWJjZDEyMzQ1', 'Joana Cordeiro ', 'n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabela_defoult`
--
ALTER TABLE `tabela_defoult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabela_usuario_categoria`
--
ALTER TABLE `tabela_usuario_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_usuario_idx` (`id_usuario`);

--
-- Indexes for table `tabela_usuario_imagens`
--
ALTER TABLE `tabela_usuario_imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria_fk_idx` (`id_categoria`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabela_defoult`
--
ALTER TABLE `tabela_defoult`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tabela_usuario_categoria`
--
ALTER TABLE `tabela_usuario_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tabela_usuario_imagens`
--
ALTER TABLE `tabela_usuario_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tabela_usuario_categoria`
--
ALTER TABLE `tabela_usuario_categoria`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tabela_usuario_imagens`
--
ALTER TABLE `tabela_usuario_imagens`
  ADD CONSTRAINT `id_categoria_fk` FOREIGN KEY (`id_categoria`) REFERENCES `tabela_usuario_categoria` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
