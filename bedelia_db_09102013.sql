-- phpMyAdmin SQL Dump
-- version 4.0.8deb0ubuntu1ppa1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-10-2013 a las 20:24:28
-- Versión del servidor: 5.5.32-0ubuntu0.13.04.1
-- Versión de PHP: 5.4.9-4ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bedelia_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) NOT NULL,
  `estado_alumno_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `persona_id` (`persona_id`),
  KEY `fk_alumno_estado_alumno1_idx` (`estado_alumno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE IF NOT EXISTS `aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_aula` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion_aula_UNIQUE` (`descripcion_aula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id`, `descripcion_aula`) VALUES
(1, 'AULA 1'),
(2, 'AULA 2'),
(3, 'AULA 3'),
(4, 'AULA 4'),
(5, 'AULA 5'),
(6, 'AULA 6'),
(7, 'AULA 7'),
(9, 'AULA 8'),
(10, 'AULA 9'),
(12, 'LAB DE ELECTRONICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_cargo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion_cargo_UNIQUE` (`descripcion_cargo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion_cargo`) VALUES
(2, 'SUPLENTE'),
(1, 'TITULAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_carrera` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_carrera_UNIQUE` (`nombre_carrera`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre_carrera`) VALUES
(1, 'TEC EN DES DE SOFTWARE'),
(2, 'TEC EN ENFERMERIA'),
(3, 'TEC EN REDES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_has_alumno`
--

CREATE TABLE IF NOT EXISTS `carrera_has_alumno` (
  `carrera_id` int(11) NOT NULL DEFAULT '0',
  `alumno_id` int(11) NOT NULL,
  PRIMARY KEY (`carrera_id`,`alumno_id`),
  KEY `fk_carrera_has_alumno_alumno1_idx` (`alumno_id`),
  KEY `fk_carrera_has_alumno_carrera1_idx` (`carrera_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comision`
--

CREATE TABLE IF NOT EXISTS `comision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_comision` char(1) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `aula_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comision_profesor` (`profesor_id`),
  KEY `fk_comision_materia` (`materia_id`),
  KEY `fk_comision_aula1_idx` (`aula_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `comision`
--

INSERT INTO `comision` (`id`, `descripcion_comision`, `materia_id`, `aula_id`, `profesor_id`) VALUES
(1, '1', 1, 3, 2),
(2, '', 2, 7, 1),
(3, '1', 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--

CREATE TABLE IF NOT EXISTS `elemento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `numero_inventario` varchar(50) NOT NULL,
  `solo_udc` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento_en_uso`
--

CREATE TABLE IF NOT EXISTS `elemento_en_uso` (
  `id` int(11) NOT NULL DEFAULT '0',
  `hora_fecha_retiro` timestamp NULL DEFAULT NULL,
  `hora_fecha_entrega` timestamp NULL DEFAULT NULL,
  `elemento_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_elemento_en_uso_elemento1_idx` (`elemento_id`),
  KEY `fk_elemento_en_uso_persona1_idx` (`persona_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_alumno`
--

CREATE TABLE IF NOT EXISTS `estado_alumno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `estado_alumno`
--

INSERT INTO `estado_alumno` (`id`, `descripcion`) VALUES
(7, 'LIBRE'),
(1, 'REGULAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichaje`
--

CREATE TABLE IF NOT EXISTS `fichaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_hora_entrada` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_hora_salida` timestamp NULL DEFAULT NULL,
  `observacion` varchar(140) NOT NULL,
  `comision_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fichaje_comision_id` (`comision_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `fichaje`
--

INSERT INTO `fichaje` (`id`, `fecha_hora_entrada`, `fecha_hora_salida`, `observacion`, `comision_id`) VALUES
(1, '2013-09-11 23:42:00', NULL, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(30) NOT NULL,
  `fecha_inicio_cursada` date NOT NULL,
  `fecha_fin_cursada` date NOT NULL,
  `carrera_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_materia_carrera1_idx` (`carrera_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre_materia`, `fecha_inicio_cursada`, `fecha_fin_cursada`, `carrera_id`) VALUES
(1, 'BIOLOGIA', '2013-08-01', '2013-12-31', 2),
(2, 'MATEMATICA 2', '2013-08-01', '2013-12-31', 1),
(3, 'PSICOLOGI', '2013-01-01', '2013-12-31', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nro_doc` varchar(10) NOT NULL,
  `ape_nom` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `sexo_id` int(11) NOT NULL,
  `tipo_doc_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nro_doc_UNIQUE` (`nro_doc`),
  UNIQUE KEY `ape_nom_UNIQUE` (`ape_nom`),
  KEY `fk_persona_tipo_doc` (`tipo_doc_id`),
  KEY `fk_persona_sexo` (`sexo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nro_doc`, `ape_nom`, `direccion`, `fecha_nac`, `sexo_id`, `tipo_doc_id`) VALUES
(1, '23456789', 'ARGENTO,JOSE', 'BELGRANO 456', '1967-04-23', 1, 1),
(2, '12345678', 'FERNANDEZ,MARGARITA', 'INMIGRANTE 456 TRELEW', '1977-06-23', 2, 1),
(45, '25407940', 'SOTO,JAVIER OSVALDO', 'JOSE HERNANDEZ 560 ', '1976-09-12', 2, 1),
(46, '1122334455', 'MARCHAN,ALAN', 'ASDLKD', '2010-01-01', 1, 1),
(50, '1122333423', 'MARCHAND,ALANCITO', 'ASDLKD', '2010-01-01', 1, 1),
(51, '232', '213,123123', '213', '2001-01-01', 2, 1),
(55, '98765432', 'CLASE,CECILIA NATALIA', 'JOSE HERNANDEZ 560 ', '2001-01-01', 2, 1),
(58, '++++', '999,9999', '9999', '1976-01-01', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_profesor_cargo` (`cargo_id`),
  KEY `fk_profesor_persona` (`persona_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `cargo_id`, `persona_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE IF NOT EXISTS `sexo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_sexo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion_sexo_UNIQUE` (`descripcion_sexo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id`, `descripcion_sexo`) VALUES
(2, 'FEMENINO'),
(1, 'MASCULINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas_dados`
--

CREATE TABLE IF NOT EXISTS `temas_dados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tema` varchar(100) NOT NULL,
  `comision_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_temas_dados_comision` (`comision_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE IF NOT EXISTS `tipo_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`id`, `descripcion`) VALUES
(1, 'DNI'),
(2, 'LC'),
(3, 'LE'),
(4, 'PAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_UNIQUE` (`user`),
  UNIQUE KEY `password_UNIQUE` (`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_alumno_estado_alumno1` FOREIGN KEY (`estado_alumno_id`) REFERENCES `estado_alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carrera_has_alumno`
--
ALTER TABLE `carrera_has_alumno`
  ADD CONSTRAINT `fk_carrera_has_alumno_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carrera_has_alumno_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comision`
--
ALTER TABLE `comision`
  ADD CONSTRAINT `fk_comision_aula` FOREIGN KEY (`aula_id`) REFERENCES `aula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comision_materia` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comision_profesor` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `elemento_en_uso`
--
ALTER TABLE `elemento_en_uso`
  ADD CONSTRAINT `fk_elemento_en_uso_elemento1` FOREIGN KEY (`elemento_id`) REFERENCES `elemento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_elemento_en_uso_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fichaje`
--
ALTER TABLE `fichaje`
  ADD CONSTRAINT `fk_fichaje_comision_id` FOREIGN KEY (`comision_id`) REFERENCES `comision` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_materia_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_sexo` FOREIGN KEY (`sexo_id`) REFERENCES `sexo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_tipo_doc` FOREIGN KEY (`tipo_doc_id`) REFERENCES `tipo_doc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `fk_profesor_cargo` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profesor_persona` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `temas_dados`
--
ALTER TABLE `temas_dados`
  ADD CONSTRAINT `fk_temas_dados_comision` FOREIGN KEY (`comision_id`) REFERENCES `comision` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
