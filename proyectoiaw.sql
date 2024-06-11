-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2024 a las 19:00:41
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Apellido` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Ciudad` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `Nombre`, `Apellido`, `Email`, `Telefono`, `Ciudad`) VALUES
(1, 'Julian', 'Muñoz Castillo', 'julian@mail.com', 123456789, 'Marchena'),
(2, 'Samuel', 'García Cruz', 'kiki@mail.com', 123456789, 'Morón'),
(3, 'Raul', 'Sanchez Sanchez', 'raul@mail.com', 6236632, 'Morón'),
(4, 'Ruben', 'Duarte Avendaño', 'ruben123321@mail.com', 656678946, 'Morón');

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
(2, 'Mario Sanchez', 'Mario', '$2y$10$abo2Q2qPyoDEExg6Nh/foumNQlghpiT5MWlJw7F6qvzcpR7TktFgK', 'Si'),
(32, 'Usuario', 'usuario', '$2y$10$tz5uZgZzyf8JS9mgCMQKYO.YxtX.ozemn4Uqry53.HgoIioT/UeJu', 'No'),
(33, 'Martin López', 'Martin', '$2y$10$.aG8GnfV5N0fBgrEBtYIMeq/sS0T339mzXHayiyw9/xVJy3dcj0UK', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_zapatilla` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_zapatilla`, `cantidad`, `fecha_venta`) VALUES
(2, 36, 22, 1, '2024-06-12'),
(4, 1, 14, 2, '2024-03-01'),
(6, 36, 6, 12, '2024-05-28'),
(7, 1, 2, 1, '2024-05-28'),
(8, 2, 24, 1, '2022-04-13'),
(10, 3, 16, 1, '2024-05-28');

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
(2, 'Forum Low Bad Bunny', 'Adidas', 120, 81),
(6, 'Skull', 'Vans', 100, 0),
(14, 'Sacai SB EDITADO', 'Nike', 200, 81),
(16, 'SB Dunk Low - Why So Sad?', 'Nike', 500, 399),
(17, '550 Retro Green', 'New Balance', 120, 300),
(18, 'Air Jordan 2 x Off-White', 'Nike', 800, 20),
(19, 'Campus Light Bad Bunny Wild Moss Bad Bunny', 'Adidas', 212, 100),
(20, 'DRX BLISS ', 'Salomon', 160, 500),
(21, 'Comme Des Garçons', 'Converse', 130, 100),
(22, 'L003 2K24 ', 'Lacoste', 160, 328),
(23, 'Club C 85', 'Reebok', 100, 208),
(24, 'Suede Classic', 'Puma', 90, 429),
(25, 'numero 1', 'Reebok', 100, 200);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- Indices de la tabla `zapatillas`
--
ALTER TABLE `zapatillas`
  ADD PRIMARY KEY (`id_zapatilla`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `zapatillas`
--
ALTER TABLE `zapatillas`
  MODIFY `id_zapatilla` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
