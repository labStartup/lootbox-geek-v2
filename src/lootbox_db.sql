-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jul-2025 às 23:47
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lootbox_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'ROUPA'),
(2, 'CANECA'),
(3, 'ACTION FIGURE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `categoria_id` int(11) DEFAULT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `imagem`, `ativo`, `categoria_id`, `quantidade`) VALUES
(1, 'Pac Man', 79.90, 'img/_produtos/camisa_pacman.png', 1, 1, 10),
(2, 'Game Never Stop', 89.90, 'img/_produtos/camisa_game_never_stop.png', 1, 1, 23),
(3, 'Game Over', 69.90, 'img/_produtos/camisa_game-over.png', 1, 1, 10),
(4, 'Casaco Gamer', 149.90, 'img/_produtos/casaco_gamer.png', 1, 1, 18),
(5, 'Akatsuki', 59.90, 'img/_produtos/caneca-akatsuki.png', 1, 2, 16),
(6, 'Mini Game', 34.90, 'img/_produtos/caneca-game.png', 1, 2, 30),
(7, 'R2D2', 60.00, 'img/_produtos/caneca-r2d2.png', 1, 2, 13),
(8, 'Kakaroto', 85.90, 'img/_produtos/caneca-goku.png', 1, 2, 14),
(9, 'Garota de Programa', 70.00, 'img/_produtos/caneca-garota_de_programa.png', 1, 2, 19),
(10, 'Game of Thrones', 95.00, 'img/_produtos/caneca-got.png', 1, 2, 28),
(11, 'HTML', 54.99, 'img/_produtos/caneca-html.png', 1, 2, 3),
(12, 'Café Medicamentoso', 50.00, 'img/_produtos/caneca-medicamentosa.png', 1, 2, 17),
(13, 'Que Fase!', 50.00, 'img/_produtos/caneca-que_fase.png', 1, 2, 11),
(14, 'Café Pilhado', 58.49, 'img/_produtos/caneca-pilha.png', 1, 2, 22),
(15, 'JAVA Coffee', 75.00, 'img/_produtos/caneca-java.png', 1, 2, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
