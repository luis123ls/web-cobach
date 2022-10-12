-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2022 a las 08:31:06
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `financiera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `evento` varchar(100) DEFAULT NULL,
  `color_evento` varchar(80) DEFAULT NULL,
  `fecha_inicio` varchar(80) DEFAULT NULL,
  `fecha_fin` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calendar`
--

INSERT INTO `calendar` (`id`, `evento`, `color_evento`, `fecha_inicio`, `fecha_fin`) VALUES
(10, 'Hola Estamos Realizando Un Evento', '#FFC107', '2022-10-13', '2022-10-14'),
(11, 'Jsjsjjs', '#FF5722', '2022-10-12', '2022-10-13'),
(12, 'Rrrrr', '#FF5722', '2022-10-11', '2022-10-12'),
(13, 'HOLAHKLADNAMD', '#FF5722', '2022-10-12', '2022-10-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombreC` varchar(100) DEFAULT NULL,
  `direC` varchar(100) DEFAULT NULL,
  `teleC` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `curp` varchar(50) DEFAULT NULL,
  `rfc` varchar(50) DEFAULT NULL,
  `fechaC` varchar(50) DEFAULT NULL,
  `lugarNC` varchar(100) DEFAULT NULL,
  `beneC` varchar(100) DEFAULT NULL,
  `nombreB` varchar(100) DEFAULT NULL,
  `direcB` varchar(50) DEFAULT NULL,
  `teleB` varchar(20) DEFAULT NULL,
  `emailB` varchar(30) DEFAULT NULL,
  `curpB` varchar(25) DEFAULT NULL,
  `rfcB` varchar(25) DEFAULT NULL,
  `fechaNB` varchar(30) DEFAULT NULL,
  `lugarNB` varchar(100) DEFAULT NULL,
  `banco` varchar(30) DEFAULT NULL,
  `claveI` varchar(30) DEFAULT NULL,
  `fechaF` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombreC`, `direC`, `teleC`, `email`, `curp`, `rfc`, `fechaC`, `lugarNC`, `beneC`, `nombreB`, `direcB`, `teleB`, `emailB`, `curpB`, `rfcB`, `fechaNB`, `lugarNB`, `banco`, `claveI`, `fechaF`) VALUES
(31, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizador`
--

CREATE TABLE `cotizador` (
  `id_cotizador` int(11) NOT NULL,
  `inversio` int(50) DEFAULT NULL,
  `plazo` varchar(50) DEFAULT NULL,
  `tMensual` varchar(50) DEFAULT NULL,
  `tAnual` varchar(50) DEFAULT NULL,
  `tnmensual` varchar(50) DEFAULT NULL,
  `tnAnual` varchar(50) DEFAULT NULL,
  `rPeriodo` varchar(50) DEFAULT NULL,
  `mFinal` varchar(50) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `numPago` varchar(50) DEFAULT NULL,
  `mInvertido` varchar(50) DEFAULT NULL,
  `pagoMensual` varchar(50) DEFAULT NULL,
  `tasaNeta` varchar(50) DEFAULT NULL,
  `ivaT` varchar(50) DEFAULT NULL,
  `rendimiento` varchar(50) DEFAULT NULL,
  `abonoCapital` varchar(50) DEFAULT NULL,
  `saldo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partnerpdf`
--

CREATE TABLE `partnerpdf` (
  `id_jr` int(11) NOT NULL,
  `inversionT` varchar(50) DEFAULT NULL,
  `plazo` varchar(50) DEFAULT NULL,
  `rTotal` varchar(50) DEFAULT NULL,
  `mFinal` varchar(50) DEFAULT NULL,
  `tMensual` varchar(50) DEFAULT NULL,
  `tAnual` varchar(50) DEFAULT NULL,
  `tnMensual` varchar(50) DEFAULT NULL,
  `tnAnual` varchar(50) DEFAULT NULL,
  `fecha` varchar(80) DEFAULT NULL,
  `mes` varchar(20) DEFAULT NULL,
  `mInvertido` varchar(50) DEFAULT NULL,
  `tNeta` varchar(50) DEFAULT NULL,
  `iva` varchar(50) DEFAULT NULL,
  `rendimiento` varchar(50) DEFAULT NULL,
  `dCapital` varchar(50) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `f_perfil` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fechaN` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `Cpostal` int(11) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `nombre`, `pwd`, `f_perfil`, `email`, `fechaN`, `telefono`, `ciudad`, `estado`, `Cpostal`, `Direccion`, `tipo`) VALUES
(27, 'Victor Luis', 'e10adc3949ba59abbe56e057f20f883e', 'w.png', 'luisvdg.03@gmail.com', '2022-08-17', '2147483647', 'Rayon', '9191561018', 29740, 'C 15 De Esquipulas', 1),
(28, 'Diaz Luis', 'c4ca4238a0b923820dcc509a6f75849b', 'nosabino.png', 'vdiazgomez.83@gmail.com', '2022-09-26', '9191571389', 'Rayon', '12', 29740, 'C 15 De Esquipulas', 1),
(30, 'hola', '202cb962ac59075b964b07152d234b70', 'luis.jpg', 'vdiazgomez.83@hotmail.com', '12121-12-12', '9191371983', 'Rayon', 'e', 12133, 'Centralita', 1),
(31, 'hola', '502ff82f7f1f8218dd41201fe4353687', 'tequi.jpg', '1', '0001-01-01', '9191371983', '3', '4', 5, '6', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `cotizador`
--
ALTER TABLE `cotizador`
  ADD PRIMARY KEY (`id_cotizador`);

--
-- Indices de la tabla `partnerpdf`
--
ALTER TABLE `partnerpdf`
  ADD PRIMARY KEY (`id_jr`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `cotizador`
--
ALTER TABLE `cotizador`
  MODIFY `id_cotizador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partnerpdf`
--
ALTER TABLE `partnerpdf`
  MODIFY `id_jr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `partnerpdf`
--
ALTER TABLE `partnerpdf`
  ADD CONSTRAINT `partnerpdf_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
