-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Dez-2020 às 16:09
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nacionalidade` varchar(20) DEFAULT NULL,
  `data_nascimento` datetime DEFAULT NULL,
  `fotografia` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autores`
--

INSERT INTO `autores` (`id_autor`, `nome`, `nacionalidade`, `data_nascimento`, `fotografia`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Luis Borges Gouveia', 'Portugê', NULL, NULL, NULL, '2020-11-27 16:45:52', NULL),
(2, 'João Ranito', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(3, 'Nuno Magalhães Ribeiro', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(4, 'Paulo Rurato', 'Português', NULL, NULL, NULL, NULL, NULL),
(5, 'Sofia Gaio', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(6, 'Rui Moreira', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(7, 'Margarida Bairrão', 'Português', NULL, NULL, NULL, NULL, NULL),
(8, 'Judite Gonçalves de Freitas', 'Português', NULL, NULL, NULL, NULL, NULL),
(9, 'António Borges Regedor', 'Português', NULL, NULL, NULL, NULL, NULL),
(10, 'José Dias Coelho', 'Português', NULL, NULL, NULL, NULL, NULL),
(11, 'Paula Moura', 'Português', NULL, NULL, NULL, NULL, NULL),
(12, 'Luis Cunha', 'Português', NULL, NULL, NULL, NULL, NULL),
(13, 'Pereira Alfredo', 'Angolano', NULL, NULL, NULL, NULL, NULL),
(14, 'Luis', NULL, NULL, NULL, '2020-11-26 15:11:21', '2020-11-26 15:11:21', NULL),
(15, 'Luis', 'Portugues', NULL, NULL, '2020-11-26 15:12:00', '2020-11-26 15:12:00', NULL),
(16, 'Luis', 'Portugues', NULL, NULL, '2020-11-26 15:12:11', '2020-11-26 15:12:11', NULL),
(19, 'Luis', 'Angolano', '2000-01-12 00:00:00', NULL, '2020-12-04 15:05:13', '2020-12-04 15:05:13', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores_livros`
--

CREATE TABLE `autores_livros` (
  `id_al` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autores_livros`
--

INSERT INTO `autores_livros` (`id_al`, `id_autor`, `id_livro`, `updated_at`, `created_at`) VALUES
(1, 1, 1, NULL, NULL),
(3, 3, 24, '2020-12-04 15:15:43', '2020-12-04 15:15:43'),
(4, 4, 24, '2020-12-04 15:16:32', '2020-12-04 15:16:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `edicoes`
--

CREATE TABLE `edicoes` (
  `id_livro` int(11) NOT NULL,
  `id_editora` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `edicoes`
--

INSERT INTO `edicoes` (`id_livro`, `id_editora`, `data`, `observacoes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, '2020-12-04 16:54:01', '2020-12-04 16:54:01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editoras`
--

CREATE TABLE `editoras` (
  `id_editora` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `morada` varchar(255) DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `editoras`
--

INSERT INTO `editoras` (`id_editora`, `nome`, `morada`, `observacoes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SPI-Principi', NULL, NULL, NULL, '2020-11-27 16:38:37', NULL),
(2, 'Edições Universidade Fernando Pessoa', '', NULL, NULL, NULL, NULL),
(3, 'Edições GestKnowing', '', NULL, NULL, NULL, NULL),
(4, 'VDM - Verlag Dr. Muller', '', NULL, NULL, NULL, NULL),
(5, 'Sílabo', '', NULL, NULL, NULL, NULL),
(6, 'Green Lines Instituto', '', NULL, NULL, NULL, NULL),
(7, 'Lambert Academic Publishing', '', NULL, NULL, NULL, NULL),
(8, 'Kwigia editora', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `designacao` varchar(30) NOT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`id_genero`, `designacao`, `observacoes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Memórias e Testemunhos', NULL, NULL, '2020-11-27 16:48:20', NULL),
(2, 'Direito Civil ', NULL, NULL, NULL, NULL),
(3, 'Culinária', NULL, NULL, NULL, NULL),
(4, 'Romance', NULL, NULL, NULL, NULL),
(5, 'Policial e Thriller', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `idioma` varchar(10) NOT NULL,
  `total_paginas` int(11) DEFAULT NULL,
  `data_edicao` datetime DEFAULT NULL,
  `isbn` varchar(13) DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `imagem_capa` varchar(255) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `sinopse` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `titulo`, `idioma`, `total_paginas`, `data_edicao`, `isbn`, `observacoes`, `imagem_capa`, `id_genero`, `id_autor`, `sinopse`, `created_at`, `updated_at`, `deleted_at`, `id_user`) VALUES
(2, 'cidades e regiões digitais:impacte na cidade e nas pessoas', 'Portugês', NULL, NULL, '9728830033111', NULL, NULL, 2, 1, NULL, NULL, '2020-12-03 15:12:12', NULL, 0),
(3, 'Informatica e Competencias Tecnologicas para a Sociedade da Informação', 'Portugês', NULL, NULL, '9789728830304', NULL, NULL, 1, 3, NULL, NULL, NULL, NULL, 0),
(4, 'Readings in Information Society', 'Inglês', NULL, NULL, '9789727228997', NULL, NULL, 3, 5, NULL, NULL, NULL, NULL, 0),
(5, 'Sociedade da Informação: balanço e implicações ', 'Português', NULL, NULL, '9789728830182', NULL, NULL, 3, 7, NULL, NULL, NULL, NULL, 0),
(6, 'O Tribunal de Contas e as Autarquias Locais', 'Portugês', NULL, NULL, '9789899936614', NULL, NULL, 2, 7, NULL, NULL, NULL, NULL, 0),
(7, 'Informática e Competências Tecnológicas para a Sociedade da Informação 2ed', 'Português', NULL, NULL, '9789728830304', NULL, NULL, 2, 8, NULL, NULL, NULL, NULL, 0),
(8, 'Negócio Eletrónico - conceitos e perspetivas de desenvolvimento', 'Português', NULL, NULL, '9789899552258', NULL, NULL, 1, 8, NULL, NULL, NULL, NULL, 0),
(9, 'Gestão da Informação na Biblioteca Escolar', 'Português', NULL, NULL, '9789722314916', NULL, NULL, 1, 9, NULL, NULL, NULL, NULL, 0),
(10, 'A virtual environment to share knowledge', 'Inglês', NULL, NULL, '9781351729901', NULL, NULL, 2, 4, NULL, NULL, NULL, NULL, 0),
(11, 'Ciência da Informação: contributos para o seu estudo', 'Português', NULL, NULL, '9789896430900', NULL, NULL, 1, 4, NULL, NULL, NULL, NULL, 0),
(12, 'Repensar a Sociedade da Informação e do Conhecimento no Início do Século XXI', 'Português', NULL, NULL, '9789726186953', NULL, NULL, 3, 4, NULL, NULL, NULL, NULL, 0),
(13, 'Gestão da Informação em Museus: uma contribuição para o seu estudo', 'Português', NULL, NULL, '9789899901394', NULL, NULL, 2, 4, NULL, NULL, NULL, NULL, 0),
(14, 'Web 2.0 and Higher Education. A psychological perspective', 'Inglês', NULL, NULL, '9783659683466', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 0),
(15, 'Contribuições para a discussão de um modelo de Governo Eletrónico Local para Angola', 'Português', NULL, NULL, '9789899933200', NULL, NULL, 1, 13, NULL, NULL, NULL, NULL, 0),
(16, 'sistema', 'portugues', NULL, NULL, '1234567781011', NULL, NULL, NULL, NULL, NULL, '2020-11-26 13:52:20', '2020-11-26 13:52:20', NULL, 0),
(17, 'sistema', 'redes', 1, NULL, '1234567781011', NULL, NULL, NULL, NULL, NULL, '2020-11-26 14:15:09', '2020-11-26 14:15:09', NULL, 0),
(24, 'Alerta', 'ingles', 11, NULL, '1234567781011', NULL, NULL, 2, NULL, NULL, '2020-12-04 15:08:55', '2020-12-04 15:08:55', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tiago', 'tiagofilipegoncalves.tc@gmail.com', NULL, '$2y$10$8lVaq6k/tuUiKdnuj1G4DeiZNKp0RqRzahc/j3rWUg1cio6sd4Mdu', NULL, '2020-12-10 13:56:50', '2020-12-10 13:56:50');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Índices para tabela `autores_livros`
--
ALTER TABLE `autores_livros`
  ADD PRIMARY KEY (`id_al`);

--
-- Índices para tabela `edicoes`
--
ALTER TABLE `edicoes`
  ADD PRIMARY KEY (`id_livro`,`id_editora`);

--
-- Índices para tabela `editoras`
--
ALTER TABLE `editoras`
  ADD PRIMARY KEY (`id_editora`);

--
-- Índices para tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `autores_livros`
--
ALTER TABLE `autores_livros`
  MODIFY `id_al` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `editoras`
--
ALTER TABLE `editoras`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
