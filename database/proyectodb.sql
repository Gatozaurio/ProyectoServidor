-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2018 a las 14:28:03
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectodb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `status` enum('OK','wrong pass','wrong username') COLLATE utf8_general_mysql500_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `logins`
--

INSERT INTO `logins` (`id`, `username`, `ip`, `agent`, `status`, `created_at`) VALUES
(1, '0', 'username', '::1', '', '2018-11-26 10:46:13'),
(2, '1', 'N/A', '::1', '', '2018-11-26 10:46:53'),
(3, '0', 'username', '::1', '', '2018-11-26 10:49:50'),
(4, 'ffdwa', '::1', 'agente', 'wrong username', '2018-11-26 10:53:59'),
(5, 'dadawdw', '::1', 'agente', 'wrong username', '2018-11-26 10:54:05'),
(6, 'dadawdw', '127.0.0.1', 'agente', 'wrong username', '2018-11-26 10:56:33'),
(7, 'patata25', '127.0.0.1', 'agente', 'OK', '2018-11-26 10:56:40'),
(8, 'dwadawda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'wrong username', '2018-11-26 11:04:16'),
(9, 'patata25', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-11-26 11:11:10'),
(10, 'patata25', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-11-26 11:36:47'),
(11, 'patata25', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-11-26 11:52:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `created_at` TIMESTAMP NOT NULL default now(),
  `updated_at` TIMESTAMP NOT NULL default now() on update now()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'adadawdw', 'patata@gmail.com', '$2y$10$gb/i47WmQVQ0N7ss9haDM.Z5insqRP5GE8xcD1wzbCHjv8gIZ8Dgu', '2018-11-12 11:47:52', '2018-11-12 11:47:52'),
(2, 'manolito', 'manolo@gmail.com', '$2y$10$qrHoyUW1RWpXiPegRVJdJe4FjoDk/7vnI6SwuVE7g7FtSbs6AM5vu', '2018-11-12 11:49:22', '2018-11-12 11:49:22'),
(3, 'Gatosaurio25', 'tavora25@gmail.com', '$2y$10$W4kMsK7svNX6i1tVvcRCqOwl.klzYlDjMizjBxmmq1EwGsvRe.Rfu', '2018-11-12 12:04:41', '2018-11-12 12:04:41'),
(4, 'dadw dawdwa', 'pelusa@gmail.com', '$2y$10$EE1UMReVITgPDdJPxk/KWevI2oC9GVBVZ8pYJ3VsLgBDkVp4Dx9uu', '2018-11-17 17:58:17', '2018-11-17 17:58:17'),
(5, 'dadw dawdwaD', 'pelusa@gmail.com', '$2y$10$FMuhadxfAJVgA.wJl.NOZ.TDS/MVU233xqfgXnKpSj1SNhpr7RSgK', '2018-11-17 18:14:31', '2018-11-17 18:14:31'),
(6, '%\"dadw', 'manoloooo@gmail.com', '$2y$10$ZkvrSrePxUr2Mt8PCVNgWeWvzstUmB.rdEGWKv5My3mlLucwniXo6', '2018-11-17 18:16:05', '2018-11-17 18:16:05'),
(7, 'daddwadwad', 'pelusa@gmail.com', '$2y$10$t8T1x1KH2s8YmCT.ZNykZeK3WpnmcSF/UVWyYztjiMElff/w8HcYC', '2018-11-17 20:38:44', '2018-11-17 20:38:44'),
(8, 'patata', 'patata@gmail.com', '$2y$10$sAHm/YpF7k4g42rL16K90uPsmVyCiz7EbawAu.I81hYdT2KeqQvdK', '2018-11-17 21:11:19', '2018-11-17 21:11:19'),
(9, 'patata25', 'patata@gmail.com', '$2y$10$Q0j2pk8WYpzdKOaanqcCa.wGKFt/WtY7LhqCRHTrzxgOmu4tuL8SK', '2018-11-26 11:46:45', '2018-11-26 11:46:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
