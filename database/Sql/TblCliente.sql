-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2025 a las 23:10:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bootcamp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

-- CREATE TABLE `cliente` (
--  `id` bigint(20) UNSIGNED NOT NULL,
--  `apellidos` varchar(50) DEFAULT NULL,
--  `nombre` varchar(50) DEFAULT NULL,
--  `documento` varchar(15) DEFAULT NULL,
--  `telefono` varchar(15) DEFAULT NULL,
--  `email` varchar(50) DEFAULT NULL,
--  `direccion` varchar(100) DEFAULT NULL,
--  `created_at` timestamp NULL DEFAULT NULL,
--  `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

 CREATE TABLE `cliente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `documento` varchar(15) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



--
-- Volcado de datos para la tabla `users`
--

-- INSERT INTO `cliente` (`id`, `apellidos`, `nombre`,`documento`, `telefono`,`email`,`direccion`,`created_at`, `updated_at`) VALUES
-- (1, 'Paguay Toaquiza','Gonzalo', '0914168075','2477097' ,'gonzalopaguay@hotmail.com','Garcia Goyena No. 5012 y la 27a ava', 
-- '2025-01-19 01:05:35', '2025-01-19 01:05:35');


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
