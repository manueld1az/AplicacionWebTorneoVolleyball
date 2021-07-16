-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2021 a las 18:40:57
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
  `Grupo` char(1) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `idCancha` int(11) DEFAULT NULL,
  `Cod_Equipo1` int(4) DEFAULT NULL,
  `Ptos_Equipo1` int(4) DEFAULT NULL,
  `Cod_Equipo2` int(4) DEFAULT NULL,
  `Ptos_Equipo2` int(4) DEFAULT NULL,
  `Id_Juezuno` int(15) DEFAULT NULL,
  `Id_Juezdos` int(15) DEFAULT NULL,
  `Id_Jueztres` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encuentro`
--

INSERT INTO `encuentro` (`Cod_Encuentro`, `Grupo`, `Fecha`, `Hora`, `idCancha`, `Cod_Equipo1`, `Ptos_Equipo1`, `Cod_Equipo2`, `Ptos_Equipo2`, `Id_Juezuno`, `Id_Juezdos`, `Id_Jueztres`) VALUES
(0, 'A', '2021-06-25', '14:00:00', 1, 13, NULL, 26, NULL, 34, 13, 123),
(1, 'A', '2021-06-25', '17:00:00', 1, 20, NULL, 16, NULL, 34, 1323, 13),
(2, 'A', '2021-07-01', '20:00:00', 1, 26, NULL, 20, NULL, 123, 13, 34),
(3, 'A', '2021-07-02', '23:00:00', 1, 16, 12, 13, 14, 13, 1323, 123),
(4, 'A', '2021-07-09', '14:00:00', 1, 13, NULL, 20, NULL, 13, 123, 34),
(5, 'A', '2021-07-04', '17:00:00', 1, 26, 0, 16, 9, 123, 34, 1323),
(6, 'B', '2021-06-25', '20:00:00', 1, 7, NULL, 18, NULL, 1323, 13, 123),
(7, 'B', '2021-06-25', '23:00:00', 1, 30, NULL, 22, NULL, 123, 1323, 13),
(8, 'B', '2021-07-08', '14:00:00', 1, 18, NULL, 30, NULL, 13, 1323, 123),
(9, 'B', '2021-07-02', '17:00:00', 1, 22, NULL, 7, NULL, 123, 13, 34),
(10, 'B', '2021-07-09', '20:00:00', 1, 7, NULL, 30, NULL, 13, 123, 1323),
(11, 'B', '2021-07-09', '23:00:00', 1, 18, NULL, 22, NULL, 34, 123, 13),
(12, 'C', '2021-06-26', '14:00:00', 1, 17, NULL, 2, NULL, 34, 1323, 123),
(13, 'C', '2021-06-26', '17:00:00', 1, 28, NULL, 8, NULL, 34, 123, 13),
(14, 'C', '2021-07-03', '20:00:00', 1, 2, NULL, 28, NULL, 34, 123, 13),
(15, 'C', '2021-07-03', '23:00:00', 1, 8, NULL, 17, NULL, 1323, 13, 34),
(16, 'C', '2021-07-10', '14:00:00', 1, 17, NULL, 28, NULL, 1323, 34, 123),
(17, 'C', '2021-07-10', '17:00:00', 1, 2, NULL, 8, NULL, 123, 13, 34),
(18, 'D', '2021-06-26', '20:00:00', 1, 21, NULL, 27, NULL, 123, 1323, 34),
(19, 'D', '2021-06-26', '23:00:00', 1, 12, NULL, 11, NULL, 34, 123, 13),
(20, 'D', '2021-07-03', '14:00:00', 1, 27, NULL, 12, NULL, 13, 1323, 34),
(21, 'D', '2021-07-03', '17:00:00', 1, 11, NULL, 21, NULL, 1323, 13, 123),
(22, 'D', '2021-07-10', '20:00:00', 1, 21, NULL, 12, NULL, 34, 13, 1323),
(23, 'D', '2021-07-10', '23:00:00', 1, 27, NULL, 11, NULL, 1323, 123, 13),
(24, 'E', '2021-06-27', '14:00:00', 1, 25, NULL, 14, NULL, 1323, 123, 34),
(25, 'E', '2021-06-27', '17:00:00', 1, 5, NULL, 24, NULL, 123, 1323, 13),
(26, 'E', '2021-07-04', '20:00:00', 1, 14, 3, 5, 6, 34, 13, 123),
(27, 'E', '2021-07-04', '23:00:00', 1, 24, NULL, 25, NULL, 34, 1323, 123),
(28, 'E', '2021-07-11', '14:00:00', 1, 25, NULL, 5, NULL, 1323, 123, 13),
(29, 'E', '2021-07-11', '17:00:00', 1, 14, NULL, 24, NULL, 13, 1323, 123),
(30, 'F', '2021-06-27', '20:00:00', 1, 10, NULL, 23, NULL, 123, 13, 34),
(31, 'F', '2021-06-27', '23:00:00', 1, 19, NULL, 4, NULL, 13, 1323, 123),
(32, 'F', '2021-07-04', '14:00:00', 1, 23, NULL, 19, NULL, 1323, 123, 34),
(33, 'F', '2021-07-04', '17:00:00', 1, 4, NULL, 10, NULL, 34, 123, 1323),
(34, 'F', '2021-07-11', '20:00:00', 1, 10, NULL, 19, NULL, 1323, 13, 123),
(35, 'F', '2021-07-11', '23:00:00', 1, 23, NULL, 4, NULL, 123, 34, 1323),
(36, 'G', '2021-06-28', '14:00:00', 1, 32, NULL, 15, NULL, 123, 34, 13),
(37, 'G', '2021-06-28', '17:00:00', 1, 9, NULL, 1, NULL, 1323, 13, 34),
(38, 'G', '2021-07-05', '20:00:00', 1, 15, NULL, 9, NULL, 34, 123, 1323),
(39, 'G', '2021-07-05', '23:00:00', 1, 1, NULL, 32, NULL, 34, 1323, 123),
(40, 'G', '2021-07-12', '14:00:00', 1, 32, NULL, 9, NULL, 123, 1323, 34),
(41, 'G', '2021-07-12', '17:00:00', 1, 15, NULL, 1, NULL, 123, 13, 1323),
(42, 'H', '2021-06-28', '20:00:00', 1, 6, NULL, 31, NULL, 123, 1323, 13),
(43, 'H', '2021-06-28', '23:00:00', 1, 3, NULL, 29, NULL, 123, 34, 13),
(44, 'H', '2021-07-05', '14:00:00', 1, 31, NULL, 3, NULL, 123, 34, 13),
(45, 'H', '2021-07-05', '17:00:00', 1, 29, NULL, 6, NULL, 13, 123, 1323),
(46, 'H', '2021-07-12', '20:00:00', 1, 6, NULL, 3, NULL, 1323, 123, 13),
(47, 'H', '2021-07-06', '23:00:00', 1, 31, 15, 29, 7, 13, 123, 34),
(48, NULL, '2021-07-15', '14:00:00', 1, 16, 13, 13, 3, 34, 13, 1323),
(49, NULL, '2021-07-15', '17:00:00', 1, 22, 13, 30, 3, 34, 13, 123),
(50, NULL, '2021-07-18', '14:00:00', 1, 2, 13, 17, 3, 13, 1323, 34),
(51, NULL, '2021-07-18', '17:00:00', 1, 27, 3, 12, 13, 1323, 123, 13),
(52, NULL, '2021-07-21', '14:00:00', 1, 5, 3, 25, 13, 13, 1323, 34),
(53, NULL, '2021-07-21', '17:00:00', 1, 23, 3, 10, 13, 123, 13, 1323),
(54, NULL, '2021-07-24', '14:00:00', 1, 32, 3, 9, NULL, 123, 1323, 34),
(55, NULL, '2021-07-24', '17:00:00', 1, 31, 32, 29, NULL, 123, 13, 1323),
(56, NULL, '2021-07-27', '14:00:00', 1, 13, 13, 22, 3, 34, 13, 1323),
(57, NULL, '2021-07-27', '17:00:00', 1, 2, 3, 27, 13, 13, 1323, 34),
(58, NULL, '2021-07-30', '14:00:00', 1, 5, 3, 23, 13, 34, 13, 123),
(59, NULL, '2021-07-30', '17:00:00', 1, 9, 13, 31, 3, 34, 123, 1323),
(60, NULL, '2021-08-02', '14:00:00', 1, 22, 13, 2, 3, 123, 13, 34),
(61, NULL, '2021-08-02', '17:00:00', 1, 23, 3, 31, 13, 123, 34, 13),
(62, NULL, '2021-08-05', '14:00:00', 1, 22, NULL, 23, NULL, 1323, 34, 123),
(63, NULL, '2021-08-05', '17:00:00', 1, 2, NULL, 31, NULL, 1323, 34, 13);

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
  `posicionSorteada` int(11) DEFAULT NULL,
  `grupo` char(1) DEFAULT NULL,
  `puntosPorPartido` int(11) DEFAULT NULL,
  `octavos` varchar(2) DEFAULT NULL,
  `cuartos` varchar(2) DEFAULT NULL,
  `semifinales` varchar(2) DEFAULT NULL,
  `finales` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`NumeroRegistro`, `Cod_Equipo`, `Nombre_Colegio`, `Nombre_Equipo`, `Ptos_Equipo`, `posicionSorteada`, `grupo`, `puntosPorPartido`, `octavos`, `cuartos`, `semifinales`, `finales`) VALUES
(1, 1, '1', '1', NULL, 27, 'G', NULL, NULL, NULL, NULL, NULL),
(2, 2, '2', '2', 6, 9, 'C', NULL, '3A', '2A', '1B', '2A'),
(34, 3, '3', '3', NULL, 30, 'H', NULL, NULL, NULL, NULL, NULL),
(4, 4, '4', '4', NULL, 23, 'F', NULL, NULL, NULL, NULL, NULL),
(35, 5, '5', '5', 6, 18, 'E', 3, '5A', '3A', NULL, NULL),
(5, 6, '6', '6', 14, 28, 'H', NULL, NULL, NULL, NULL, NULL),
(37, 7, '7', '7', NULL, 4, 'B', NULL, NULL, NULL, NULL, NULL),
(7, 8, '8', '8', NULL, 11, 'C', NULL, NULL, NULL, NULL, NULL),
(8, 9, '9', '9', 3, 26, 'G', NULL, '7B', '4A', NULL, NULL),
(9, 10, '10', '10', NULL, 20, 'F', NULL, '6B', NULL, NULL, NULL),
(10, 11, '11', '11', NULL, 15, 'D', NULL, NULL, NULL, NULL, NULL),
(11, 12, '12', '12', 11, 14, 'D', NULL, '4B', NULL, NULL, NULL),
(36, 13, '13', '13', 183, 0, 'A', NULL, '1B', '1A', NULL, NULL),
(13, 14, '14', '14', 3, 17, 'E', NULL, NULL, NULL, NULL, NULL),
(14, 15, '15', '15', NULL, 25, 'G', NULL, NULL, NULL, NULL, NULL),
(15, 16, '16', '16', 3916, 3, 'A', 6, '1A', NULL, NULL, NULL),
(16, 17, '17', '17', 3, 8, 'C', NULL, '3B', NULL, NULL, NULL),
(17, 18, '18', '18', NULL, 5, 'B', NULL, NULL, NULL, NULL, NULL),
(18, 19, '19', '19', NULL, 22, 'F', NULL, NULL, NULL, NULL, NULL),
(19, 20, '20', '20', 3, 2, 'A', NULL, NULL, NULL, NULL, NULL),
(20, 21, '21', '21', NULL, 12, 'D', NULL, NULL, NULL, NULL, NULL),
(21, 22, '22', '22', 6, 7, 'B', NULL, '2A', '1B', '1A', '1A'),
(22, 23, '23', '23', NULL, 21, 'F', NULL, '6A', '3B', '2A', '1B'),
(23, 24, '24', '24', 6, 19, 'E', NULL, NULL, NULL, NULL, NULL),
(24, 25, '25', '25', 6, 16, 'E', NULL, '5B', NULL, NULL, NULL),
(25, 26, '26', '26', 0, 1, 'A', NULL, NULL, NULL, NULL, NULL),
(26, 27, '27', '27', 12, 13, 'D', NULL, '4A', '2B', NULL, NULL),
(27, 28, '28', '28', NULL, 10, 'C', NULL, NULL, NULL, NULL, NULL),
(28, 29, '29', '29', 28, 31, 'H', NULL, '8B', NULL, NULL, NULL),
(29, 30, '30', '30', NULL, 6, 'B', NULL, '2B', NULL, NULL, NULL),
(30, 31, '31', '31', 54, 29, 'H', 12, '8A', '4B', '2B', '2B'),
(31, 32, '32', '32', 16, 24, 'G', NULL, '7A', NULL, NULL, NULL);

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
  `Cod_equipo` int(4) NOT NULL,
  `amarillas` int(11) DEFAULT NULL,
  `rojas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugadoras`
--

INSERT INTO `jugadoras` (`NumeroRegistro`, `Id_Jugadora`, `Nombre`, `FechaNacimiento`, `Telefono`, `Puntos_Anotados`, `Cod_equipo`, `amarillas`, `rojas`) VALUES
(17, 13, 'FDSGg', '2021-04-27', '1274231', 138, 30, NULL, NULL),
(18, 21, 'jhkjg', '2021-05-04', '2165122931', 0, 18, NULL, NULL),
(19, 123, 'dfgdf', '2021-05-06', '23423', 0, 29, NULL, NULL),
(16, 213, 'fghfhf', '2021-04-07', '2343', 2, 31, NULL, NULL),
(20, 1234, 'fgdgfd', '2021-04-28', '32432', 0, 29, NULL, NULL),
(21, 5435, 'ghfghh', '2021-05-13', '345345', 0, 29, NULL, NULL),
(23, 6788, 'fghgfhfg', '2021-05-12', '5785', 0, 32, NULL, NULL),
(25, 56756, 'gdhfh', '2021-05-15', '45645', 6, 12, NULL, NULL),
(22, 65476, 'ljhgkh', '2021-04-30', '345345', 0, 22, NULL, NULL),
(24, 678678, '7686', '2021-04-29', '678', 0, 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

CREATE TABLE `torneo` (
  `idTorneo` int(11) NOT NULL,
  `nombreTorneo` varchar(45) NOT NULL,
  `descripcionTorneo` varchar(300) DEFAULT NULL,
  `fechaInicio` date NOT NULL,
  `horaInicio` time NOT NULL,
  `rondaActual` int(11) NOT NULL,
  `cantidadEncuentrosDiarios` int(11) NOT NULL,
  `intervaloDiario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `torneo`
