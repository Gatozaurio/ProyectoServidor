-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2018 a las 13:11:29
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
-- Estructura de tabla para la tabla `concerts`
--

CREATE TABLE `concerts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `concerts`
--

INSERT INTO `concerts` (`id`, `user_id`, `name`, `location`, `price`, `created_at`, `updated_at`) VALUES
(12, 1, 'hr', 'rrrrr', '3', '2018-12-03 10:05:37', '2018-12-03 10:05:37'),
(13, 1, 'www', 'wwwww', '2', '2018-12-03 10:05:43', '2018-12-03 10:05:43'),
(14, 9, 'dwadwad', 'dwadad', '2', '2018-12-03 10:10:43', '2018-12-03 10:10:43'),
(15, 9, 'dwadwa', 'dwadawd', '1', '2018-12-03 10:12:06', '2018-12-03 10:12:06'),
(16, 9, 'DWADAWDAW', 'WADWAD', '2', '2018-12-03 10:12:52', '2018-12-03 10:12:52'),
(17, 9, 'dwadawdwa', 'dwadwadwad', '2', '2018-12-03 10:17:11', '2018-12-03 10:17:11'),
(18, 9, 'Lendakaris Muertos', 'Sala Malandar, Sevilla', '12', '2018-12-03 10:17:57', '2018-12-03 10:17:57'),
(19, 10, 'Lendakaris Muertos', 'Sala Malandar, Sevilla', '20', '2018-12-03 11:12:01', '2018-12-03 11:12:01'),
(20, 10, 'Alestorm', 'Sala X, Sevilla', '24', '2018-12-03 11:13:50', '2018-12-03 11:13:50'),
(21, 10, 'Hola', 'Sala X, Sevilla', '22', '2018-12-03 11:17:34', '2018-12-03 11:17:34'),
(22, 10, 'Ofunkillo', 'Sala Malandar, Sevilla', '12', '2018-12-03 11:18:30', '2018-12-03 11:18:30');

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
(11, 'patata25', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-11-26 11:52:06'),
(12, 'patata25', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-12-03 06:49:41'),
(13, 'patata25', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-12-03 08:51:27'),
(14, 'patata25', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-12-03 09:10:31'),
(15, 'patata25', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-12-03 09:34:13'),
(16, 'patatoide', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-12-03 10:11:17'),
(17, 'patatoide', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-12-03 19:04:41'),
(18, 'patatoide', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-12-04 10:07:44'),
(19, 'patatoide', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-12-04 11:27:07'),
(20, 'patatoide', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-12-04 11:32:42'),
(21, 'patatoide', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-12-04 11:47:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
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
(9, 'patata25', 'patata@gmail.com', '$2y$10$Q0j2pk8WYpzdKOaanqcCa.wGKFt/WtY7LhqCRHTrzxgOmu4tuL8SK', '2018-11-26 11:46:45', '2018-11-26 11:46:45'),
(10, 'patatoide', 'patatoide@gmail.com', '$2y$10$djEG9sQ7yO20ZDOBAgtDI.QeM8J2olAbmCkcUrteVyS1z1xrsGumK', '2018-12-03 11:11:05', '2018-12-03 11:11:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT de la tabla `concerts`
--
ALTER TABLE `concerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `concerts`
--
ALTER TABLE `concerts`
  ADD CONSTRAINT `concerts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
