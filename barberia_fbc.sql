-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2022 a las 10:27:47
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `barberia_fbc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `clave` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `rol` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `clave`, `nombre`, `apellido`, `foto`, `rol`) VALUES
(1, 'admin', '123', 'Manuel', 'Mena', '', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barberos`
--

CREATE TABLE `barberos` (
  `id` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `servicios` text COLLATE utf8_spanish_ci NOT NULL,
  `celular` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `clave` text COLLATE utf8_spanish_ci NOT NULL,
  `horarioE` time NOT NULL,
  `horarioS` time NOT NULL,
  `rol` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `barberos`
--

INSERT INTO `barberos` (`id`, `id_sede`, `apellido`, `nombre`, `servicios`, `celular`, `foto`, `usuario`, `clave`, `horarioE`, `horarioS`, `rol`) VALUES
(1, 1, 'Velez', 'Daniel', 'C_Moderno', '3669855', '', 'daniel1', '123', '00:00:00', '00:00:00', 'barbero'),
(2, 2, 'Osorio', 'Oscar', 'Otro', '3669988', '', 'osorio', '123', '00:00:00', '00:00:00', 'barbero'),
(3, 3, 'Liascos', 'Alex', 'C_Moderno', '', '', 'alex', '123', '00:00:00', '00:00:00', 'barbero'),
(4, 4, 'Puentes', 'Armando', 'C_Clasico', '', '', 'puentes', '123', '00:00:00', '00:00:00', 'barbero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `id_barbero` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nyaCli` text COLLATE utf8_spanish_ci NOT NULL,
  `celular` text COLLATE utf8_spanish_ci NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `id_barbero`, `id_sede`, `id_cliente`, `nyaCli`, `celular`, `inicio`, `fin`) VALUES
(21, 2, 2, 0, 'Juan  Fernann', '312111111', '2022-12-06 07:00:00', '2022-12-06 08:00:00'),
(22, 2, 2, 0, 'Juan  Fernann', '312111111', '2022-12-06 07:00:00', '2022-12-06 08:00:00'),
(23, 2, 2, 0, 'Juan  Fernann', '3659852', '2022-12-07 07:00:00', '2022-12-07 08:00:00'),
(24, 2, 2, 0, 'Galindo  Perez', '', '2022-12-08 07:00:00', '2022-12-08 08:00:00'),
(25, 2, 2, 0, 'Galindo  Perez', '', '2022-12-06 08:00:00', '2022-12-06 09:00:00'),
(26, 4, 4, 1, 'Juan Fernann', '312111111', '2022-12-13 08:00:00', '2022-12-13 09:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `celular` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `clave` text COLLATE utf8_spanish_ci NOT NULL,
  `rol` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `apellido`, `nombre`, `celular`, `documento`, `foto`, `usuario`, `clave`, `rol`) VALUES
(1, 'Fernann', 'Juan', '312111111', '1011145', '', 'juan22', '123', 'cliente'),
(2, 'Perez', 'Galindo', '444555888', '1234569', '', 'alberto', '123', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `nombre`) VALUES
(1, 'La Graciela'),
(2, 'La Pradera'),
(3, 'Boston'),
(4, 'Villa Alexandra');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `barberos`
--
ALTER TABLE `barberos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `barberos`
--
ALTER TABLE `barberos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
