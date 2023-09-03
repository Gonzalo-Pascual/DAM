-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2023 a las 17:34:42
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acceso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospital`
--

CREATE TABLE `hospital` (
  `id_hospital` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hospital`
--

INSERT INTO `hospital` (`id_hospital`, `nombre`, `direccion`) VALUES
(1, 'Hospital 1', 'Av Europa'),
(2, 'Hospital 2', 'Av Nuevo Mundo'),
(4, 'Hospital 4', 'Av Sevilla'),
(9, 'Hospital 5', 'Av España'),
(11, 'Hospital 6', 'Av Guadarrama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `id_plantilla` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `especialidad` varchar(45) NOT NULL,
  `id_hospital` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id_plantilla`, `nombre`, `apellido`, `especialidad`, `id_hospital`) VALUES
(1, 'Maria', 'Gomez', 'Cabecera', 1),
(3, 'Pedro', 'Ruiz', 'Digestivo', 1),
(5, 'Juan', 'Perez', 'Cirugía', 11),
(10, 'Marcos', 'Diaz', 'Cardiología', 1),
(11, 'Hector', 'Muñoz', 'Dermatología', 9),
(12, 'Pepe', 'Sanchez', 'Cirugía', 4),
(13, 'David', 'Perez', 'Digestivo', 2),
(15, 'Pedro', 'Ruiz', 'Digestivo', 1),
(16, 'Pedro', 'Ruiz', 'Digestivo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `id_hospital` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id_sala`, `nombre`, `tipo`, `id_hospital`) VALUES
(1, 'Sala 2', 'Espera', 1),
(8, 'Sala 3', 'Cardiología', 11),
(9, 'Sala 9', 'Cirugía', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id_hospital`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`id_plantilla`),
  ADD KEY `id_hospital` (`id_hospital`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`),
  ADD KEY `id_hospital` (`id_hospital`),
  ADD KEY `id_hospital_2` (`id_hospital`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id_hospital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `id_plantilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD CONSTRAINT `plantilla_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospital` (`id_hospital`);

--
-- Filtros para la tabla `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `sala_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospital` (`id_hospital`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