--

INSERT INTO `torneo` (`idTorneo`, `nombreTorneo`, `descripcionTorneo`, `fechaInicio`, `horaInicio`, `rondaActual`, `cantidadEncuentrosDiarios`, `intervaloDiario`) VALUES
(1193, 'Femenino del Valle Sub 18', 'torneo intercolegiado de la liga vallecaucana Sub 18', '2021-06-25', '14:00:00', 5, 4, 3);

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
  `NumeroRegistro` int(11) NOT NULL,
  `Cod_Set` int(8) NOT NULL,
  `Cod_Encuentro` int(6) NOT NULL,
  `Ptos_Equipo1` int(4) DEFAULT NULL,
  `Ptos_Equipo2` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zet`
--

INSERT INTO `zet` (`NumeroRegistro`, `Cod_Set`, `Cod_Encuentro`, `Ptos_Equipo1`, `Ptos_Equipo2`) VALUES
(1, 1, 3, 3, 0),
(2, 2, 3, 3, 0),
(3, 3, 3, 0, 4),
(4, 1, 5, 0, 3),
(5, 2, 5, 0, 3),
(6, 3, 5, 0, 3),
(7, 1, 26, 0, 3),
(8, 2, 26, 0, 3);

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
  ADD PRIMARY KEY (`Cod_Encuentro`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`Cod_Equipo`),
  ADD UNIQUE KEY `NumeroRegistro_UNIQUE` (`NumeroRegistro`),
  ADD UNIQUE KEY `posicionSorteada_UNIQUE` (`posicionSorteada`);

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
  ADD PRIMARY KEY (`NumeroRegistro`),
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
  MODIFY `NumeroRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `jueces`
--
ALTER TABLE `jueces`
  MODIFY `numeroRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT de la tabla `jugadoras`
--
ALTER TABLE `jugadoras`
  MODIFY `NumeroRegistro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuerpotecnico`
--
ALTER TABLE `cuerpotecnico`
  ADD CONSTRAINT `cuerpotecnico_ibfk_1` FOREIGN KEY (`Cod_equipo`) REFERENCES `equipos` (`Cod_Equipo`);

--
-- Filtros para la tabla `jugadoras`
--
ALTER TABLE `jugadoras`
  ADD CONSTRAINT `jugadoras_ibfk_1` FOREIGN KEY (`Cod_equipo`) REFERENCES `equipos` (`Cod_Equipo`);

--
-- Filtros para la tabla `zet`
--
ALTER TABLE `zet`
  ADD CONSTRAINT `zet_ibfk_1` FOREIGN KEY (`Cod_Encuentro`) REFERENCES `encuentro` (`Cod_Encuentro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
