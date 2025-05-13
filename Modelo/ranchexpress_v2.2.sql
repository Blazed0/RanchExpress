-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 10-05-2025 a las 03:34:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ranchexpress v2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
  `codigo_animal` varchar(70) NOT NULL,
  `especie` text NOT NULL,
  `peso` double NOT NULL,
  `sexo` text NOT NULL,
  `raza` text NOT NULL,
  `edad` float NOT NULL,
  `proposito` varchar(120) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen_animal` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`id_animal`, `codigo_animal`, `especie`, `peso`, `sexo`, `raza`, `edad`, `proposito`, `fecha_ingreso`, `imagen_animal`, `id_usuario`) VALUES
(1, '32000#2', 'Bovino', 367, 'Femenino', 'Brahaman', 3, 'Leche', '2025-05-01', '', 1),
(2, '32005#2', 'cabra', 325, 'Macho', 'No se', 3, 'Carne', '2025-05-05', '', 2),
(7, '32005#7', 'gallina', 12, 'Hembra', 'Si', 1, 'Huevos', '2025-05-05', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales_enanos`
--

CREATE TABLE `animales_enanos` (
  `id_animal_enano` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `nombre_area` varchar(50) NOT NULL,
  `peso_promedio` decimal(10,0) NOT NULL,
  `raza` text DEFAULT NULL,
  `imagen` varchar(255) NOT NULL,
  `id_suplementos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suplementos`
--

CREATE TABLE `suplementos` (
  `id_suplementos` int(11) NOT NULL,
  `nombre_suplemento` varchar(80) NOT NULL,
  `fabricante_suplemento` varchar(50) NOT NULL,
  `fecha_suministrada` date NOT NULL,
  `objetivo_sumplemento` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nit` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `rol` text NOT NULL DEFAULT 'Aprendiz'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nit`, `nombre`, `correo`, `clave`, `rol`) VALUES
(1, 1141514648, 'Instructor de prueba', 'pruebaInstructor@Gmail.com', 'pruebaInstructor35', 'Instructor'),
(2, 1141514649, 'Aprendiz Prueba', 'pruebaAprendiz@gmail.com', 'pruebaAprendiz37', 'Aprendiz'),
(3, 1141514642, 'Prueba Gallina', 'Sesdasd', 'pruebaGallina35', 'Aprendiz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `id_vacuna` int(11) NOT NULL,
  `fecha_caducidad` date NOT NULL,
  `fecha_aplicacion` date NOT NULL,
  `nombre_vacuna` varchar(120) NOT NULL,
  `proposito_vacuna` varchar(180) NOT NULL,
  `fabricante` varchar(80) NOT NULL,
  `id_animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`),
  ADD UNIQUE KEY `dueño vacas` (`id_usuario`);

--
-- Indices de la tabla `animales_enanos`
--
ALTER TABLE `animales_enanos`
  ADD PRIMARY KEY (`id_animal_enano`),
  ADD UNIQUE KEY `suplementos_aplicados` (`id_suplementos`);

--
-- Indices de la tabla `suplementos`
--
ALTER TABLE `suplementos`
  ADD PRIMARY KEY (`id_suplementos`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD PRIMARY KEY (`id_vacuna`),
  ADD UNIQUE KEY `vacunas animal` (`id_animal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animal`
--
ALTER TABLE `animal`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `animales_enanos`
--
ALTER TABLE `animales_enanos`
  MODIFY `id_animal_enano` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `suplementos`
--
ALTER TABLE `suplementos`
  MODIFY `id_suplementos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  MODIFY `id_vacuna` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD CONSTRAINT `vacuna_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
