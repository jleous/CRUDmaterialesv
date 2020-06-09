-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2020 a las 23:13:41
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pellacani`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `familia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `espesor` int(11) NOT NULL,
  `creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `eliminado` set('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id`, `nombre`, `familia`, `espesor`, `creacion`, `eliminado`) VALUES
(1, 'Calacatta 01R', '', 20, '2020-06-09 21:12:14', '1'),
(2, 'Carrara', 'Marmol', 20, '2020-06-09 19:31:20', '0'),
(3, 'Gris Mara', 'Granito', 20, '2020-06-09 20:35:51', '1'),
(4, 'Gris Impala', 'Granito', 20, '2020-06-09 19:31:20', '0'),
(5, 'leo', 'granito', 10, '2020-06-09 19:32:21', '1'),
(6, 'leo', 'granito', 15, '2020-06-09 20:38:04', '1'),
(7, 'dfg', 'marmol', 10, '2020-06-09 20:33:03', '1'),
(8, 'jaja', 'neolith', 12, '2020-06-09 20:50:21', '0'),
(9, 'jajaa', 'cuarzo', 12, '2020-06-09 19:31:20', '0'),
(10, 'Madera', 'marmol', 15, '2020-06-09 21:12:57', '1'),
(11, 'Madera', 'marmol', 10, '2020-06-09 20:34:07', '1'),
(12, 'lala', 'granito', 15, '2020-06-09 20:36:49', '0'),
(13, 'lala2', 'granito', 10, '2020-06-09 21:12:39', '0'),
(14, 'lalaa', 'neolith', 15, '2020-06-09 20:51:52', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
