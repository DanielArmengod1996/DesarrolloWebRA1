-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2018 a las 13:28:45
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `miniyoutube`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canales`
--

CREATE TABLE `canales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `canales_recomendados` varchar(100) NOT NULL,
  `isAdultos` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_video` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_nacimiento` varchar(50) DEFAULT NULL,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `nick`, `password`, `email`, `fecha_nacimiento`, `admin`) VALUES
(1, 'daniel', 'daniel', 'daniel', '3d0f3b9ddcacec30c4008c5e030e6c13a478cb4f', 'daniel@daniel.daniel', '2017-12-13 00:00:00', 1),
(2, 'poco', 'poco', 'poco', '5aa462b02c17559e5560bd92645c51f27c7c22de', 'poco@poco.poco', '2017-12-13 00:00:00', 1),
(3, 'pepe', 'pepe', 'pepe', '265392dc2782778664cc9d56c8e3cd9956661bb0', 'pepe@pepe.pepe', '2017-12-13 00:00:00', 0),
(4, 'asdasdsdasdasd', 'asdasd', 'asdasd', 'asdasdqas', 'asdasd@fasd.com', '2018-02-23', 5),
(10, 'asdasdasd', 'jijij', 'kj', 'asdasdqas', 'asdasd@asdm.com', '2000-02-12', 5),
(14, 'asdasDA', 'asdasda', 'asd', 'asdasdqasasd', 'asdasd@fasd.comasd', '2018-01-30', 5),
(15, 'asdasdsdasdasdasd', 'asdasdasd', 'dasdasdasd', 'asdasdqas', 'asdasd@fasd.comasdasd', '2018-02-07', 5),
(19, 'asdasdsdasdasd', 'asdasdasdasda', 'asdasdasd', 'asdasdqasasdasdas', 'asasdasdasddasd@fasdasdasd.comasdasd', '2018-02-16', 0),
(21, 'kjhdkajsk', 'kjasshdkjasdhkjasdha', 'akjsdhakjsdhkajsd', 'sasdjkashdjkash', 'asdasd@hotmail.com', '2018-02-16', 0),
(30, 'DANI', 'DADA123456', 'DA123456', 'DANIEDNIADNIA', '12345567889123456789@gmail.com', '2060-12-12', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `puntuacion` varchar(60) NOT NULL,
  `visitas` varchar(60) NOT NULL,
  `categoría` varchar(50) NOT NULL,
  `etiquetas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canales`
--
ALTER TABLE `canales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constraint_id_video` (`id_video`),
  ADD KEY `constraint_id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canales`
--
ALTER TABLE `canales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `constraint_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `constraint_id_video` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
