-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2023 a las 19:52:00
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
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codCat` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codCat`, `nombre`, `descripcion`) VALUES
(1, 'Alcohol', 'Bebidas con alohol'),
(2, 'Sin alcohol', 'Bebidas sin alohol'),
(3, 'Comida', 'Alimentos muy ricos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `codPed` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `enviado` tinyint(1) DEFAULT NULL,
  `codRes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`codPed`, `fecha`, `enviado`, `codRes`) VALUES
(11, '2023-11-14', 0, 2),
(12, '2023-11-14', 0, 2),
(13, '2023-11-14', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `codPed` int(11) DEFAULT NULL,
  `codPro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`codPed`, `codPro`) VALUES
(11, 6),
(11, 10),
(12, 6),
(12, 12),
(12, 8),
(13, 9),
(13, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codPro` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `codCat` int(11) DEFAULT NULL,
  `peso` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codPro`, `nombre`, `descripcion`, `codCat`, `peso`, `stock`) VALUES
(6, 'Vodka', 'Destilado de patata', 1, 1.30, 30),
(7, 'Whiskey', 'La cosa esta de los Irlandeses', 1, 5.00, 20),
(8, 'Ron', 'Eso de los piratas', 1, 3.60, 10),
(9, 'Cocacola', 'Desatasca-bateres', 2, 3.00, 25),
(10, 'Bitter kas', 'God tier', 2, 5.80, 20),
(11, 'Gaseosa', 'Master mind tier', 2, 2.60, 90),
(12, 'Bacalo', 'Dime quien corta el bacalao', 3, 2.00, 25),
(13, 'Tortilla', 'La tortilla la hago yo', 3, 3.10, 20),
(14, 'Caracoles en escabeche', 'Que es eso', 3, 5.00, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

CREATE TABLE `restaurante` (
  `codRes` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `restaurante`
--

INSERT INTO `restaurante` (`codRes`, `correo`, `clave`, `direccion`, `cp`, `pais`) VALUES
(1, 'encargado@admin.com', 'admin', 'Calle no se que', 26087, 'España'),
(2, 'lombproyecto@gmail.com', 'admin', 'esta', 32311, 'España');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codCat`),
  ADD UNIQUE KEY `Categoria_un` (`nombre`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`codPed`),
  ADD KEY `Pedido_FK` (`codRes`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD KEY `Pedido_Producto_FK` (`codPed`),
  ADD KEY `Pedido_Producto_FK_1` (`codPro`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codPro`),
  ADD KEY `Producto_FK` (`codCat`);

--
-- Indices de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`codRes`),
  ADD UNIQUE KEY `Restaurante_un` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `codCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `codPed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codPro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `codRes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `Pedido_FK` FOREIGN KEY (`codRes`) REFERENCES `restaurante` (`codRes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD CONSTRAINT `Pedido_Producto_FK` FOREIGN KEY (`codPed`) REFERENCES `pedido` (`codPed`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Pedido_Producto_FK_1` FOREIGN KEY (`codPro`) REFERENCES `producto` (`codPro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `Producto_FK` FOREIGN KEY (`codCat`) REFERENCES `categoria` (`codCat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
