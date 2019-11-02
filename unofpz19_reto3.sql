-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-11-2019 a las 17:39:19
-- Versión del servidor: 10.1.41-MariaDB
-- Versión de PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unofpz19_reto3`
--
CREATE DATABASE IF NOT EXISTS `unofpz19_reto3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `unofpz19_reto3`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spAllPcs`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spAllPcs` ()  NO SQL
SELECT *
FROM ordenadores$$

DROP PROCEDURE IF EXISTS `spAllReservas`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spAllReservas` ()  NO SQL
SELECT * FROM reservas$$

DROP PROCEDURE IF EXISTS `spAllReservedPcs`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spAllReservedPcs` ()  NO SQL
SELECT *
FROM lineasreservas$$

DROP PROCEDURE IF EXISTS `spAllUsers`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spAllUsers` ()  NO SQL
SELECT * from usuarios$$

DROP PROCEDURE IF EXISTS `spDeleteReserva`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spDeleteReserva` (IN `pId` INT)  NO SQL
DELETE FROM reservas WHERE reservas.id=pId$$

DROP PROCEDURE IF EXISTS `spDeleteUser`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spDeleteUser` (IN `pId` INT)  NO SQL
DELETE FROM `usuarios` WHERE usuarios.id=pId$$

DROP PROCEDURE IF EXISTS `spFechasByPcs`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spFechasByPcs` ()  NO SQL
SELECT lineasreservas.idOrdenador, GROUP_CONCAT(reservas.fechaUso) AS 'fechaUso'
FROM lineasreservas
LEFT JOIN reservas on lineasreservas.idReserva=reservas.id
GROUP BY lineasreservas.idOrdenador$$

DROP PROCEDURE IF EXISTS `spFindFechaUsoByIdReserva`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spFindFechaUsoByIdReserva` (IN `vIdReserva` INT)  NO SQL
SELECT reservas.fechaUso
FROM reservas
WHERE reservas.id=vIdReserva$$

DROP PROCEDURE IF EXISTS `spInsertLineasReserva`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spInsertLineasReserva` (IN `pIdOrdenador` INT, IN `pIdReserva` INT)  NO SQL
BEGIN
INSERT into lineasreservas (lineasreservas.idOrdenador, lineasreservas.idReserva)
VALUES(pIdOrdenador, pIdReserva);
END$$

DROP PROCEDURE IF EXISTS `spInsertReserva`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spInsertReserva` (IN `pFechaUso` DATE, IN `pNombre` VARCHAR(50), IN `pApellido` VARCHAR(50), IN `pNumTel` VARCHAR(9), IN `pDni` VARCHAR(9), IN `pPrecioTotal` DOUBLE)  NO SQL
BEGIN
INSERT into reservas(reservas.fechaReserva, reservas.fechaUso, reservas.nombreUsuario, reservas.apellidoUsuario, reservas.numTel, reservas.DNI, reservas.precioTotal )
VALUES(now(), pFechaUso, pNombre, pApellido, pNumTel, pDni, pPrecioTotal);

SELECT last_insert_id() as idReserva;
END$$

DROP PROCEDURE IF EXISTS `spInsertUser`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spInsertUser` (IN `pNombre` VARCHAR(50), IN `pContrasenia` VARCHAR(50), IN `pNickname` VARCHAR(50), IN `pResidencia` VARCHAR(50), IN `pEmail` VARCHAR(50))  NO SQL
BEGIN
INSERT INTO usuarios(usuarios.nombre,usuarios.contrasenia,usuarios.nickName, usuarios.residencia, usuarios.email)
VALUES (pNombre, pContrasenia, pNickname, pResidencia, pEmail);
END$$

DROP PROCEDURE IF EXISTS `spPcsByIdReserva`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spPcsByIdReserva` ()  NO SQL
SELECT lineasreservas.idReserva, GROUP_CONCAT(lineasreservas.idOrdenador) AS 'idOrdenador'
FROM lineasreservas
GROUP BY lineasreservas.idReserva$$

DROP PROCEDURE IF EXISTS `spUpdateReserva`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spUpdateReserva` (IN `pId` INT, IN `pFechaUso` DATE, IN `pNombreUser` VARCHAR(50), IN `pApelidoUser` VARCHAR(50), IN `pNumTel` VARCHAR(9), IN `pDni` VARCHAR(9), IN `pPrecioTotal` DOUBLE)  NO SQL
UPDATE reservas
SET reservas.fechaUso = pFechaUso, reservas.nombreUsuario = pNombreUser, reservas.apellidoUsuario= pApelidoUser, reservas.numTel = pNumTel, reservas.DNI = pDni, reservas.precioTotal = pPrecioTotal
WHERE reservas.id=pId$$

DROP PROCEDURE IF EXISTS `spUpdateUser`$$
CREATE DEFINER=`unofpz19_Ibaia`@`localhost` PROCEDURE `spUpdateUser` (IN `pId` INT, IN `pNombre` VARCHAR(50), IN `pContrasenia` VARCHAR(50), IN `pNickName` VARCHAR(50), IN `pResidencia` VARCHAR(50), IN `pEmail` VARCHAR(50))  NO SQL
UPDATE usuarios
SET usuarios.nombre = pNombre, usuarios.contrasenia = pContrasenia,usuarios.nickName=pNickName,usuarios.residencia=pResidencia,
usuarios.email=pEmail
WHERE usuarios.id=pId$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineasreservas`
--

DROP TABLE IF EXISTS `lineasreservas`;
CREATE TABLE `lineasreservas` (
  `idOrdenador` int(11) NOT NULL,
  `idReserva` int(11) NOT NULL,
  `nombreOrdenador` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenadores`
--

DROP TABLE IF EXISTS `ordenadores`;
CREATE TABLE `ordenadores` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ordenadores`
--

INSERT INTO `ordenadores` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `fechaReserva` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaUso` date NOT NULL,
  `nombreUsuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoUsuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numTel` int(9) NOT NULL,
  `DNI` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `precioTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `fechaReserva`, `fechaUso`, `nombreUsuario`, `apellidoUsuario`, `numTel`, `DNI`, `precioTotal`) VALUES
(4, '2019-10-22 00:00:00', '2019-10-24', 'Markel ', 'Rodriguez', 554852211, '4582169C', 50),
(10, '2019-10-23 14:20:01', '2019-10-25', 'Carlos', 'Isla', 6383838, '849165V', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(44) COLLATE utf8_unicode_ci NOT NULL,
  `contrasenia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nickName` varchar(44) COLLATE utf8_unicode_ci NOT NULL,
  `residencia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contrasenia`, `nickName`, `residencia`, `email`) VALUES
(4, 'Gotzon', 'sss', 'gogo', 'likitijo', 'adsdas@sada.com'),
(30, 'Carlos', 'aaa', 'Patata', 'areatza', 'ibai@ibai.com'),
(33, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lineasreservas`
--
ALTER TABLE `lineasreservas`
  ADD KEY `idUsuario` (`idOrdenador`),
  ADD KEY `idOrdenador` (`idReserva`);

--
-- Indices de la tabla `ordenadores`
--
ALTER TABLE `ordenadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ordenadores`
--
ALTER TABLE `ordenadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineasreservas`
--
ALTER TABLE `lineasreservas`
  ADD CONSTRAINT `lineasreservas_ibfk_1` FOREIGN KEY (`idReserva`) REFERENCES `reservas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lineasreservas_ibfk_2` FOREIGN KEY (`idOrdenador`) REFERENCES `ordenadores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
