-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2021 a las 07:26:27
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asocia`
--

CREATE TABLE `asocia` (
  `id_asociacion` int(11) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `cod_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asocia`
--

INSERT INTO `asocia` (`id_asociacion`, `dni`, `cod_perfil`) VALUES
(1, '14031997', 111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(11) NOT NULL,
  `cif` varchar(50) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `num_fax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `cif`, `nombre`, `direccion`, `telefono`, `num_fax`) VALUES
(1, 'B76365789', 'Kavak', 'Calle Xola 1367, Benito Juárez, CDMX', '5541629202', 21345864),
(2, 'A65422167', 'Clip', 'Santa Fe 98, Álvaro Obregón, CDMX', '5563932323', 43567864);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curriculum`
--

CREATE TABLE `curriculum` (
  `id_cv` varchar(20) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `especialidad` varchar(70) NOT NULL,
  `universidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curriculum`
--

INSERT INTO `curriculum` (`id_cv`, `titulo`, `especialidad`, `universidad`) VALUES
('001', 'Desarrollador Web', 'BackEnd', 'UNAM'),
('002', 'Tester', 'SQL Manager', 'IPN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `demandante`
--

CREATE TABLE `demandante` (
  `dni` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `cc_conducir` varchar(50) NOT NULL,
  `id_cv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `demandante`
--

INSERT INTO `demandante` (`dni`, `nombre`, `direccion`, `telefono`, `cc_conducir`, `id_cv`) VALUES
('12121997', 'Alfredo Montes', 'Gardenias 4, Tultitlán', '5687456025', 'AM5488', '002'),
('14031997', 'Jessica Cruz', 'Animas #17, Huehuetoca', '5513571425', 'JC0987', '001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE `experiencia` (
  `id_exp` int(11) NOT NULL,
  `nom_empresa` varchar(100) DEFAULT NULL,
  `tiempo_inicio` date DEFAULT NULL,
  `tiempo_fin` date DEFAULT NULL,
  `puesto` varchar(50) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `experiencia`
--

INSERT INTO `experiencia` (`id_exp`, `nom_empresa`, `tiempo_inicio`, `tiempo_fin`, `puesto`, `dni`) VALUES
(1, 'VWS México', '2019-06-20', '2021-01-20', 'Analista', '14031997'),
(2, 'Recurso Contable', '2019-09-09', '2020-05-22', 'Programador ', '12121997');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `cod_perfil` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`cod_perfil`, `descripcion`) VALUES
(111, 'Demasiada experiencia y buen currículum'),
(112, 'Experiencia media y buen currículum');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicita`
--

CREATE TABLE `solicita` (
  `id_solicitud` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `cod_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicita`
--

INSERT INTO `solicita` (`id_solicitud`, `cod_cliente`, `cod_perfil`) VALUES
(1, 2, 112);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asocia`
--
ALTER TABLE `asocia`
  ADD PRIMARY KEY (`id_asociacion`),
  ADD KEY `dni` (`dni`),
  ADD KEY `cod_perfil` (`cod_perfil`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Indices de la tabla `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`id_cv`);

--
-- Indices de la tabla `demandante`
--
ALTER TABLE `demandante`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `id_cv` (`id_cv`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`id_exp`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`cod_perfil`);

--
-- Indices de la tabla `solicita`
--
ALTER TABLE `solicita`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `cod_cliente` (`cod_cliente`),
  ADD KEY `cod_perfil` (`cod_perfil`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asocia`
--
ALTER TABLE `asocia`
  ADD CONSTRAINT `cod_perfil_1` FOREIGN KEY (`cod_perfil`) REFERENCES `perfil` (`cod_perfil`),
  ADD CONSTRAINT `dni_2` FOREIGN KEY (`dni`) REFERENCES `demandante` (`dni`);

--
-- Filtros para la tabla `demandante`
--
ALTER TABLE `demandante`
  ADD CONSTRAINT `id_cv` FOREIGN KEY (`id_cv`) REFERENCES `curriculum` (`id_cv`);

--
-- Filtros para la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD CONSTRAINT `dni_1` FOREIGN KEY (`dni`) REFERENCES `demandante` (`dni`);

--
-- Filtros para la tabla `solicita`
--
ALTER TABLE `solicita`
  ADD CONSTRAINT `cod_cliente_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod_cliente`),
  ADD CONSTRAINT `cod_perfil_2` FOREIGN KEY (`cod_perfil`) REFERENCES `perfil` (`cod_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
