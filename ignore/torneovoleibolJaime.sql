-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2021 a las 18:58:03
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

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
(18, 0, 'Mauricio Núñez', 'Técnico', '1991-02-16', '3122222222', NULL, 5),
(10, 10, 'Víctor Lozano', 'Técnico', '2021-03-30', '2342234', NULL, 1),
(11, 1112316, 'Diego Gómez', 'Técnico', '1980-06-12', '32014323456', NULL, 4);

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
(0, 'A', '2021-06-25', '14:00:00', 1, 13, NULL, 26, NULL, 1323, 34, 13),
(1, 'A', '2021-06-25', '17:00:00', 1, 20, NULL, 16, NULL, 1323, 13, 123),
(2, 'A', '2021-07-01', '20:00:00', 1, 26, NULL, 20, NULL, 1323, 13, 34),
(3, 'A', '2021-07-02', '23:00:00', 1, 16, 12, 13, 14, 34, 1323, 13),
(4, 'A', '2021-07-09', '14:00:00', 1, 13, NULL, 20, NULL, 34, 123, 1323),
(5, 'A', '2021-07-04', '17:00:00', 1, 26, 0, 16, 9, 13, 1323, 34),
(6, 'B', '2021-06-25', '20:00:00', 1, 7, NULL, 18, NULL, 1323, 34, 13),
(7, 'B', '2021-06-25', '23:00:00', 1, 30, NULL, 22, NULL, 13, 1323, 34),
(8, 'B', '2021-07-15', '14:00:00', 1, 18, NULL, 30, NULL, 34, 13, 1323),
(9, 'B', '2021-07-02', '17:00:00', 1, 22, NULL, 7, NULL, 123, 13, 34),
(10, 'B', '2021-07-09', '20:00:00', 1, 7, NULL, 30, NULL, 13, 123, 34),
(11, 'B', '2021-07-13', '23:00:00', 1, 18, 33, 22, 22, 1323, 34, 123),
(12, 'C', '2021-06-26', '14:00:00', 1, 17, NULL, 2, NULL, 1323, 34, 13),
(13, 'C', '2021-06-26', '17:00:00', 1, 28, NULL, 8, NULL, 34, 1323, 13),
(14, 'C', '2021-07-03', '20:00:00', 1, 2, NULL, 28, NULL, 123, 34, 13),
(15, 'C', '2021-07-03', '23:00:00', 1, 8, NULL, 17, NULL, 13, 123, 34),
(16, 'C', '2021-07-10', '14:00:00', 1, 17, NULL, 28, NULL, 123, 34, 13),
(17, 'C', '2021-07-10', '17:00:00', 1, 2, NULL, 8, NULL, 13, 34, 1323),
(18, 'D', '2021-06-26', '20:00:00', 1, 21, NULL, 27, NULL, 34, 1323, 13),
(19, 'D', '2021-06-26', '23:00:00', 1, 12, NULL, 11, NULL, 123, 13, 34),
(20, 'D', '2021-07-03', '14:00:00', 1, 27, NULL, 12, NULL, 1323, 123, 34),
(21, 'D', '2021-07-03', '17:00:00', 1, 11, NULL, 21, NULL, 123, 1323, 34),
(22, 'D', '2021-07-10', '20:00:00', 1, 21, NULL, 12, NULL, 123, 1323, 34),
(23, 'D', '2021-07-10', '23:00:00', 1, 27, NULL, 11, NULL, 13, 123, 1323),
(24, 'E', '2021-07-13', '14:00:00', 1, 25, NULL, 14, NULL, 123, 13, 34),
(25, 'E', '2021-06-27', '17:00:00', 1, 5, NULL, 24, NULL, 13, 1323, 34),
(26, 'E', '2021-07-04', '20:00:00', 1, 14, 3, 5, 6, 13, 123, 1323),
(27, 'E', '2021-07-04', '23:00:00', 1, 24, NULL, 25, NULL, 34, 13, 123),
(28, 'E', '2021-07-11', '14:00:00', 1, 25, NULL, 5, NULL, 123, 13, 1323),
(29, 'E', '2021-07-11', '17:00:00', 1, 14, NULL, 24, NULL, 1323, 34, 13),
(30, 'F', '2021-06-27', '20:00:00', 1, 10, NULL, 23, NULL, 34, 13, 1323),
(31, 'F', '2021-06-27', '23:00:00', 1, 19, NULL, 4, NULL, 123, 13, 1323),
(32, 'F', '2021-07-04', '14:00:00', 1, 23, NULL, 19, NULL, 34, 123, 13),
(33, 'F', '2021-07-04', '17:00:00', 1, 4, NULL, 10, NULL, 13, 123, 34),
(34, 'F', '2021-07-11', '20:00:00', 1, 10, NULL, 19, NULL, 13, 123, 34),
(35, 'F', '2021-07-11', '23:00:00', 1, 23, NULL, 4, NULL, 13, 1323, 123),
(36, 'G', '2021-06-28', '14:00:00', 1, 32, NULL, 15, NULL, 34, 123, 13),
(37, 'G', '2021-06-28', '17:00:00', 1, 9, NULL, 1, NULL, 13, 123, 34),
(38, 'G', '2021-07-05', '20:00:00', 1, 15, NULL, 9, NULL, 123, 34, 13),
(39, 'G', '2021-07-05', '23:00:00', 1, 1, NULL, 32, NULL, 1323, 34, 123),
(40, 'G', '2021-07-12', '14:00:00', 1, 32, NULL, 9, NULL, 13, 123, 1323),
(41, 'G', '2021-07-12', '17:00:00', 1, 15, NULL, 1, NULL, 34, 1323, 123),
(42, 'H', '2021-06-28', '20:00:00', 1, 6, NULL, 31, NULL, 13, 1323, 34),
(43, 'H', '2021-06-28', '23:00:00', 1, 3, NULL, 29, NULL, 123, 1323, 13),
(44, 'H', '2021-07-05', '14:00:00', 1, 31, NULL, 3, NULL, 34, 1323, 13),
(45, 'H', '2021-07-05', '17:00:00', 1, 29, NULL, 6, NULL, 13, 34, 123),
(46, 'H', '2021-07-12', '20:00:00', 1, 6, NULL, 3, NULL, 34, 13, 123),
(47, 'H', '2021-07-13', '13:00:00', 1, 31, 12, 29, 7, 34, 123, 13);

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
  `octavos` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`NumeroRegistro`, `Cod_Equipo`, `Nombre_Colegio`, `Nombre_Equipo`, `Ptos_Equipo`, `posicionSorteada`, `grupo`, `puntosPorPartido`, `octavos`) VALUES
