-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2018 a las 13:46:03
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
-- Estructura de tabla para la tabla `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `artists`
--

INSERT INTO `artists` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'SFDK', '2018-12-16 11:17:43', '2018-12-16 11:17:43'),
(2, 1, 'El Reno Renardo', '2018-12-16 11:21:31', '2018-12-16 11:21:31'),
(3, 1, 'Alestorm', '2018-12-16 11:23:12', '2018-12-16 11:23:12'),
(4, 1, 'Los Quetedije', '2018-12-16 11:25:27', '2018-12-16 11:25:27'),
(7, 1, 'El Fary', '2018-12-16 11:27:56', '2018-12-16 11:27:56'),
(8, 1, 'Narco', '2018-12-16 11:28:02', '2018-12-16 11:28:02'),
(9, 1, 'Desakato', '2018-12-16 11:40:12', '2018-12-16 11:40:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concerts`
--

CREATE TABLE `concerts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `concerts`
--

INSERT INTO `concerts` (`id`, `user_id`, `name`, `location`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'SFDK', 'Auditorio Rocío Jurado, Sevilla', '25.00', '2018-12-16 12:28:57', '2018-12-16 12:28:57'),
(2, 1, 'SFDK', 'Sala París 15, Málaga', '18.00', '2018-12-16 12:30:23', '2018-12-16 12:30:23'),
(4, 1, 'El Fary', 'Mandanga Fest, Sevilla', '30.00', '2018-12-16 12:31:40', '2018-12-16 12:31:40'),
(5, 1, 'El Reno Renardo', 'Sala Malandar, Sevilla', '15.00', '2018-12-16 12:32:22', '2018-12-16 12:32:22'),
(6, 1, 'Capitán Cobarde', 'Centro Andaluz de Arte Contemporáneo, Sevilla', '20.00', '2018-12-16 12:34:34', '2018-12-16 12:34:34'),
(7, 1, 'Caracoles en salsa', 'Sala Malandar, Sevilla', '0.00', '2018-12-16 12:35:27', '2018-12-16 12:35:27'),
(8, 1, 'SFDK', 'Sala Meloinvento, Barcelona', '18.00', '2018-12-16 12:36:30', '2018-12-16 12:36:30'),
(9, 1, 'Narco', 'Sala X, Sevilla', '12.00', '2018-12-16 12:37:54', '2018-12-16 12:37:54'),
(10, 1, 'Narco', 'Centro Andaluz de Arte Contemporáneo, Sevilla', '22.00', '2018-12-16 12:38:17', '2018-12-16 12:38:17'),
(11, 1, 'Los Quetedije', 'Bar Retórica, Sevilla', '0.00', '2018-12-16 12:39:11', '2018-12-16 12:39:11'),
(15, 1, 'Porn (Tributo a Korn)', 'Sala X, Sevilla', '10.50', '2018-12-16 12:46:37', '2018-12-16 12:46:37'),
(16, 1, 'El Reno Renardo', 'Sala Pimpollo, Murcia', '8.00', '2018-12-16 12:47:49', '2018-12-16 12:47:49');

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
(1, 'gatosaurio', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'wrong username', '2018-12-16 11:10:52'),
(2, 'patatoide', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'wrong username', '2018-12-16 11:13:51'),
(3, 'manolo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-12-16 11:14:09'),
(4, 'cacafuti', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'wrong username', '2018-12-16 11:24:17'),
(5, 'manolo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'wrong pass', '2018-12-16 11:24:28'),
(6, 'manolo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-12-16 11:24:34'),
(7, 'manolo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'wrong pass', '2018-12-16 12:10:59'),
(8, 'manolo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 'OK', '2018-12-16 12:11:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `concert_id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `concert_id`, `text`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Comprar ron!!', '2018-12-16 11:52:04', '2018-12-16 11:52:04'),
(2, 1, 1, 'Recoger a Guille', '2018-12-16 11:52:12', '2018-12-16 11:52:12'),
(4, 1, 2, 'Llevar suelto para el peaje', '2018-12-16 11:53:18', '2018-12-16 11:53:18'),
(5, 1, 4, 'Llevar la mandanga', '2018-12-16 11:53:41', '2018-12-16 11:53:41'),
(6, 1, 5, 'Comprar cervezas', '2018-12-16 11:54:05', '2018-12-16 11:54:05'),
(10, 1, 9, 'Comprar entradas', '2018-12-16 12:04:05', '2018-12-16 12:04:05'),
(11, 1, 11, 'Recoger cable del local', '2018-12-16 12:04:27', '2018-12-16 12:04:27'),
(12, 1, 16, 'Avisar a Vicente', '2018-12-16 12:04:43', '2018-12-16 12:04:59');

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
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Manolo', 'manolito@gmail.com', '$2y$10$zrrBAeZQBBEuTgaYb6KYB.ueFepPpqixLS.J65XmVFczopuqH1UT.', '2018-12-16 12:13:15', '2018-12-16 13:06:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indices de la tabla `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `concert_id` (`concert_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `concerts`
--
ALTER TABLE `concerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `concerts`
--
ALTER TABLE `concerts`
  ADD CONSTRAINT `concerts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`concert_id`) REFERENCES `concerts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
