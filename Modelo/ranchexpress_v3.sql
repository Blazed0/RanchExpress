-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
<<<<<<< HEAD
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 30-05-2025 a las 23:46:34
=======
-- Servidor: localhost:3307
-- Tiempo de generación: 28-05-2025 a las 00:47:47
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
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
<<<<<<< HEAD
-- Base de datos: `ranchexpress_v3`
=======
-- Base de datos: `ranchexpress v3`
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
<<<<<<< HEAD
  `estado` text NOT NULL,
  `codigo_animal` varchar(70) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `proposito` varchar(180) NOT NULL,
=======
  `codigo_animal` varchar(70) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
  `peso_nacimiento` double(5,2) NOT NULL,
  `nombre` text NOT NULL,
  `raza` varchar(120) NOT NULL,
  `color` varchar(120) NOT NULL,
  `sexo` enum('Hembra','Macho') NOT NULL,
  `imagen_animal` varchar(255) NOT NULL,
  `especie` text NOT NULL,
<<<<<<< HEAD
  `id_usuario` int(11) DEFAULT NULL
=======
  `id_usuario` int(11) NOT NULL
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `animal`
--

<<<<<<< HEAD
INSERT INTO `animal` (`id_animal`, `estado`, `codigo_animal`, `fecha_ingreso`, `fecha_nacimiento`, `proposito`, `peso_nacimiento`, `nombre`, `raza`, `color`, `sexo`, `imagen_animal`, `especie`, `id_usuario`) VALUES
(28, 'activo', '115', '2025-05-13', '2025-05-22', 'Reproductor', 32.00, 'Dario', 'R', 'Negro', 'Hembra', 'thumb-1920-609173.jpg', 'Caprino', 1),
(29, 'vendido,muerto', '116', '2025-05-12', '2025-05-28', 'Reproductor', 32.00, 'Ramirez', 'hola', 'Negro', 'Hembra', 'lotera-de-animales-2-638.webp', 'Ovino', 1);
=======
INSERT INTO `animal` (`id_animal`, `codigo_animal`, `fecha_ingreso`, `fecha_nacimiento`, `peso_nacimiento`, `nombre`, `raza`, `color`, `sexo`, `imagen_animal`, `especie`, `id_usuario`) VALUES
(8, '114', '2025-05-01', '2025-05-06', 32.00, 'Dandy', 'Si', 'Negro', 'Hembra', 'se', 'Caprino', 2),
(10, '422', '2025-05-12', '2025-05-06', 32.00, 'Susy', 'Sea', 'Negro', 'Hembra', 'hola', 'Ovino', 3);
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crias`
--

CREATE TABLE `crias` (
  `id_crias` int(11) NOT NULL,
  `fecha_nacidos` date NOT NULL,
  `sexo` enum('Hembra','Macho') NOT NULL,
  `codigo_cria` int(11) NOT NULL,
  `raza` varchar(120) NOT NULL,
  `observaciones` varchar(180) NOT NULL,
  `peso_nacimiento` double(5,2) NOT NULL,
<<<<<<< HEAD
  `nombre_cria` text NOT NULL,
  `especie_cria` text NOT NULL,
  `imagen_cria` varchar(5000) NOT NULL,
=======
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a
  `id_madre` int(11) NOT NULL,
  `id_padre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lana`
--

CREATE TABLE `lana` (
  `id_produccion` int(11) NOT NULL,
  `kilos_producidos` double(5,3) DEFAULT NULL,
  `produccion_anual` double(5,3) DEFAULT NULL,
  `id_animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
  `peso_cria` double(5,2) NOT NULL,
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
(1, 1141514648, 'Instructor de prueba', 'soxberg277@gmail.com', '$2y$10$MTTAQzDx5IRjOiLp9IwOnewu3fbvBjxIOCfix3Aw3SmOFjX3Iqr4O', 'Instructor'),
(2, 1141514649, 'Aprendiz Prueba', 'pruebaAprendiz@gmail.com', '$2y$10$J6Tn/FdISha6Xz/wQob.6eS5q5rQOdnLU1a/VBglbs8', 'Aprendiz'),
(3, 1141514642, 'Prueba Gallina', 'Sesdasd', '$2y$12$9Zi5iuDHJgQmWTNtR/lCEuemHmcGFgcebk9pgWt3HYY', 'Aprendiz'),
(12, 1131513253, 'PruebaInsertado', 'PruebaInsertar@gmail.com', '$2y$10$mtOWNcrO4Q2.ga8yZsTh8eVao8GBb0ij0jiojeu2.Jk', 'Instructor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `dueño vacas` (`id_usuario`) USING BTREE;

--
-- Indices de la tabla `crias`
--
ALTER TABLE `crias`
  ADD PRIMARY KEY (`id_crias`),
  ADD KEY `padres_cria` (`id_madre`,`id_padre`),
<<<<<<< HEAD
  ADD KEY `crias_ibfk_2` (`id_padre`);
=======
  ADD KEY `id_padre` (`id_padre`);
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a

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
  ADD KEY `produccion_leche` (`id_animal`);

--
-- Indices de la tabla `peso`
--
ALTER TABLE `peso`
  ADD PRIMARY KEY (`id_peso`),
  ADD KEY `pesaje_animal` (`id_animal`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id_tratamiento`),
  ADD UNIQUE KEY `vacunas animal` (`id_animal`);

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
<<<<<<< HEAD
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
=======
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a

--
-- AUTO_INCREMENT de la tabla `crias`
--
ALTER TABLE `crias`
<<<<<<< HEAD
  MODIFY `id_crias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
=======
  MODIFY `id_crias` int(11) NOT NULL AUTO_INCREMENT;
>>>>>>> 5c0306bf5443da2d237602eb785568085674806a

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
  MODIFY `id_tratamiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `crias`
--
ALTER TABLE `crias`
  ADD CONSTRAINT `crias_ibfk_1` FOREIGN KEY (`id_madre`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crias_ibfk_2` FOREIGN KEY (`id_padre`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lana`
--
ALTER TABLE `lana`
  ADD CONSTRAINT `lana_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`);

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
  ADD CONSTRAINT `tratamientos_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
