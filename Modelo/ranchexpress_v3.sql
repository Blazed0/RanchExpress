-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2025 a las 00:18:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

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
  `id_usuario` int(11) NOT NULL,
  `id_padre` int(11) DEFAULT NULL,
  `id_madre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`id_animal`, `estado`, `codigo_animal`, `fecha_ingreso`, `fecha_nacimiento`, `proposito`, `peso_nacimiento`, `nombre`, `raza`, `color`, `sexo`, `imagen_animal`, `especie`, `etapa_edad`, `id_usuario`, `id_padre`, `id_madre`) VALUES
(35, 'muerto', '115', '2025-06-09', '2025-06-01', 'Reproductor', 32.00, 'Correccion', 'Alpino', 'Negro', 'Hembra', 'Mob.jpeg', 'Ovino', 'Cria', 1, NULL, NULL),
(36, 'activo', '111', '2025-06-24', '2025-06-24', 'Lana', 22.00, 'Ezio', 'Criolla', 'Blanco', 'Macho', 'oveja1.jpg', 'Ovino', 'Adulto', 12, NULL, NULL),
(37, 'activo', '112', '2025-06-24', '2025-06-24', 'Reproductor', 22.00, 'Carla', 'Criolla', 'Blanco', 'Hembra', 'oveja2.jpg', 'Ovino', 'Adulto', 12, NULL, NULL),
(38, 'activo', '113', '2025-06-24', '2025-06-24', 'Reproductor', 21.00, 'Cj', 'Criolla', 'Negro', 'Macho', 'oveja3.png', 'Ovino', 'Cria', 12, NULL, NULL),
(39, 'activo', '90', '2025-06-24', '2025-06-24', 'Leche', 30.00, 'Goat', 'Criolla', 'Cafe', 'Macho', 'cabra1.jpg', 'Caprino', 'Adulto', 12, 38, NULL),
(40, 'activo', '93', '2025-06-24', '2025-06-24', 'Leche', 5.00, 'Sweet', 'Criolla', 'Blanco', 'Macho', 'cabra2.webp', 'Caprino', 'Cria', 12, 38, NULL),
(41, 'activo', '94', '2025-06-24', '2025-06-24', 'Reproductor', 25.00, 'kendal', 'Criolla', 'Blanco', 'Hembra', 'cabra3.jpg', 'Caprino', 'Adulto', 12, NULL, NULL),
(42, 'activo', '92', '2025-06-24', '2025-06-24', 'Reproductor', 22.00, 'Luis', 'Criolla', 'Cafe', 'Macho', 'cabra4.jpg', 'Caprino', 'Adulto', 12, NULL, NULL),
(43, 'activo', '91', '2025-06-25', '2025-06-25', 'Leche', 11.00, 'Cata', 'Criollo', 'Blanca', 'Hembra', 'cabra3.jpg', 'Caprino', 'Adulto', 12, NULL, NULL),
(44, 'activo', '96', '2025-06-25', '2025-06-25', 'Leche', 22.00, 'Catalina', 'Criollo', 'Blanca', 'Hembra', 'cabra1.jpg', 'Caprino', 'Cria', 12, NULL, NULL);

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
(6, 1.000, 1.000, '2025', 36),
(7, 1.000, 2.000, '2025', 36),
(10, 5.000, 5.000, '2025', 37),
(11, 2.000, 7.000, '2026', 37),
(12, 3.000, 10.000, '2027', 37);

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

--
-- Volcado de datos para la tabla `leche`
--

INSERT INTO `leche` (`id_produccion`, `fecha_produccion`, `litros_producidos`, `id_animal`) VALUES
(2, '2025-06-25', 11, 39),
(3, '2025-06-24', 11, 43),
(4, '2025-06-25', 3, 43),
(5, '2025-06-25', 2, 43),
(6, '2025-06-25', 10, 43);

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

--
-- Volcado de datos para la tabla `peso`
--

INSERT INTO `peso` (`id_peso`, `fecha_pesaje`, `peso`, `observaciones`, `id_animal`) VALUES
(1, '2025-06-02', 35.00, 'Desnutricion', 35),
(3, '2025-06-25', 367.00, 'Ya no esta desnutrido', 35),
(4, '2025-06-25', 112.00, 'Ta flaco', 36);

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
(1, '2025-06-16', 'Sida', 'Anti sida', 'Se curo del sida', 'Medico del Sida', 35);

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
  `rol` enum('Aprendiz','Instructor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nit`, `nombre`, `correo`, `clave`, `rol`) VALUES
(1, 1141514648, 'Instructor de prueba', 'soxberg277@gmail.com', '$2y$10$UwxD8e4sUh9deQlSRVp.Uu0Lv5IlJdTIqLyHMf72IYheDDx1bfC1K', 'Instructor'),
(2, 1141514649, 'Aprendiz Prueba', 'maickgarciaochoa@gmail.com', '$2y$10$UyOchSc1uBxZKztD6s4Eh.4AWGwyd7zM9Sl8Cs9qg85h..t4GV2EW', 'Aprendiz'),
(3, 1141514642, 'Prueba Gallina', 'Sesdasd', '$2y$12$9Zi5iuDHJgQmWTNtR/lCEuemHmcGFgcebk9pgWt3HYY', 'Aprendiz'),
(12, 1131513253, 'PruebaInsertado', 'maickgarciaochoa@gmail.com', '$2y$10$UyOchSc1uBxZKztD6s4Eh.4AWGwyd7zM9Sl8Cs9qg85h..t4GV2EW', 'Instructor');

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
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `lana`
--
ALTER TABLE `lana`
  MODIFY `id_produccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `leche`
--
ALTER TABLE `leche`
  MODIFY `id_produccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `peso`
--
ALTER TABLE `peso`
  MODIFY `id_peso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id_tratamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `animal_ibfk_4` FOREIGN KEY (`id_padre`) REFERENCES `animal` (`id_animal`),
  ADD CONSTRAINT `animal_ibfk_5` FOREIGN KEY (`id_madre`) REFERENCES `animal` (`id_animal`);

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
