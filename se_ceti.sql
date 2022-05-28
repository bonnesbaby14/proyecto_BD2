-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2022 a las 22:56:16
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `se_ceti`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id` int(11) NOT NULL,
  `idgrupo` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `primer_parcial` double DEFAULT 0,
  `segundo_parcial` double DEFAULT 0,
  `tercer_parcial` double DEFAULT 0,
  `idmateria` int(11) DEFAULT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id`, `idgrupo`, `iduser`, `primer_parcial`, `segundo_parcial`, `tercer_parcial`, `idmateria`, `activo`) VALUES
(1, 2, 2, NULL, NULL, NULL, 4, 0),
(2, 2, 4, NULL, NULL, NULL, 3, 0),
(3, 3, 15, NULL, NULL, NULL, 6, 1),
(4, 3, 1, 1, 2, 3, 6, 1),
(5, 2, 1, 0, 0, 0, 3, 1),
(6, 2, 10, 0, 0, 0, 3, 0),
(7, 2, 10, 0, 0, 0, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `activo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `activo`) VALUES
(1, 'CIENCIAS BASICAS', 'ESTA ES UNA DESCRICION DE CIENCIA BASICA', 1),
(2, 'ADMINISTRATIVAS', 'ESTA ES LA DESCROCION DE  LAS ADMINISTRATIVAS', 1),
(3, 'Neva', 'ieasss', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `grado` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `nombre`, `fecha`, `grado`, `activo`) VALUES
(1, 'dmeossssaaaa', '2022-05-26 03:30:46', 2, 0),
(2, 'numro ', '2022-05-27 07:43:33', 2, 1),
(3, 'test ', '2022-05-28 10:27:01', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`, `idcategoria`, `activo`) VALUES
(3, 'MATEMATICAS', 2, 1),
(4, 'DISEÑO INDUSTRIAL editado ', 2, 1),
(5, 'español', 1, 0),
(6, 'test', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `registro` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `grado` int(11) DEFAULT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `user`, `password`, `nombre`, `apellidos`, `registro`, `tipo`, `grado`, `activo`) VALUES
(1, 'uno', 'uno', 'uno', 'uno', 'uno', 'alumno', 1, 1),
(2, 'dos', 'dos', 'dos', 'dos', 'dos', 'maestro', 1, 1),
(3, 'tres', 'tres', 'tres', 'tres', 'tres', 'admin', NULL, 0),
(4, 'nuevo', '827ccb0eea8a706c4c34a16891f84e7b', 'nuevo', '', 'nueva', 'maestro', NULL, 1),
(5, 'ssss', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'maestro', NULL, 0),
(6, 'frnac', '6dd1411a66159040b7fff30d0097dbe4', 'franco', 'franco', 'franco', 'maestro', NULL, 0),
(7, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo', 'demo', 'demo', 'maestro', NULL, 0),
(8, '2demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo', 'demo', 'demo', 'maestro', NULL, 0),
(9, 'alumno', 'c6865cf98b133f1f3de596a4a2894630', 'alumno', 'alumno', 'alumno', 'alumno', 1, 1),
(10, 'alumno', 'e61e7de603852182385da5e907b4b232', 'hhh', 'hhhh', 'hhh', 'alumno', 1, 1),
(11, 'admin edtitado', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin', 'admin', NULL, 1),
(12, 'sss', 'd41d8cd98f00b204e9800998ecf8427e', 'sss', '', '', 'admin', NULL, 0),
(13, 'ddd', '1234', 'ddd', 'ddd', 'ddd', 'maestro', NULL, 1),
(14, 'WS', '1234', 'WS', 'SS', 'SS', 'maestro', NULL, 0),
(15, 'test', '1234', 'test', 'test', 'test', 'maestro', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`iduser`),
  ADD KEY `grupo` (`idgrupo`),
  ADD KEY `materia` (`idmateria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`idcategoria`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `grupo` FOREIGN KEY (`idgrupo`) REFERENCES `grupo` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `materia` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
