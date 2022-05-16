-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2022 a las 03:59:54
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dentidesk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `id` int(11) NOT NULL COMMENT 'Identificador de la transaccion',
  `tipo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'E: egreso, I: ingreso',
  `valor` int(255) NOT NULL COMMENT 'Monto o valor de la transaccion',
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`id`, `tipo`, `valor`, `fecha`) VALUES
(1, 'I', 34, '2022-05-15'),
(2, 'I', 200, '2022-05-15'),
(3, 'I', 50, '2022-05-15'),
(4, 'E', 200, '2022-05-15'),
(5, 'E', 45, '2022-05-15'),
(6, 'I', 45, '2022-05-15'),
(7, 'I', 300, '2022-05-15'),
(8, 'E', 84, '2022-05-15'),
(10, 'E', 100, '2022-05-15'),
(11, 'I', 100, '2022-05-15'),
(12, 'E', 500, '2022-05-15'),
(13, 'I', 100, '2022-05-15'),
(14, 'I', 89, '2022-05-15'),
(15, 'I', 500, '2022-05-15'),
(16, 'I', 44, '2022-05-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la transaccion', AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
