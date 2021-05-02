-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2021 a las 01:32:14
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `torneovoleibol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancha`
--

CREATE TABLE `cancha` (
  `idCancha` int(11) NOT NULL,
  `ubicacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cancha`
--

INSERT INTO `cancha` (`idCancha`, `ubicacion`) VALUES
(1, 'CALLE 13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuerpotecnico`
--

CREATE TABLE `cuerpotecnico` (
  `NumeroRegistro` int(11) NOT NULL,
  `id_Cuerpotecnico` int(15) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Cargo` varchar(20) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Amonestaciones` varchar(15) DEFAULT NULL,
  `Cod_equipo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuerpotecnico`
--

INSERT INTO `cuerpotecnico` (`NumeroRegistro`, `id_Cuerpotecnico`, `Nombre`, `Cargo`, `fechaNacimiento`, `Telefono`, `Amonestaciones`, `Cod_equipo`) VALUES
(10, 10, 'dgfg', 'dfgd', '2021-03-30', '2342', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuentro`
--

CREATE TABLE `encuentro` (
  `Cod_Encuentro` int(6) NOT NULL,
  `Grupo` int(4) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Cod_Equipo1` int(4) NOT NULL,
  `Ptos_Equipo1` int(4) NOT NULL,
  `Cod_Equipo2` int(4) NOT NULL,
  `Ptos_Equipo2` int(4) NOT NULL,
  `idCancha` int(11) NOT NULL,
  `Id_Juezuno` int(15) NOT NULL,
  `Id_Juezdos` int(15) NOT NULL,
  `Id_Jueztres` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encuentro`
--

INSERT INTO `encuentro` (`Cod_Encuentro`, `Grupo`, `Fecha`, `Hora`, `Cod_Equipo1`, `Ptos_Equipo1`, `Cod_Equipo2`, `Ptos_Equipo2`, `idCancha`, `Id_Juezuno`, `Id_Juezdos`, `Id_Jueztres`) VALUES
(1, 1, '2021-04-27', '00:00:00', 7, 0, 9, 0, 1, 34, 123, 1323),
(2, 1, '2021-04-27', '00:00:00', 25, 0, 10, 0, 1, 34, 123, 13),
(3, 1, '2021-04-27', '00:00:00', 9, 0, 25, 0, 1, 34, 1323, 13),
(4, 1, '2021-04-27', '00:00:00', 10, 0, 7, 0, 1, 123, 1323, 13),
(5, 1, '2021-04-27', '00:00:00', 7, 0, 25, 0, 1, 34, 123, 13),
(6, 1, '2021-04-28', '00:00:00', 9, 0, 10, 0, 1, 123, 34, 13),
(7, 1, '2021-04-28', '00:00:00', 5, 0, 16, 0, 1, 34, 13, 1323),
(8, 1, '2021-04-28', '00:00:00', 18, 0, 19, 0, 1, 1323, 123, 13),
(9, 1, '2021-04-28', '00:00:00', 16, 0, 18, 0, 1, 123, 34, 1323),
(10, 1, '2021-04-28', '00:00:00', 19, 0, 5, 0, 1, 123, 13, 34),
(11, 1, '2021-04-29', '00:00:00', 5, 0, 18, 0, 1, 34, 13, 1323),
(12, 1, '2021-04-29', '00:00:00', 16, 0, 19, 0, 1, 1323, 13, 34),
(13, 1, '2021-04-29', '00:00:00', 22, 0, 17, 0, 1, 123, 34, 1323),
(14, 1, '2021-04-29', '00:00:00', 2, 0, 20, 0, 1, 13, 123, 1323),
(15, 1, '2021-04-29', '00:00:00', 17, 0, 2, 0, 1, 13, 1323, 34),
(16, 1, '2021-04-30', '00:00:00', 20, 0, 22, 0, 1, 34, 1323, 123),
(17, 1, '2021-04-30', '00:00:00', 22, 0, 2, 0, 1, 123, 1323, 34),
(18, 1, '2021-04-30', '00:00:00', 17, 0, 20, 0, 1, 34, 13, 1323),
(19, 1, '2021-04-30', '00:00:00', 31, 0, 24, 0, 1, 123, 34, 1323),
(20, 1, '2021-04-30', '00:00:00', 27, 0, 12, 0, 1, 34, 13, 123),
(21, 1, '2021-05-01', '00:00:00', 24, 0, 27, 0, 1, 34, 123, 13),
(22, 1, '2021-05-01', '00:00:00', 12, 0, 31, 0, 1, 13, 34, 123),
(23, 1, '2021-05-01', '00:00:00', 31, 0, 27, 0, 1, 123, 34, 1323),
(24, 1, '2021-05-01', '00:00:00', 24, 0, 12, 0, 1, 1323, 13, 123),
(25, 1, '2021-05-01', '00:00:00', 6, 0, 13, 0, 1, 13, 1323, 123),
(26, 1, '2021-05-02', '00:00:00', 32, 0, 23, 0, 1, 34, 123, 13),
(27, 1, '2021-05-02', '00:00:00', 13, 0, 32, 0, 1, 1323, 13, 34),
(28, 1, '2021-05-02', '00:00:00', 23, 0, 6, 0, 1, 1323, 123, 13),
(29, 1, '2021-05-02', '00:00:00', 6, 0, 32, 0, 1, 34, 123, 13),
(30, 1, '2021-05-02', '00:00:00', 13, 0, 23, 0, 1, 34, 1323, 123),
(31, 1, '2021-05-03', '00:00:00', 26, 0, 11, 0, 1, 1323, 34, 123),
(32, 1, '2021-05-03', '00:00:00', 28, 0, 4, 0, 1, 123, 13, 1323),
(33, 1, '2021-05-03', '00:00:00', 11, 0, 28, 0, 1, 34, 123, 13),
(34, 1, '2021-05-03', '00:00:00', 4, 0, 26, 0, 1, 1323, 34, 13),
(35, 1, '2021-05-03', '00:00:00', 26, 0, 28, 0, 1, 123, 13, 1323),
(36, 1, '2021-05-04', '00:00:00', 11, 0, 4, 0, 1, 13, 1323, 123),
(37, 1, '2021-05-04', '00:00:00', 21, 0, 15, 0, 1, 123, 1323, 13),
(38, 1, '2021-05-04', '00:00:00', 30, 0, 1, 0, 1, 1323, 34, 123),
(39, 1, '2021-05-04', '00:00:00', 15, 0, 30, 0, 1, 34, 13, 1323),
(40, 1, '2021-05-04', '00:00:00', 1, 0, 21, 0, 1, 13, 34, 1323),
(41, 1, '2021-05-05', '00:00:00', 21, 0, 30, 0, 1, 13, 1323, 34),
(42, 1, '2021-05-05', '00:00:00', 15, 0, 1, 0, 1, 123, 13, 34),
(43, 1, '2021-05-05', '00:00:00', 14, 0, 8, 0, 1, 123, 13, 34),
(44, 1, '2021-05-05', '00:00:00', 3, 0, 29, 0, 1, 1323, 123, 13),
(45, 1, '2021-05-05', '00:00:00', 8, 0, 3, 0, 1, 13, 123, 1323),
(46, 1, '2021-05-06', '00:00:00', 29, 0, 14, 0, 1, 1323, 123, 13),
(47, 1, '2021-05-06', '00:00:00', 14, 0, 3, 0, 1, 1323, 123, 34),
(48, 1, '2021-05-06', '00:00:00', 8, 0, 29, 0, 1, 124, 13, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `NumeroRegistro` int(11) NOT NULL,
  `Cod_Equipo` int(4) NOT NULL,
  `Nombre_Colegio` varchar(30) DEFAULT NULL,
  `Nombre_Equipo` varchar(20) DEFAULT NULL,
  `Ptos_Equipo` int(4) DEFAULT NULL,
  `posicionSorteada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`NumeroRegistro`, `Cod_Equipo`, `Nombre_Colegio`, `Nombre_Equipo`, `Ptos_Equipo`, `posicionSorteada`) VALUES
(1, 1, '1', '1', NULL, 27),
(2, 2, '2', '2', NULL, 9),
(34, 3, '3', '3', NULL, 30),
(4, 4, '4', '4', NULL, 23),
(35, 5, '5', '5', NULL, 18),
(5, 6, '6', '6', NULL, 11),
(37, 7, '7', '7', NULL, NULL),
(7, 8, '8', '8', NULL, 26),
(8, 9, '9', '9', NULL, 0),
(9, 10, '10', '10', NULL, 16),
(10, 11, '11', '11', NULL, 15),
(11, 12, '12', '12', NULL, 14),
(36, 13, '13', '13', NULL, 7),
(13, 14, '14', '14', NULL, 17),
(14, 15, '15', '15', NULL, 25),
(15, 16, '16', '16', NULL, 3),
(16, 17, '17', '17', NULL, 8),
(17, 18, '18', '18', NULL, 5),
(18, 19, '19', '19', NULL, 22),
(19, 20, '20', '20', NULL, 2),
(20, 21, '21', '21', NULL, 21),
(21, 22, '22', '22', NULL, 28),
(22, 23, '23', '23', NULL, 19),
(23, 24, '24', '24', NULL, 31),
(24, 25, '25', '25', NULL, 1),
(25, 26, '26', '26', NULL, 29),
(26, 27, '27', '27', NULL, 13),
(27, 28, '28', '28', NULL, 10),
(28, 29, '29', '29', NULL, 4),
(29, 30, '30', '30', NULL, 6),
(30, 31, '31', '31', NULL, 20),
(31, 32, '32', '32', NULL, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `grupo` int(4) NOT NULL,
  `Id_Ronda` int(11) NOT NULL,
  `idTorneo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`grupo`, `Id_Ronda`, `idTorneo`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jueces`
--

CREATE TABLE `jueces` (
  `numeroRegistro` int(11) NOT NULL,
  `idJuez` int(15) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jueces`
--

INSERT INTO `jueces` (`numeroRegistro`, `idJuez`, `Nombre`, `Telefono`) VALUES
(13, 13, 'gfh', 0),
(234, 34, 'dfg', 0),
(9, 123, 'sfs', 234),
(3, 1323, 'FGDGD', 324);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadoras`
--

CREATE TABLE `jugadoras` (
  `NumeroRegistro` int(5) NOT NULL,
  `Id_Jugadora` int(15) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Puntos_Anotados` int(4) NOT NULL,
  `Cod_equipo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugadoras`
--

INSERT INTO `jugadoras` (`NumeroRegistro`, `Id_Jugadora`, `Nombre`, `FechaNacimiento`, `Telefono`, `Puntos_Anotados`, `Cod_equipo`) VALUES
(16, 213, 'fghfhf', '2021-04-07', '2343', 0, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntaje`
--

CREATE TABLE `puntaje` (
  `NumeroRegistro` int(11) NOT NULL,
  `puntos` int(11) DEFAULT NULL,
  `idJugadora` int(11) NOT NULL,
  `codigoEquipo` int(11) NOT NULL,
  `codigoEncuentro` int(11) NOT NULL,
  `codigoSet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntaje`
--

INSERT INTO `puntaje` (`NumeroRegistro`, `puntos`, `idJugadora`, `codigoEquipo`, `codigoEncuentro`, `codigoSet`) VALUES
(2, 222, 213, 12, 21, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

CREATE TABLE `torneo` (
  `idTorneo` int(11) NOT NULL,
  `nombreTorneo` varchar(45) NOT NULL,
  `descripcionTorneo` varchar(300) DEFAULT NULL,
  `fechaInicio` date NOT NULL,
  `HoraInicio` time NOT NULL,
  `fechaFin` date NOT NULL,
  `horaFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) DEFAULT NULL,
  `nombre` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `cedula` varchar(30) NOT NULL,
  `celular` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zet`
--

CREATE TABLE `zet` (
  `NumeroRegistro` int(11) DEFAULT NULL,
  `Cod_Set` int(8) NOT NULL,
  `Cod_Encuentro` int(6) NOT NULL,
  `Ptos_Equipo1` int(4) DEFAULT NULL,
  `Ptos_Equipo2` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zet`
--

INSERT INTO `zet` (`NumeroRegistro`, `Cod_Set`, `Cod_Encuentro`, `Ptos_Equipo1`, `Ptos_Equipo2`) VALUES
(2, 1, 1, 12, 21),
(5, 2, 2, 2, 2),
(3, 3, 3, 3, 3),
(1, 5, 5, 5, 5),
(4, 12, 12, 12, 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cancha`
--
ALTER TABLE `cancha`
  ADD PRIMARY KEY (`idCancha`);

--
-- Indices de la tabla `cuerpotecnico`
--
ALTER TABLE `cuerpotecnico`
  ADD PRIMARY KEY (`id_Cuerpotecnico`),
  ADD UNIQUE KEY `NumeroRegistro_UNIQUE` (`NumeroRegistro`),
  ADD KEY `Cod_equipo` (`Cod_equipo`);

--
-- Indices de la tabla `encuentro`
--
ALTER TABLE `encuentro`
  ADD PRIMARY KEY (`Cod_Encuentro`),
  ADD KEY `Cod_Equipo1` (`Cod_Equipo1`),
  ADD KEY `Cod_Equipo2` (`Cod_Equipo2`),
  ADD KEY `Id_Juezuno` (`Id_Juezuno`),
  ADD KEY `Id_Juezdos` (`Id_Juezdos`),
  ADD KEY `Id_Jueztres` (`Id_Jueztres`),
  ADD KEY `Num_ronda` (`Grupo`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`Cod_Equipo`),
  ADD UNIQUE KEY `NumeroRegistro_UNIQUE` (`NumeroRegistro`),
  ADD UNIQUE KEY `posicionSorteada_UNIQUE` (`posicionSorteada`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`grupo`),
  ADD KEY `idTorneo_idx` (`idTorneo`);

--
-- Indices de la tabla `jueces`
--
ALTER TABLE `jueces`
  ADD PRIMARY KEY (`idJuez`),
  ADD UNIQUE KEY `numeroRegistro_UNIQUE` (`numeroRegistro`);

--
-- Indices de la tabla `jugadoras`
--
ALTER TABLE `jugadoras`
  ADD PRIMARY KEY (`Id_Jugadora`),
  ADD UNIQUE KEY `NumeroRegistro_UNIQUE` (`NumeroRegistro`),
  ADD KEY `Cod_equipo` (`Cod_equipo`);

--
-- Indices de la tabla `puntaje`
--
ALTER TABLE `puntaje`
  ADD PRIMARY KEY (`NumeroRegistro`),
  ADD KEY `idJugadora_idx` (`idJugadora`),
  ADD KEY `Cod_Equipo_idx` (`codigoEquipo`),
  ADD KEY `codigoEncuentro_idx` (`codigoEncuentro`),
  ADD KEY `Con_Set_idx` (`codigoSet`);

--
-- Indices de la tabla `torneo`
--
ALTER TABLE `torneo`
  ADD PRIMARY KEY (`idTorneo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `cedula_UNIQUE` (`cedula`);

--
-- Indices de la tabla `zet`
--
ALTER TABLE `zet`
  ADD PRIMARY KEY (`Cod_Set`),
  ADD KEY `Cod_Encuentro` (`Cod_Encuentro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cancha`
--
ALTER TABLE `cancha`
  MODIFY `idCancha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cuerpotecnico`
--
ALTER TABLE `cuerpotecnico`
  MODIFY `NumeroRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `NumeroRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `jueces`
--
ALTER TABLE `jueces`
  MODIFY `numeroRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT de la tabla `jugadoras`
--
ALTER TABLE `jugadoras`
  MODIFY `NumeroRegistro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `torneo`
--
ALTER TABLE `torneo`
  MODIFY `idTorneo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuerpotecnico`
--
ALTER TABLE `cuerpotecnico`
  ADD CONSTRAINT `cuerpotecnico_ibfk_1` FOREIGN KEY (`Cod_equipo`) REFERENCES `equipos` (`Cod_Equipo`);

--
-- Filtros para la tabla `encuentro`
--
ALTER TABLE `encuentro`
  ADD CONSTRAINT `encuentro_ibfk_1` FOREIGN KEY (`Cod_Equipo1`) REFERENCES `equipos` (`Cod_Equipo`),
  ADD CONSTRAINT `encuentro_ibfk_2` FOREIGN KEY (`Cod_Equipo2`) REFERENCES `equipos` (`Cod_Equipo`),
  ADD CONSTRAINT `encuentro_ibfk_6` FOREIGN KEY (`Grupo`) REFERENCES `grupo` (`grupo`);

--
-- Filtros para la tabla `jugadoras`
--
ALTER TABLE `jugadoras`
  ADD CONSTRAINT `jugadoras_ibfk_1` FOREIGN KEY (`Cod_equipo`) REFERENCES `equipos` (`Cod_Equipo`);

--
-- Filtros para la tabla `puntaje`
--
ALTER TABLE `puntaje`
  ADD CONSTRAINT `Cod_Equipo` FOREIGN KEY (`codigoEquipo`) REFERENCES `equipos` (`Cod_Equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Con_Set` FOREIGN KEY (`codigoSet`) REFERENCES `zet` (`Cod_Set`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `codigoEncuentro` FOREIGN KEY (`codigoEncuentro`) REFERENCES `encuentro` (`Cod_Encuentro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idJugadora` FOREIGN KEY (`idJugadora`) REFERENCES `jugadoras` (`Id_Jugadora`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
