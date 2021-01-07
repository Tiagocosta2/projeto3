-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Jan-2021 às 16:13
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livraria`
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
(5, 3, 2, '2020-12-10 15:16:10', '2020-12-10 15:16:10'),
(9, 2, 28, '2020-12-11 15:17:38', '2020-12-11 15:17:38'),
(10, 2, 29, '2020-12-11 15:41:52', '2020-12-11 15:41:52'),
(11, 2, 25, '2020-12-17 14:12:24', '2020-12-17 14:12:24');

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
(2, 2, NULL, NULL, '2020-12-04 16:54:01', '2020-12-04 16:54:01', NULL),
(28, 2, NULL, NULL, '2020-12-11 15:17:38', '2020-12-11 15:17:38', NULL),
(29, 3, NULL, NULL, '2020-12-11 15:41:52', '2020-12-11 15:41:52', NULL);

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
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `likes` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`id_like`, `id_livro`, `id_user`, `likes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, NULL, '2020-12-14 16:50:50', '2020-12-14 16:50:50', NULL),
(2, 2, 2, NULL, '2020-12-14 16:50:52', '2020-12-14 16:50:52', NULL),
(3, 2, 2, NULL, '2020-12-14 16:50:56', '2020-12-14 16:50:56', NULL),
(4, 2, 2, NULL, '2020-12-14 16:51:01', '2020-12-14 16:51:01', NULL),
(5, 2, 2, NULL, '2020-12-14 16:51:09', '2020-12-14 16:51:09', NULL),
(6, 2, 2, NULL, '2020-12-14 16:51:12', '2020-12-14 16:51:12', NULL),
(7, 2, 2, NULL, '2020-12-14 16:51:13', '2020-12-14 16:51:13', NULL),
(8, 2, 2, NULL, '2020-12-14 16:51:13', '2020-12-14 16:51:13', NULL),
(9, 2, 2, NULL, '2020-12-14 16:51:20', '2020-12-14 16:51:20', NULL),
(10, 2, 2, NULL, '2020-12-14 16:53:19', '2020-12-14 16:53:19', NULL),
(11, 2, 2, NULL, '2020-12-14 17:16:44', '2020-12-14 17:16:44', NULL),
(12, 2, 2, NULL, '2020-12-14 17:16:46', '2020-12-14 17:16:46', NULL),
(13, 2, 2, NULL, '2020-12-14 17:16:47', '2020-12-14 17:16:47', NULL),
(14, 2, 2, NULL, '2020-12-14 17:17:21', '2020-12-14 17:17:21', NULL),
(15, 2, 2, NULL, '2020-12-14 17:17:23', '2020-12-14 17:17:23', NULL),
(16, 2, 2, NULL, '2020-12-14 17:17:23', '2020-12-14 17:17:23', NULL),
(22, 2, 2, NULL, '2020-12-14 17:24:58', '2020-12-14 17:24:58', NULL),
(23, 2, 2, NULL, '2020-12-14 17:25:57', '2020-12-14 17:25:57', NULL),
(24, 2, 2, NULL, '2020-12-14 17:25:59', '2020-12-14 17:25:59', NULL),
(25, 25, 1, NULL, '2020-12-17 14:12:07', '2020-12-17 14:12:07', NULL),
(26, 30, 1, NULL, '2021-01-07 14:11:08', '2021-01-07 14:11:08', NULL);

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
  `id_user` int(11) NOT NULL,
  `excerto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `titulo`, `idioma`, `total_paginas`, `data_edicao`, `isbn`, `observacoes`, `imagem_capa`, `id_genero`, `id_autor`, `sinopse`, `created_at`, `updated_at`, `deleted_at`, `id_user`, `excerto`) VALUES
(2, 'cidades e regiões digitais:impacte na cidade e nas pessoas', 'Portugês', NULL, NULL, '9728830033111', NULL, NULL, 2, 1, NULL, NULL, '2020-12-03 15:12:12', NULL, 0, ''),
(3, 'Informatica e Competencias Tecnologicas para a Sociedade da Informação', 'Portugês', NULL, NULL, '9789728830304', NULL, NULL, 1, 3, NULL, NULL, NULL, NULL, 0, ''),
(4, 'Readings in Information Society', 'Inglês', NULL, NULL, '9789727228997', NULL, NULL, 3, 5, NULL, NULL, NULL, NULL, 0, ''),
(5, 'Sociedade da Informação: balanço e implicações ', 'Português', NULL, NULL, '9789728830182', NULL, NULL, 3, 7, NULL, NULL, NULL, NULL, 0, ''),
(6, 'O Tribunal de Contas e as Autarquias Locais', 'Portugês', NULL, NULL, '9789899936614', NULL, NULL, 2, 7, NULL, NULL, NULL, NULL, 0, ''),
(7, 'Informática e Competências Tecnológicas para a Sociedade da Informação 2ed', 'Português', NULL, NULL, '9789728830304', NULL, NULL, 2, 8, NULL, NULL, NULL, NULL, 0, ''),
(8, 'Negócio Eletrónico - conceitos e perspetivas de desenvolvimento', 'Português', NULL, NULL, '9789899552258', NULL, NULL, 1, 8, NULL, NULL, NULL, NULL, 0, ''),
(9, 'Gestão da Informação na Biblioteca Escolar', 'Português', NULL, NULL, '9789722314916', NULL, NULL, 1, 9, NULL, NULL, NULL, NULL, 0, ''),
(10, 'A virtual environment to share knowledge', 'Inglês', NULL, NULL, '9781351729901', NULL, NULL, 2, 4, NULL, NULL, NULL, NULL, 0, ''),
(11, 'Ciência da Informação: contributos para o seu estudo', 'Português', NULL, NULL, '9789896430900', NULL, NULL, 1, 4, NULL, NULL, NULL, NULL, 0, ''),
(12, 'Repensar a Sociedade da Informação e do Conhecimento no Início do Século XXI', 'Português', NULL, NULL, '9789726186953', NULL, NULL, 3, 4, NULL, NULL, NULL, NULL, 0, ''),
(13, 'Gestão da Informação em Museus: uma contribuição para o seu estudo', 'Português', NULL, NULL, '9789899901394', NULL, NULL, 2, 4, NULL, NULL, NULL, NULL, 0, ''),
(14, 'Web 2.0 and Higher Education. A psychological perspective', 'Inglês', NULL, NULL, '9783659683466', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 0, ''),
(15, 'Contribuições para a discussão de um modelo de Governo Eletrónico Local para Angola', 'Português', NULL, NULL, '9789899933200', NULL, NULL, 1, 13, NULL, NULL, NULL, NULL, 0, ''),
(16, 'sistema', 'portugues', NULL, NULL, '1234567781011', NULL, NULL, NULL, NULL, NULL, '2020-11-26 13:52:20', '2020-11-26 13:52:20', NULL, 0, ''),
(17, 'sistema', 'redes', 1, NULL, '1234567781011', NULL, NULL, NULL, NULL, NULL, '2020-11-26 14:15:09', '2020-11-26 14:15:09', NULL, 0, ''),
(25, 'sistema teste', 'portugues', NULL, NULL, '1234567781011', NULL, NULL, 1, NULL, NULL, '2020-12-10 15:21:10', '2020-12-10 15:21:10', NULL, 1, ''),
(28, 'sistema teste2', 'portugues', NULL, NULL, '1234567781011', NULL, NULL, 3, NULL, NULL, '2020-12-11 15:17:38', '2020-12-11 15:17:38', NULL, 2, ''),
(29, 'sistema teste3', 'portugues', NULL, NULL, '1234567781011', NULL, NULL, 1, NULL, NULL, '2020-12-11 15:41:52', '2020-12-11 15:41:52', NULL, 2, ''),
(30, 'imagens', 'portugues', NULL, NULL, '9123456789123', NULL, '1610028864_Lighthouse.jpg', 1, NULL, NULL, '2021-01-07 13:48:45', '2021-01-07 14:52:22', NULL, 1, '1610031142_pdf2.pdf'),
(31, 'pdf', 'portugues', NULL, NULL, '9123456789123', NULL, NULL, 1, NULL, NULL, '2021-01-07 14:56:29', '2021-01-07 14:56:29', NULL, 1, '1610031389_pdf1.pdf');

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
  `tipo_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal' COMMENT 'admin ou normal',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `tipo_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tiago', 'tiagofilipegoncalves.tc@gmail.com', NULL, '$2y$10$8lVaq6k/tuUiKdnuj1G4DeiZNKp0RqRzahc/j3rWUg1cio6sd4Mdu', 'admin', NULL, '2020-12-10 13:56:50', '2020-12-10 13:56:50'),
(2, 'tiago2', 'tiagofilipegoncalves@hotmail.com', NULL, '$2y$10$NdX9SPQo89ZRQpoKOPQkR.nG7Y1kPYj7uev5Lo7DLoEeQ15wvwNAG', 'normal', NULL, '2020-12-11 15:32:42', '2020-12-11 15:32:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indexes for table `autores_livros`
--
ALTER TABLE `autores_livros`
  ADD PRIMARY KEY (`id_al`);

--
-- Indexes for table `edicoes`
--
ALTER TABLE `edicoes`
  ADD PRIMARY KEY (`id_livro`,`id_editora`);

--
-- Indexes for table `editoras`
--
ALTER TABLE `editoras`
  ADD PRIMARY KEY (`id_editora`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `autores_livros`
--
ALTER TABLE `autores_livros`
  MODIFY `id_al` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `editoras`
--
ALTER TABLE `editoras`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
