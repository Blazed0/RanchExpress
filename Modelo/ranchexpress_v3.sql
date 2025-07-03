-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 04-07-2025 a las 00:55:11
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
-- Base de datos: `ranchexpress_v3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
  `estado` text NOT NULL,
  `codigo_animal` varchar(70) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `proposito` varchar(180) NOT NULL,
  `peso_nacimiento` double(5,2) NOT NULL,
  `nombre` text NOT NULL,
  `raza` varchar(120) NOT NULL,
  `color` varchar(120) NOT NULL,
  `sexo` enum('Hembra','Macho') NOT NULL,
  `imagen_animal` varchar(255) NOT NULL,
  `especie` text NOT NULL,
  `etapa_edad` enum('Cria','Adulto') NOT NULL COMMENT 'si es adulto o una cria',
  `id_usuario` int(11) DEFAULT NULL,
  `id_padre` int(11) DEFAULT NULL,
  `id_madre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`id_animal`, `estado`, `codigo_animal`, `fecha_ingreso`, `fecha_nacimiento`, `proposito`, `peso_nacimiento`, `nombre`, `raza`, `color`, `sexo`, `imagen_animal`, `especie`, `etapa_edad`, `id_usuario`, `id_padre`, `id_madre`) VALUES
(11, 'activo', '463', '2025-07-04', '2025-07-01', 'Reproductor', 32.00, 'David', 'Alpino', 'Negro', 'Macho', '912647.webp', 'Caprino', 'Adulto', 1, NULL, NULL),
(12, 'Vivo', '112', '2025-07-26', '2025-07-01', 'Reproductor', 32.00, 'Prueba', 'Alpino', 'Negro', 'Hembra', 'aaaaaaaaaaaaaaaaaaaa.PNG', 'Ovino', 'Adulto', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lana`
--

CREATE TABLE `lana` (
  `id_produccion` int(11) NOT NULL,
  `kilos_producidos` double(100,3) DEFAULT NULL,
  `produccion_anual` double(100,3) DEFAULT NULL,
  `año_produccion` year(4) NOT NULL,
  `id_animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `lana`
--

INSERT INTO `lana` (`id_produccion`, `kilos_producidos`, `produccion_anual`, `año_produccion`, `id_animal`) VALUES
(1, 33.000, 33.000, '2025', 12),
(2, 43.000, 76.000, '2025', 12),
(3, 43.000, 119.000, '2025', 12),
(4, 55.000, 174.000, '2025', 12),
(5, 55.000, 229.000, '2025', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leche`
--

CREATE TABLE `leche` (
  `id_produccion` int(11) NOT NULL,
  `fecha_produccion` date NOT NULL,
  `litros_producidos` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peso`
--

CREATE TABLE `peso` (
  `id_peso` int(11) NOT NULL,
  `fecha_pesaje` date NOT NULL,
  `peso` double(5,2) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `id_animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `id_tratamiento` int(11) NOT NULL,
  `fecha_aplicacion` date NOT NULL,
  `diagnostico` varchar(180) NOT NULL,
  `nombre_tratamiento` varchar(180) NOT NULL,
  `observaciones` varchar(180) NOT NULL,
  `realizador` varchar(80) NOT NULL,
  `id_animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id_tratamiento`, `fecha_aplicacion`, `diagnostico`, `nombre_tratamiento`, `observaciones`, `realizador`, `id_animal`) VALUES
(7, '2025-07-03', 'Prueba', 'Prueba Tabla', 'Prueba de la tabla de tratamientos', 'Yo', 11),
(8, '2025-07-03', 'Prueba', 'Prueba Tabla', 'Prueba de la tabla de tratamientos', 'Yo', 11),
(9, '2025-07-03', 'Prueba', 'Prueba Tabla', 'Prueba de la tabla de tratamientos', 'Yo', 11),
(10, '2025-07-03', 'Prueba', 'Prueba Tabla', 'Prueba de la tabla de tratamientos', 'Yo 2', 11),
(11, '2025-07-03', '', '', '', '', 11),
(12, '2025-07-03', 'Prueba', 'Prueba Tabla', 'Prueba de la tabla de tratamientos', 'Yo Oveja', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nit` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `rol` enum('Visualizador','Encargado De Area') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nit`, `nombre`, `correo`, `clave`, `rol`) VALUES
(1, 1141514648, 'Instructor de prueba', 'Soxberg277@gmail.com', '$2y$10$6pnE1gLu8e4GzJLSuEnlIODoVCQFlGOZnNbnlYTrekwRrIS9xx/Oe', 'Encargado De Area');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `dueño vacas` (`id_usuario`) USING BTREE,
  ADD KEY `padres` (`id_padre`,`id_madre`),
  ADD KEY `id_madre` (`id_madre`);

--
-- Indices de la tabla `lana`
--
ALTER TABLE `lana`
  ADD PRIMARY KEY (`id_produccion`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Indices de la tabla `leche`
--
ALTER TABLE `leche`
  ADD PRIMARY KEY (`id_produccion`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Indices de la tabla `peso`
--
ALTER TABLE `peso`
  ADD PRIMARY KEY (`id_peso`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id_tratamiento`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animal`
--
ALTER TABLE `animal`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `lana`
--
ALTER TABLE `lana`
  MODIFY `id_produccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `leche`
--
ALTER TABLE `leche`
  MODIFY `id_produccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `peso`
--
ALTER TABLE `peso`
  MODIFY `id_peso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id_tratamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_4` FOREIGN KEY (`id_padre`) REFERENCES `animal` (`id_animal`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_ibfk_5` FOREIGN KEY (`id_madre`) REFERENCES `animal` (`id_animal`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_ibfk_6` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lana`
--
ALTER TABLE `lana`
  ADD CONSTRAINT `lana_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `leche`
--
ALTER TABLE `leche`
  ADD CONSTRAINT `leche_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peso`
--
ALTER TABLE `peso`
  ADD CONSTRAINT `peso_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD CONSTRAINT `tratamientos_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
