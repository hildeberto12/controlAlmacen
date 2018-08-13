-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2018 a las 02:09:11
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlalmacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(100) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `mercancia` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `numero_folio` int(11) NOT NULL,
  `tipo_transporte` varchar(50) NOT NULL,
  `presentacion_mercancia` varchar(50) NOT NULL,
  `numero_contenedor` int(11) NOT NULL,
  `numero_sello` int(11) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `cliente`, `mercancia`, `cantidad`, `numero_folio`, `tipo_transporte`, `presentacion_mercancia`, `numero_contenedor`, `numero_sello`, `fecha_entrada`, `fecha_salida`) VALUES
(1, 'Andrea', 'coca-cola', 2, 1, 'Terrestre', 'Caja', 1, 1, '2018-07-01', '2018-07-02'),
(2, 'pepsi', 'Refresco', 3, 2, 'Terrestre', 'Cajas', 2, 2, '2018-07-03', '2018-07-04'),
(3, 'Sabritas', 'Sabritas', 3, 3, 'Terrestre', 'Cajas', 3, 3, '2018-07-05', '2018-07-06'),
(4, 'Juan', 'Borrador', 4, 4, 'Terrestre', 'Cajas', 4, 4, '2018-07-02', '2018-07-03'),
(5, 'Sabritas', 'Rufles', 5, 5, 'Terrestre', 'Cajas', 5, 5, '2018-07-01', '2018-07-02'),
(6, 'Barcel', 'Runner', 6, 6, 'Terrestre', 'Cajas', 6, 6, '2018-07-02', '2018-07-03'),
(7, 'Pedro', 'Nose', 7, 7, 'Terrestre', 'Cajas', 7, 7, '2018-07-01', '2018-07-03'),
(8, 'Diana', 'Chicles', 10, 8, 'Terrestre', 'Cajas', 8, 8, '2018-07-05', '2018-07-09'),
(9, 'Sean', 'Maus', 1, 9, 'Terrestre', 'Caja', 9, 9, '2018-07-08', '2018-07-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUsuario` int(10) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `passwd` varchar(100) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUsuario`, `usuario`, `passwd`, `nombre`, `email`, `rol`) VALUES
(1, 'hilde', '123456', 'hildeberto', 'a20150115@gmail.com', 1),
(2, 'cesar', '12345', 'Cesar Joel', 'cesar_12@gmail.com', 1),
(3, 'ale', '1234', 'Alejandro Flores', 'ale_12@gmail.com', 1),
(4, 'erika', 'erika1', 'erika melaque', 'asdasdq@asdf', 2),
(5, 'arturo', 'arturo1', 'arturo vicente', 'asdasdq@asdf', 2),
(6, 'robert', '147', 'Roberto Carlos', 'asdasdq@asdf', 2),
(9, 'leo', '159', 'Leonel Messi', 'asdasdq@asdf', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
