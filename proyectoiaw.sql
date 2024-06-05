-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2024 a las 12:45:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoiaw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Administrador` set('Si','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Nombre`, `Usuario`, `Password`, `Administrador`) VALUES
(1, 'Administrador', 'admin', '$2y$10$9R1rKi6M9HR3u3Fim4WK9OeuRzkdcxSsHHXyNdK26MURoEBH1VyV2', 'Si'),
(2, 'Mario Sanchez', 'Mario', '$2y$10$cell9XwaaMlgSRPTMQj2zOzNR1JzFCVZkuKwQc5rhiTaIsbnlp26W', 'No'),
(32, 'Usuario', 'usuario', '$2y$10$tz5uZgZzyf8JS9mgCMQKYO.YxtX.ozemn4Uqry53.HgoIioT/UeJu', 'Si'),
(33, 'Martin López', 'Martin', '$2y$10$.aG8GnfV5N0fBgrEBtYIMeq/sS0T339mzXHayiyw9/xVJy3dcj0UK', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zapatillas`
--

CREATE TABLE `zapatillas` (
  `id_zapatilla` int(10) NOT NULL,
  `Modelo` varchar(150) NOT NULL,
  `Marca` set('Nike','Adidas','New Balance','Puma','Converse','Vans','Lacoste','Salomon','Reebok') NOT NULL,
  `Precio` int(6) NOT NULL,
  `Stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zapatillas`
--

INSERT INTO `zapatillas` (`id_zapatilla`, `Modelo`, `Marca`, `Precio`, `Stock`) VALUES
(2, 'Forum Low Bad Bunny', 'Adidas', 355, 30),
(6, 'Skull', 'Vans', 100, 0),
(14, 'Sacai SB EDITADO', 'Nike', 200, 100),
(16, 'SB Dunk Low - Why So Sad?', 'Nike', 500, 400),
(17, '550 Retro Green', 'New Balance', 120, 300),
(18, 'Air Jordan 2 x Off-White', 'Nike', 800, 20),
(19, 'Campus Light Bad Bunny Wild Moss Bad Bunny', 'Adidas', 212, 100),
(20, 'DRX BLISS ', 'Salomon', 160, 500),
(21, 'Comme Des Garçons', 'Converse', 130, 224),
(22, 'L003 2K24 ', 'Lacoste', 160, 327),
(23, 'Club C 85', 'Reebok', 100, 208),
(24, 'Suede Classic', 'Puma', 90, 430);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `zapatillas`
--
ALTER TABLE `zapatillas`
  ADD PRIMARY KEY (`id_zapatilla`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `zapatillas`
--
ALTER TABLE `zapatillas`
  MODIFY `id_zapatilla` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
