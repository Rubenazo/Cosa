-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2015 a las 22:14:42
-- Versión del servidor: 5.6.11
-- Versión de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cosa`
--
CREATE DATABASE IF NOT EXISTS `cosa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cosa`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Banesco', '2015-03-11 02:18:37', '0000-00-00 00:00:00'),
(2, 'BOD', '2015-03-11 02:18:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `num_cuenta`
--

CREATE TABLE IF NOT EXISTS `num_cuenta` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `banco_id` int(6) NOT NULL,
  `numero` int(30) NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `banco_id` (`banco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `num_cuenta`
--

INSERT INTO `num_cuenta` (`id`, `banco_id`, `numero`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 1, 12345, 'corriente', '2015-03-17 21:57:20', '0000-00-00 00:00:00'),
(2, 2, 56789, 'ahorro', '2015-03-17 21:57:20', '0000-00-00 00:00:00'),
(3, 1, 45533, 'nolmal', '2015-03-18 18:52:23', '0000-00-00 00:00:00'),
(4, 2, 74488, 'anolmal', '2015-03-18 18:52:23', '0000-00-00 00:00:00'),
(5, 1, 45452, 'perro', '2015-03-18 23:54:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `transferencia` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `usuario_id` int(6) NOT NULL,
  `plan_id` int(6) NOT NULL,
  `bantrans_id` int(6) NOT NULL,
  `banco_id` int(6) NOT NULL,
  `num_cuenta_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `plan_id` (`plan_id`),
  KEY `banco_id` (`banco_id`),
  KEY `num_cuenta_id` (`num_cuenta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `transferencia`, `monto`, `usuario_id`, `plan_id`, `bantrans_id`, `banco_id`, `num_cuenta_id`, `created_at`, `updated_at`) VALUES
(2, 213, 321, 0, 0, 1, 2, 0, '2015-03-26 00:46:13', '2015-03-26 00:46:13'),
(3, 2, 1, 0, 0, 1, 2, 0, '2015-03-26 00:46:40', '2015-03-26 00:46:40'),
(4, 1233332, 21212, 1, 0, 1, 2, 0, '2015-03-26 00:54:27', '2015-03-26 00:54:27'),
(5, 123, 123, 6, 0, 1, 1, 0, '2015-03-26 00:54:45', '2015-03-26 00:54:45'),
(6, 123, 123, 2, 1, 1, 2, 0, '2015-03-26 00:55:27', '2015-03-26 00:55:27'),
(7, 456, 778, 1, 1, 1, 1, 1, '2015-03-26 01:43:46', '2015-03-26 01:43:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE IF NOT EXISTS `planes` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `velocidad` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

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
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pedro', '$2y$10$cglR882hKdIqgQC8SN5TBuUPFdzKKgkyvbNdRQStZT4K4bXyyAmeG', 'joJeuiL8yJ6CH0RStgTJX0xzKm7vhakk48Ywz9SHu7E99oMUUItBZ0ZwLStu', '2015-03-24 21:07:37', '2015-03-25 01:37:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zona` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `plan_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `zona`, `plan_id`, `created_at`, `updated_at`) VALUES
(1, 'Ruben', 'Gonzalez', 'rubenx_360@hotmail.com', 'maracay', 1, '2015-03-08 03:28:00', '2015-03-08 03:28:00'),
(2, 'Pedro', 'Perez', 'Pepin@hotmail.com', 'jueves', 1, '2015-03-08 03:29:56', '2015-03-08 03:29:56'),
(3, 'Jaja', 'Jeje', 'jfjf@fjjf.com', 'rrt', 1, '2015-03-08 03:34:11', '2015-03-08 03:34:11'),
(4, 'chikun', 'guya', 'zan@hotmail.com', 'aqui', 2, '2015-03-11 05:04:18', '2015-03-11 05:04:18'),
(5, 'ds', 'dsds', 'dsdsd@dd.com', 'sdsd', 1, '2015-03-13 17:49:40', '2015-03-13 17:49:40'),
(6, 'jorge', 'ramon', 'paps@h.com', 'aqui', 1, '2015-03-25 04:31:16', '2015-03-25 04:31:16');

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
