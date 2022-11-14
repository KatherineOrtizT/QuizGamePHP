-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 19:55:42
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `curso_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cerveza`
--

CREATE TABLE `cerveza` (
  `numeroPregunta` varchar(2) NOT NULL,
  `pregunta` varchar(200) NOT NULL,
  `a` varchar(150) NOT NULL,
  `b` varchar(150) NOT NULL,
  `c` varchar(150) NOT NULL,
  `d` varchar(150) NOT NULL,
  `correcta` varchar(2) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cerveza`
--

INSERT INTO `cerveza` (`numeroPregunta`, `pregunta`, `a`, `b`, `c`, `d`, `correcta`, `tipo`) VALUES
('01', '¿Qué técnica se utiliza para fabricar cerveza lager? ', 'El método del mosto ', 'El método del mosto ', 'La fermentación secundaria ', 'El enfriamiento lento', 'd', 'radio'),
('02', '¿Qué ingrediente es esencial para hacer cerveza? ', 'Malta', 'Azúcar', 'Gengibre', 'Lúpulo', 'ad', 'checkbox'),
('03', '¿Cuál de los siguientes no es un tipo de cerveza? ', 'Cerveza oscura ', 'Cerveza de trigo ', 'Cerveza de jengibre ', 'Cerveza de cebada ', 'ac', 'checkbox'),
('04', '¿La cerveza tiene calorías? ', 'si', 'no', '', '', '0', 'range'),
('05', '¿Cuántos ingredientes básicos tiene la cerveza?', '', '', '', '', '4', 'textarea'),
('06', '¿Por qué se añade lúpulo a la cerveza?  ', 'Para dar sabor ', 'Para aportar amargor', 'Para aportar dulzor', 'Para fermentarla', 'b', 'radio'),
('07', ' ¿Cuál es la cerveza más antigua del mundo?', 'La cerveza Romana', 'La cerveza griega', 'La cerveza egipcia ', 'La cerveza asiatica', 'c', 'radio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `codArticulo` varchar(5) NOT NULL,
  `seccion` varchar(15) DEFAULT NULL,
  `nomArticulo` varchar(10) DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importado` varchar(3) NOT NULL,
  `paisDeOrigen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`codArticulo`, `seccion`, `nomArticulo`, `precio`, `fecha`, `importado`, `paisDeOrigen`) VALUES
('A101', 'Deportes', 'Pelota', 22, '2022-10-13', 'si', 'Francia'),
('A101', 'Deportes', 'Pelota', 22, '2022-10-13', 'si', 'Francia'),
('A102', 'Deportes', 'Red', 22, '2022-10-13', 'si', 'Francia'),
('A103', 'Danza', 'Cinta', 22, '2022-10-13', 'si', 'Francia'),
('A104', 'Deportes', 'Patines', 22, '2022-10-13', 'si', 'Francia'),
('A105', 'Calzado', 'Sandalias', 22, '2022-10-13', 'si', 'Francia'),
('A105', 'Calzado', 'Zapatos', 22, '2022-10-13', 'si', 'Francia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntaswhisky`
--

CREATE TABLE `preguntaswhisky` (
  `numeroPregunta` varchar(2) NOT NULL,
  `pregunta` varchar(200) NOT NULL,
  `a` varchar(150) NOT NULL,
  `b` varchar(150) NOT NULL,
  `c` varchar(150) NOT NULL,
  `d` varchar(150) NOT NULL,
  `correcta` varchar(8) NOT NULL,
  `tipo` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntaswhisky`
--

INSERT INTO `preguntaswhisky` (`numeroPregunta`, `pregunta`, `a`, `b`, `c`, `d`, `correcta`, `tipo`) VALUES
('01', '¿De qué materiales se hace el whisky? ', 'Roca y arena', 'Cebada, trigo y maíz', 'Caña de azúcar y melaza', 'Uvas y levadura', 'b', 'radio'),
('02', '¿Cuál es el ingrediente principal del whisky?', 'Roca', 'mosto de Uvas', 'malta de cebada', 'Caña de azúcar', 'c', 'select'),
('03', '¿Cómo se produce el whisky?', 'Se deja fermentar la cebada malteada con agua y luego se destila', 'Se mezcla la cebada malteada con agua y luego se destila', 'Se mezcla la cebada malteada con maíz y luego se destila', 'Se deja fermentar la cebada malteada con maíz y luego se destila', 'a', 'radio'),
('04', '¿Qué se hace después de destilar el whisky?', 'Se deja envejecer en barriles de acero inoxidable', '. Se deja envejecer en barriles de madera', 'No se deja envejecer, se embotella inmediatamente', 'Se deja envejecer en barriles de roble', 'd', 'radio'),
('05', 'Cuál de los siguientes es un tipo de whisky', 'Scotch', 'Irish', 'Japanese', 'Russian', 'abc', 'checkbox'),
('06', 'Cuál es el volumen alcohólico del whisky', '', '', '', '', '40', 'textarea'),
('07', 'Qué es la \"parte del ángel\"', 'la porción de whisky que se pierde durante el embotellado', 'el impuesto que se paga a favor de los ángeles', 'la porción de whisky que se evapora durante el envejecimiento', 'la porción de whisky que se le da a los ángeles después de la destilación', 'c', 'radio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `nombreUsuario` varchar(30) NOT NULL,
  `puntuacion` varchar(4) NOT NULL,
  `Juego` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` varchar(4) NOT NULL,
  `nombreUsuario` varchar(15) DEFAULT NULL,
  `contraseña` varchar(90) DEFAULT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `imagen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombreUsuario`, `contraseña`, `Descripcion`, `imagen`) VALUES
('', 'pepe', '$2y$10$e1IR0t/Gf1qGcAZs0zhfOOGVFFkvSKgBKDbrUz1.fvP.dW9eUrm3K', '', 'zeus.png'),
('', NULL, NULL, '', 'i1.jpg'),
('', 'katty', '$2y$10$/JbQZRK.zICXbLwUOdYQQ.sbH.aoKyLFC6XW4ZWfmZsZ9z3lNr4Mi', '', 'copia.png'),
('', 'cris', '$2y$10$CcYILgYz.A07oJQ7cmpoG.7WzViP.TC3jQV863z8ucJAuitXcnqMq', '', ''),
('', 'carla', '$2y$10$BmOJZsHFoIbLKaz.37HI0.x5gU8B8E790WUbpWyFhFOGJHbqyiDgm', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
