-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2015 a las 20:02:13
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cosa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
`id` int(6) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Banesco', '2015-03-11 02:18:37', '0000-00-00 00:00:00'),
(2, 'BOD', '2015-03-11 02:18:37', '0000-00-00 00:00:00'),
(3, 'Mercantil', '2015-04-09 22:15:37', '2015-04-09 22:15:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `num_cuenta`
--

CREATE TABLE IF NOT EXISTS `num_cuenta` (
`id` int(6) NOT NULL,
  `banco_id` int(6) NOT NULL,
  `numero` int(30) NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `num_cuenta`
--

INSERT INTO `num_cuenta` (`id`, `banco_id`, `numero`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 1, 12345, 'corriente', '2015-03-17 21:57:20', '0000-00-00 00:00:00'),
(2, 2, 56789, 'ahorro', '2015-03-17 21:57:20', '0000-00-00 00:00:00'),
(3, 1, 45533, 'nolmal', '2015-03-18 18:52:23', '0000-00-00 00:00:00'),
(4, 2, 74488, 'anolmal', '2015-03-18 18:52:23', '0000-00-00 00:00:00'),
(5, 1, 45452, 'perro', '2015-03-18 23:54:32', '0000-00-00 00:00:00'),
(6, 3, 1254, 'achorro', '2015-04-09 22:31:54', '2015-04-09 22:31:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
`id` int(6) NOT NULL,
  `transferencia` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `usuario_id` int(6) NOT NULL,
  `plan_id` int(6) NOT NULL,
  `bantrans_id` int(6) NOT NULL,
  `banco_id` int(6) NOT NULL,
  `num_cuenta_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `transferencia`, `monto`, `usuario_id`, `plan_id`, `bantrans_id`, `banco_id`, `num_cuenta_id`, `created_at`, `updated_at`) VALUES
(4, 1233332, 21212, 1, 0, 1, 2, 0, '2015-03-26 00:54:27', '2015-03-26 00:54:27'),
(5, 123, 123, 6, 0, 1, 1, 0, '2015-03-26 00:54:45', '2015-03-26 00:54:45'),
(6, 123, 123, 2, 1, 1, 2, 0, '2015-03-26 00:55:27', '2015-03-26 00:55:27'),
(7, 456, 778, 1, 1, 1, 1, 1, '2015-03-26 01:43:46', '2015-03-26 01:43:46'),
(8, 354, 78, 7, 2, 2, 1, 3, '2015-04-09 00:21:57', '2015-04-09 00:21:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE IF NOT EXISTS `planes` (
`id` int(6) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `velocidad` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `descripcion`, `precio`, `velocidad`, `created_at`, `updated_at`) VALUES
(1, 'primero', '250.00', 1000, '2015-03-07 22:21:43', '0000-00-00 00:00:00'),
(2, 'Segundo', '50.00', 20, '2015-03-08 00:31:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pedro', '$2y$10$cglR882hKdIqgQC8SN5TBuUPFdzKKgkyvbNdRQStZT4K4bXyyAmeG', 'XGoyq88v8PBRJ9D8cdm8a5FVYQtIAWzPpI90V5E822J67wBbAWpqE1RTtd3r', '2015-04-08 19:48:21', '2015-04-09 00:18:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(6) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zona` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `plan_id` int(6) NOT NULL,
  `fecha_corte` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `zona`, `plan_id`, `fecha_corte`, `created_at`, `updated_at`) VALUES
(1, 'Ruben', 'Gonzalez', 'rubenx_360@hotmail.com', 'maracay', 1, 0, '2015-03-08 03:28:00', '2015-03-08 03:28:00'),
(2, 'Pedro', 'Perez', 'Pepin@hotmail.com', 'jueves', 1, 0, '2015-03-08 03:29:56', '2015-03-08 03:29:56'),
(3, 'Jaja', 'Jeje', 'jfjf@fjjf.com', 'rrt', 1, 0, '2015-03-08 03:34:11', '2015-03-08 03:34:11'),
(4, 'chikun', 'guya', 'zan@hotmail.com', 'aqui', 2, 0, '2015-03-11 05:04:18', '2015-03-11 05:04:18'),
(5, 'ds', 'dsds', 'dsdsd@dd.com', 'sdsd', 1, 0, '2015-03-13 17:49:40', '2015-03-13 17:49:40'),
(6, 'jorge', 'ramon', 'paps@h.com', 'aqui', 1, 0, '2015-03-25 04:31:16', '2015-03-25 04:31:16'),
(7, 'jamon', 'queso', 'empanada@carne.com', 'plato', 2, 0, '2015-04-09 00:18:59', '2015-04-09 00:18:59'),
(8, 'Papa', 'Papu', 'papa@papu.com', 'por alla', 1, 15, '2015-04-09 06:23:46', '2015-04-09 06:23:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `num_cuenta`
--
ALTER TABLE `num_cuenta`
 ADD PRIMARY KEY (`id`), ADD KEY `banco_id` (`banco_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
 ADD PRIMARY KEY (`id`), ADD KEY `usuario_id` (`usuario_id`), ADD KEY `plan_id` (`plan_id`), ADD KEY `banco_id` (`banco_id`), ADD KEY `num_cuenta_id` (`num_cuenta_id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD KEY `plan_id` (`plan_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `num_cuenta`
--
ALTER TABLE `num_cuenta`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `num_cuenta`
--
ALTER TABLE `num_cuenta`
ADD CONSTRAINT `num_cuenta_ibfk_1` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `planes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