(1, 1, 'Santa Teresita 7A', 'las chiqui', NULL, 27, 'G', NULL, NULL),
(2, 2, 'Santa Teresita 7B', 'Las Santas', 6, 9, 'C', 12, '3A'),
(34, 3, 'Politecnico 6B', 'poderosas', NULL, 30, 'H', NULL, NULL),
(4, 4, 'Ita 6B', 'pior es nada', NULL, 23, 'F', NULL, NULL),
(35, 5, 'Presidente 6A', 'casi no hay equipo', 6, 18, 'E', 3, '5A'),
(5, 6, 'Academico 6A', 'America', 14, 28, 'H', 6, '8B'),
(37, 7, 'Academico 7B', 'Academico', NULL, 4, 'B', NULL, NULL),
(7, 8, 'Las Marianas 6B', 'River', NULL, 11, 'C', NULL, NULL),
(8, 9, 'Narciso Cabal Salcedo 6A', 'Bocca', 3, 26, 'G', 15, '7B'),
(9, 10, 'Narciso Cabal Salcedo 7A', 'Real', NULL, 20, 'F', 3, '6B'),
(10, 11, 'Las Marianas 7A', 'Barcca', NULL, 15, 'D', NULL, NULL),
(11, 12, 'Mariscal Sucre 8B', 'Independiente', 11, 14, 'D', 21, '4B'),
(36, 13, 'Liceo Los Andes 6B', 'Nacional', 183, 0, 'A', 27, '1B'),
(13, 14, 'Concejo Municipal 8A', 'Concejo', 3, 17, 'E', NULL, NULL),
(14, 15, 'Ita 6A', 'Porto', NULL, 25, 'G', NULL, NULL),
(15, 16, 'Politecnico 7B', 'La cachorras', 3916, 3, 'A', 6, '1A'),
(16, 17, 'Brisas 6B', 'Brisas', 3, 8, 'C', 9, '3B'),
(17, 18, 'Presidente 7A', 'Presidente', 33, 5, 'B', 3, NULL),
(18, 19, 'La Habana 7B', 'La Habana', NULL, 22, 'F', NULL, NULL),
(19, 20, 'Magdalena 6A', 'La Magdalena', 3, 2, 'A', 30, '1B'),
(20, 21, 'Palomera 6B', 'Palomera', NULL, 12, 'D', NULL, NULL),
(21, 22, 'Alto Bonito 6A', 'Alto Bonito', 28, 7, 'B', 18, '2A'),
(22, 23, 'Liceo Los Andes 7A', 'Albergue', NULL, 21, 'F', 24, '6A'),
(23, 24, 'Academico 6B', 'Balboa', 6, 19, 'E', 21, '5B'),
(24, 25, 'Palo Blanco 6B', 'PaloBlanco', 6, 16, 'E', NULL, '5B'),
(25, 26, 'Politecnico 8B', 'Politecnico', 0, 1, 'A', NULL, NULL),
(26, 27, 'Liceo Los Andes 6A', 'Los Andes', 12, 13, 'D', NULL, '4A'),
(27, 28, 'Ita 7B', 'Ita', NULL, 10, 'C', NULL, NULL),
(28, 29, 'Comfandi 6A', 'Comfandi', 21, 31, 'H', NULL, '8B'),
(29, 30, 'Mariscal Sucre 6A', 'Mariscal', NULL, 6, 'B', NULL, '2B'),
(30, 31, 'Vinculo 6A', 'Vinculo', 39, 29, 'H', 9, '8A'),
(31, 32, 'Las Marianas 6A', 'Marianas', 16, 24, 'G', NULL, '7A');

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
(13, 13, 'Fernando Toro', 0),
(234, 34, 'Raul Hicapie', 0),
(9, 123, 'Cesar Vasquez', 234),
(3, 1323, 'Mario Moreno', 324);

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
(17, 13, 'Maria Castro', '2021-04-27', '1274231', 138, 31, NULL, NULL),
(18, 21, 'marcela dias', '2021-05-04', '2165122931', 5, 31, NULL, NULL),
(19, 123, 'Margarita Restrepo', '2021-05-06', '23423', 7, 29, NULL, NULL),
(16, 213, 'Cecilia Martinez', '2021-04-07', '2343', 2, 31, NULL, NULL),
(20, 1234, 'Celia Cruz', '2021-04-28', '32432', 9, 29, NULL, NULL),
(21, 5435, 'Verónica Tobón', '2021-05-13', '345345', 18, 29, NULL, NULL),
(23, 6788, 'Andrea Dominguez', '2021-05-12', '5785', 22, 32, NULL, NULL),
(25, 56756, 'Esperanza De Colombia', '2021-05-15', '45645', 6, 12, NULL, NULL),
(22, 65476, 'Dirlian Francisca Toro', '2021-04-30', '345345', 11, 22, NULL, NULL),
(28, 332455, 'Marcela Acosta', '2003-02-14', '3122222222', 0, 18, NULL, NULL),
(24, 678678, 'Sandra Marcela Ruiz', '2021-04-29', '678', 6, 21, NULL, NULL),
(27, 1998722, 'Sandra Valentina Vásquez', '2004-07-31', '32014323456', 6, 11, NULL, NULL),
(26, 11145677, 'Lina Maria Izaza', '2005-03-12', '3122352034', 26, 12, NULL, NULL);

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
  `fechaFin` date DEFAULT NULL,
  `horaFin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `torneo`
--

INSERT INTO `torneo` (`idTorneo`, `nombreTorneo`, `descripcionTorneo`, `fechaInicio`, `horaInicio`, `rondaActual`, `fechaFin`, `horaFin`) VALUES
(1193, 'Femenino del Valle Sub 18', 'torneo intercolegiado de la liga vallecaucana Sub 18', '0000-00-00', '00:00:00', 2, NULL, NULL);

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
(8, 2, 26, 0, 3),
(9, 3, 26, 3, 0),
(10, 1, 47, 0, 3),
(11, 2, 47, 3, 2),
(12, 3, 47, 3, 0),
(13, 1, 11, 10, 5),
(14, 2, 11, 15, 12),
(15, 3, 11, 8, 5);

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
  MODIFY `NumeroRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `NumeroRegistro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
