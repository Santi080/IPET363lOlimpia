-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-09-2023 a las 19:45:55
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_llamada`
--

CREATE TABLE `registro_llamada` (
  `id_llamada` int(11) NOT NULL,
  `tipo_de_llamada` varchar(25) NOT NULL,
  `hubo_respuesta` varchar(25) NOT NULL,
  `duracion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_paciente`
--

CREATE TABLE `registro_paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `edad` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `sintomas` varchar(30) NOT NULL,
  `enfermero` varchar(30) NOT NULL,
  `ubicacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro_llamada`
--
ALTER TABLE `registro_llamada`
  ADD PRIMARY KEY (`id_llamada`);

--
-- Indices de la tabla `registro_paciente`
--
ALTER TABLE `registro_paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro_llamada`
--
ALTER TABLE `registro_llamada`
  MODIFY `id_llamada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_paciente`
--
ALTER TABLE `registro_paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
