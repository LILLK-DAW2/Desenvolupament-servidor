-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 20:17:21
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

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
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(6) NOT NULL,
  `producto` int(6) NOT NULL,
  `cantidad` int(6) NOT NULL,
  `precio` int(6) NOT NULL,
  `usuario` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `producto`, `cantidad`, `precio`, `usuario`) VALUES
(5, 3, 0, 14, 4),
(6, 5, 2, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(6) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`) VALUES
(1, 'de', 'a'),
(2, 'c', 'c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(6) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `stock` int(6) NOT NULL,
  `precio` int(6) NOT NULL,
  `categoria` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `stock`, `precio`, `categoria`) VALUES
(1, '1', 947, 999, 2),
(2, 'b', 79, 70, 2),
(3, 'a', 90, 14, 1),
(4, 'c', 61, 123, 1),
(5, '124', 2333, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(6) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` varchar(15) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nick`, `mail`, `password`, `rol`) VALUES
(1, 'dacaho', 'test1@si.com', '81dc9bdb52d04dc20036dbd8313ed0', 'usuario'),
(2, 'dacaho', 'test1@si2.com', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario'),
(3, 'admin', 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(4, 'usuario', 'usuario3@usuario3.com', '0cc175b9c0f1b6a831c399e269772661', 'usuario'),
(5, 'usuario2', 'usuario2@usuario2.com', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario'),
(6, 'user', 'user@user.com', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Carrito_Producto` (`producto`),
  ADD KEY `FK_Carrito_User` (`usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Producto_Categoria` (`categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `FK_Carrito_Producto` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `FK_Carrito_User` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_Producto_Categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
