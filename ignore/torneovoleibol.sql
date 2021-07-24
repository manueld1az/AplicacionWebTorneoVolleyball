-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2021 a las 21:50:52
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
  `Cod_Equipo1` int(3) DEFAULT NULL,
  `Nombre_Equipo1` varchar(22) DEFAULT NULL,
  `Ptos_Equipo1` int(4) DEFAULT NULL,
  `Cod_Equipo2` int(3) DEFAULT NULL,
  `Nombre_Equipo2` varchar(22) DEFAULT NULL,
  `Ptos_Equipo2` int(4) DEFAULT NULL,
  `Id_Juezuno` int(15) DEFAULT NULL,
  `Id_Juezdos` int(15) DEFAULT NULL,
  `Id_Jueztres` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encuentro`
--

INSERT INTO `encuentro` (`Cod_Encuentro`, `Grupo`, `Fecha`, `Hora`, `idCancha`, `Cod_Equipo1`, `Nombre_Equipo1`, `Ptos_Equipo1`, `Cod_Equipo2`, `Nombre_Equipo2`, `Ptos_Equipo2`, `Id_Juezuno`, `Id_Juezdos`, `Id_Jueztres`) VALUES
(1, 'A', '2021-07-24', '15:00:00', 1, 13, 'Nacional', NULL, 26, 'Politecnico', NULL, 13, 1323, 123),
(2, 'A', '2021-07-31', '17:00:00', 1, 20, 'La Magdalena', NULL, 16, 'La cachorras', NULL, 34, 13, 1323),
(3, 'A', '2021-07-31', '19:00:00', 1, 26, 'Politecnico', NULL, 20, 'La Magdalena', NULL, 13, 34, 123),
(4, 'A', '2021-08-07', '21:00:00', 1, 16, 'La cachorras', NULL, 13, 'Nacional', NULL, 34, 1323, 13),
(5, 'A', '2021-08-07', '15:00:00', 1, 13, 'Nacional', NULL, 20, 'La Magdalena', NULL, 13, 1323, 34),
(6, 'A', '2021-07-24', '17:00:00', 1, 26, 'Politecnico', NULL, 16, 'La cachorras', NULL, 34, 1323, 123),
(7, 'B', '2021-07-24', '19:00:00', 1, 7, 'Academico', NULL, 18, 'Presidente', NULL, 1323, 123, 34),
(8, 'B', '2021-07-31', '21:00:00', 1, 30, 'Mariscal', NULL, 22, 'Alto Bonito', NULL, 123, 34, 13),
(9, 'B', '2021-07-31', '15:00:00', 1, 18, 'Presidente', NULL, 30, 'Mariscal', NULL, 34, 123, 1323),
(10, 'B', '2021-08-07', '17:00:00', 1, 22, 'Alto Bonito', NULL, 7, 'Academico', NULL, 34, 13, 123),
(11, 'B', '2021-08-07', '19:00:00', 1, 7, 'Academico', NULL, 30, 'Mariscal', NULL, 1323, 34, 123),
(12, 'B', '2021-07-25', '21:00:00', 1, 18, 'Presidente', NULL, 22, 'Alto Bonito', NULL, 1323, 34, 123),
(13, 'C', '2021-07-25', '15:00:00', 1, 17, 'Brisas', NULL, 2, 'Las Santas', NULL, 34, 123, 1323),
(14, 'C', '2021-08-01', '17:00:00', 1, 28, 'Ita', NULL, 8, 'River', NULL, 1323, 123, 13),
(15, 'C', '2021-08-01', '19:00:00', 1, 2, 'Las Santas', NULL, 28, 'Ita', NULL, 123, 34, 13),
(16, 'C', '2021-08-08', '21:00:00', 1, 8, 'River', NULL, 17, 'Brisas', NULL, 13, 123, 1323),
(17, 'C', '2021-08-08', '15:00:00', 1, 17, 'Brisas', NULL, 28, 'Ita', NULL, 123, 34, 1323),
(18, 'C', '2021-07-25', '17:00:00', 1, 2, 'Las Santas', NULL, 8, 'River', NULL, 123, 1323, 13),
(19, 'D', '2021-07-25', '19:00:00', 1, 21, 'Palomera', NULL, 27, 'Los Andes', NULL, 13, 34, 123),
(20, 'D', '2021-08-01', '21:00:00', 1, 12, 'Independiente', NULL, 11, 'Barcca', NULL, 34, 13, 123),
(21, 'D', '2021-08-01', '15:00:00', 1, 27, 'Los Andes', NULL, 12, 'Independiente', NULL, 123, 34, 13),
(22, 'D', '2021-08-08', '17:00:00', 1, 11, 'Barcca', NULL, 21, 'Palomera', NULL, 1323, 34, 123),
(23, 'D', '2021-08-08', '19:00:00', 1, 21, 'Palomera', NULL, 12, 'Independiente', NULL, 1323, 123, 34),
(24, 'D', '2021-07-24', '21:00:00', 1, 27, 'Los Andes', NULL, 11, 'Barcca', NULL, 13, 123, 1323),
(25, 'E', '2021-07-24', '15:00:00', 1, 25, 'PaloBlanco', NULL, 14, 'Concejo', NULL, 34, 123, 1323),
(26, 'E', '2021-08-02', '17:00:00', 1, 5, 'casi no hay equipo', NULL, 24, 'Balboa', NULL, 13, 123, 1323),
(27, 'E', '2021-08-02', '19:00:00', 1, 14, 'Concejo', NULL, 5, 'casi no hay equipo', NULL, 1323, 13, 34),
(28, 'E', '2021-08-09', '21:00:00', 1, 24, 'Balboa', NULL, 25, 'PaloBlanco', NULL, 13, 1323, 34),
(29, 'E', '2021-08-09', '15:00:00', 1, 25, 'PaloBlanco', NULL, 5, 'casi no hay equipo', NULL, 34, 123, 13),
(30, 'E', '2021-07-26', '17:00:00', 1, 14, 'Concejo', NULL, 24, 'Balboa', NULL, 123, 34, 13),
(31, 'F', '2021-07-26', '19:00:00', 1, 10, 'Real', NULL, 23, 'Albergue', NULL, 123, 34, 1323),
(32, 'F', '2021-08-02', '21:00:00', 1, 19, 'La Habana', NULL, 4, 'pior es nada', NULL, 123, 34, 13),
(33, 'F', '2021-08-02', '15:00:00', 1, 23, 'Albergue', NULL, 19, 'La Habana', NULL, 34, 13, 1323),
(34, 'F', '2021-08-09', '17:00:00', 1, 4, 'pior es nada', NULL, 10, 'Real', NULL, 34, 1323, 123),
(35, 'F', '2021-08-09', '19:00:00', 1, 10, 'Real', NULL, 19, 'La Habana', NULL, 1323, 123, 34),
(36, 'F', '2021-07-27', '21:00:00', 1, 23, 'Albergue', NULL, 4, 'pior es nada', NULL, 13, 123, 34),
(37, 'G', '2021-07-27', '15:00:00', 1, 32, 'Marianas', NULL, 15, 'Porto', NULL, 13, 1323, 34),
(38, 'G', '2021-08-03', '17:00:00', 1, 9, 'Bocca', NULL, 1, 'las chiqui', NULL, 123, 34, 1323),
(39, 'G', '2021-08-03', '19:00:00', 1, 15, 'Porto', NULL, 9, 'Bocca', NULL, 13, 1323, 123),
(40, 'G', '2021-08-10', '21:00:00', 1, 1, 'las chiqui', NULL, 32, 'Marianas', NULL, 13, 1323, 123),
(41, 'G', '2021-08-10', '15:00:00', 1, 32, 'Marianas', NULL, 9, 'Bocca', NULL, 1323, 123, 34),
(42, 'G', '2021-07-27', '17:00:00', 1, 15, 'Porto', NULL, 1, 'las chiqui', NULL, 1323, 123, 13),
(43, 'H', '2021-07-27', '19:00:00', 1, 6, 'America', NULL, 31, 'Vinculo', NULL, 1323, 123, 34),
(44, 'H', '2021-08-03', '21:00:00', 1, 3, 'poderosas', NULL, 29, 'Comfandi', NULL, 34, 13, 1323),
(45, 'H', '2021-08-03', '15:00:00', 1, 31, 'Vinculo', NULL, 3, 'poderosas', NULL, 34, 1323, 123),
(46, 'H', '2021-08-10', '17:00:00', 1, 29, 'Comfandi', NULL, 6, 'America', NULL, 13, 123, 1323),
(47, 'H', '2021-08-10', '19:00:00', 1, 6, 'America', NULL, 3, 'poderosas', NULL, 1323, 34, 13),
(48, 'H', '2021-07-28', '21:00:00', 1, 31, 'Vinculo', NULL, 29, 'Comfandi', NULL, 13, 1323, 123),
(49, NULL, '2021-08-13', '12:00:00', 1, 16, 'La cachorras', NULL, 13, 'Nacional', NULL, 1323, 123, 13),
(50, NULL, '2021-08-13', '15:00:00', 1, 18, 'Presidente', NULL, 22, 'Alto Bonito', NULL, 1323, 123, 34),
(51, NULL, '2021-08-16', '12:00:00', 1, 2, 'Las Santas', NULL, 17, 'Brisas', NULL, 123, 13, 34),
(52, NULL, '2021-08-16', '15:00:00', 1, 27, 'Los Andes', NULL, 12, 'Independiente', NULL, 34, 13, 1323),
(53, NULL, '2021-08-19', '12:00:00', 1, 5, 'casi no hay equipo', NULL, 25, 'PaloBlanco', NULL, 123, 13, 1323),
(54, NULL, '2021-08-19', '15:00:00', 1, 23, 'Albergue', NULL, 10, 'Real', NULL, 13, 34, 123),
(55, NULL, '2021-08-22', '12:00:00', 1, 32, 'Marianas', NULL, 9, 'Bocca', NULL, 123, 13, 34),
(56, NULL, '2021-08-22', '15:00:00', 1, 31, 'Vinculo', NULL, 29, 'Comfandi', NULL, 34, 123, 13),
(57, NULL, '2021-08-25', '12:00:00', 1, 13, 'Nacional', NULL, 18, 'Presidente', NULL, 13, 1323, 123),
(58, NULL, '2021-08-25', '15:00:00', 1, 17, 'Brisas', NULL, 12, 'Independiente', NULL, 34, 1323, 13),
(59, NULL, '2021-08-28', '12:00:00', 1, 25, 'PaloBlanco', NULL, 10, 'Real', NULL, 34, 13, 1323),
(60, NULL, '2021-08-28', '15:00:00', 1, 32, 'Marianas', NULL, 31, 'Vinculo', NULL, 1323, 123, 34),
(61, NULL, '2021-08-31', '12:00:00', 1, 18, 'Presidente', NULL, 12, 'Independiente', NULL, 34, 123, 13),
(62, NULL, '2021-08-31', '15:00:00', 1, 10, 'Real', NULL, 31, 'Vinculo', NULL, 1323, 34, 13),
(63, NULL, '2021-09-03', '12:00:00', 1, 18, 'Presidente', NULL, 10, 'Real', NULL, 1323, 34, 123),
(64, NULL, '2021-09-03', '15:00:00', 1, 12, 'Independiente', NULL, 31, 'Vinculo', NULL, 123, 13, 1323);

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
(1, 1, 'Santa Teresita 7A', 'las chiqui', NULL, 27, 'G', NULL, NULL, NULL, NULL, NULL),
(2, 2, 'Santa Teresita 7B', 'Las Santas', 6, 9, 'C', 12, '3A', NULL, NULL, NULL),
(34, 3, 'Politecnico 6B', 'poderosas', NULL, 30, 'H', NULL, NULL, NULL, NULL, NULL),
(4, 4, 'Ita 6B', 'pior es nada', NULL, 23, 'F', NULL, NULL, NULL, NULL, NULL),
(35, 5, 'Presidente 6A', 'casi no hay equipo', 6, 18, 'E', 3, '5A', NULL, NULL, NULL),
(5, 6, 'Academico 6A', 'America', 14, 28, 'H', 6, NULL, NULL, NULL, NULL),
(37, 7, 'Academico 7B', 'Academico', NULL, 4, 'B', NULL, NULL, NULL, NULL, NULL),
(7, 8, 'Las Marianas 6B', 'River', NULL, 11, 'C', NULL, NULL, NULL, NULL, NULL),
(8, 9, 'Narciso Cabal Salcedo 6A', 'Bocca', 3, 26, 'G', 15, '7B', NULL, NULL, NULL),
(9, 10, 'Narciso Cabal Salcedo 7A', 'Real', NULL, 20, 'F', 3, '6B', '3B', '2A', '1B'),
(10, 11, 'Las Marianas 7A', 'Barcca', NULL, 15, 'D', NULL, NULL, NULL, NULL, NULL),
(11, 12, 'Mariscal Sucre 8B', 'Independiente', 11, 14, 'D', 21, '4B', '2B', '1B', '2A'),
(36, 13, 'Liceo Los Andes 6B', 'Nacional', 183, 0, 'A', 27, '1B', '1A', NULL, NULL),
(13, 14, 'Concejo Municipal 8A', 'Concejo', 3, 17, 'E', NULL, NULL, NULL, NULL, NULL),
(14, 15, 'Ita 6A', 'Porto', NULL, 25, 'G', NULL, NULL, NULL, NULL, NULL),
(15, 16, 'Politecnico 7B', 'La cachorras', 3916, 3, 'A', 6, '1A', NULL, NULL, NULL),
(16, 17, 'Brisas 6B', 'Brisas', 3, 8, 'C', 9, '3B', '2A', NULL, NULL),
(17, 18, 'Presidente 7A', 'Presidente', 33, 5, 'B', 3, '2A', '1B', '1A', '1A'),
(18, 19, 'La Habana 7B', 'La Habana', NULL, 22, 'F', NULL, NULL, NULL, NULL, NULL),
(19, 20, 'Magdalena 6A', 'La Magdalena', 3, 2, 'A', 30, NULL, NULL, NULL, NULL),
(20, 21, 'Palomera 6B', 'Palomera', NULL, 12, 'D', NULL, NULL, NULL, NULL, NULL),
(21, 22, 'Alto Bonito 6A', 'Alto Bonito', 28, 7, 'B', 18, '2B', NULL, NULL, NULL),
(22, 23, 'Liceo Los Andes 7A', 'Albergue', NULL, 21, 'F', 24, '6A', NULL, NULL, NULL),
(23, 24, 'Academico 6B', 'Balboa', 6, 19, 'E', 21, NULL, NULL, NULL, NULL),
(24, 25, 'Palo Blanco 6B', 'PaloBlanco', 6, 16, 'E', NULL, '5B', '3A', NULL, NULL),
(25, 26, 'Politecnico 8B', 'Politecnico', 0, 1, 'A', NULL, NULL, NULL, NULL, NULL),
(26, 27, 'Liceo Los Andes 6A', 'Los Andes', 12, 13, 'D', NULL, '4A', NULL, NULL, NULL),
(27, 28, 'Ita 7B', 'Ita', NULL, 10, 'C', NULL, NULL, NULL, NULL, NULL),
(28, 29, 'Comfandi 6A', 'Comfandi', 21, 31, 'H', NULL, '8B', NULL, NULL, NULL),
(29, 30, 'Mariscal Sucre 6A', 'Mariscal', NULL, 6, 'B', NULL, NULL, NULL, NULL, NULL),
(30, 31, 'Vinculo 6A', 'Vinculo', 39, 29, 'H', 9, '8A', '4B', '2B', '2B'),
(31, 32, 'Las Marianas 6A', 'Marianas', 16, 24, 'G', NULL, '7A', '4A', NULL, NULL);

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
(17, 13, 'Maria Castro', '2021-04-27', '1274231', 138, 27, NULL, NULL),
(18, 21, 'marcela dias', '2021-05-04', '2165122931', 5, 14, NULL, NULL),
(19, 123, 'Margarita Restrepo', '2021-05-06', '23423', 7, 11, NULL, NULL),
(16, 213, 'Cecilia Martinez', '2021-04-07', '2343', 2, 25, NULL, NULL),
(20, 1234, 'Celia Cruz', '2021-04-28', '32432', 9, 27, NULL, NULL),
(21, 5435, 'Verónica Tobón', '2021-05-13', '345345', 18, 14, NULL, NULL),
(23, 6788, 'Andrea Dominguez', '2021-05-12', '5785', 22, 11, NULL, NULL),
(25, 56756, 'Esperanza De Colombia', '2021-05-15', '45645', 6, 25, NULL, NULL),
(22, 65476, 'Dirlian Francisca Toro', '2021-04-30', '345345', 11, 27, NULL, NULL),
(28, 332455, 'Marcela Acosta', '2003-02-14', '3122222222', 0, 14, NULL, NULL),
(24, 678678, 'Sandra Marcela Ruiz', '2021-04-29', '678', 6, 11, NULL, NULL),
(27, 1998722, 'Sandra Valentina Vásquez', '2004-07-31', '32014323456', 6, 25, NULL, NULL),
(26, 11145677, 'Lina Maria Izaza', '2005-03-12', '3122352034', 26, 27, NULL, NULL);

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
