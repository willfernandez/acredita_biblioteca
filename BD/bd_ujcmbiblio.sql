-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-08-2012 a las 14:53:33
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_ujcmbiblio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_anterior` varchar(14) DEFAULT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(120) DEFAULT NULL,
  `sexo` enum('MASCULINO','FEMENINO') DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(120) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `estado` set('Pregrado','Posgrado') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bibliotecas`
--

CREATE TABLE IF NOT EXISTS `bibliotecas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_biblioteca` varchar(120) DEFAULT NULL,
  `sede_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bibliotecas_sedes1` (`sede_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bibliotecas`
--

INSERT INTO `bibliotecas` (`id`, `nombre_biblioteca`, `sede_id`) VALUES
(1, 'Biblioteca 1', 1),
(2, 'Biblioteca 2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_cat` varchar(60) DEFAULT NULL,
  `descripcion` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_cat`, `descripcion`) VALUES
(1, 'Libros', NULL),
(2, 'Informes', NULL),
(3, 'Proyectos', NULL),
(4, 'Tesis', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_departamento` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre_departamento`) VALUES
(1, 'Moquegua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE IF NOT EXISTS `distritos` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_distrito` varchar(80) DEFAULT NULL,
  `provincia_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_distritos_provincias_idx` (`provincia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id`, `nombre_distrito`, `provincia_id`) VALUES
(1, 'Moquegua', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorials`
--

CREATE TABLE IF NOT EXISTS `editorials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_editorial` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplares`
--

CREATE TABLE IF NOT EXISTS `ejemplares` (
  `codigo` varchar(45) DEFAULT NULL,
  `texto_id` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) DEFAULT NULL,
  `biblioteca_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_textos_has_sedes_textos1_idx` (`texto_id`),
  KEY `fk_ejemplares_bibliotecas1` (`biblioteca_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ejemplares`
--

INSERT INTO `ejemplares` (`codigo`, `texto_id`, `id`, `estado`, `biblioteca_id`) VALUES
('25816165', 1, 1, 'Disponible', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lectores`
--

CREATE TABLE IF NOT EXISTS `lectores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_lector` varchar(255) DEFAULT NULL,
  `alumno_id` int(10) unsigned DEFAULT NULL,
  `personal_id` int(10) unsigned DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_perfiles_alumnos1_idx` (`alumno_id`),
  KEY `fk_perfiles_personals1_idx` (`personal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `lectores`
--

INSERT INTO `lectores` (`id`, `nombre_lector`, `alumno_id`, `personal_id`, `usuario`, `password`) VALUES
(1, 'Ana Maria Polo', NULL, NULL, 'Ana', '12156'),
(2, 'Marco Polo', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personals`
--

CREATE TABLE IF NOT EXISTS `personals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_anterior` varchar(14) DEFAULT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(120) DEFAULT NULL,
  `sexo` set('Hombre','Mujer') DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE IF NOT EXISTS `prestamos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sancione_id` int(10) unsigned DEFAULT NULL,
  `estado` binary(1) DEFAULT NULL,
  `fecha_prestamo` datetime DEFAULT NULL,
  `fecha_entrega` varchar(45) DEFAULT NULL,
  `ejemplare_id` int(10) unsigned NOT NULL,
  `lectore_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prestamo_sanciones1_idx` (`sancione_id`),
  KEY `fk_prestamo_ejemplares1_idx` (`ejemplare_id`),
  KEY `fk_prestamos_lectores1` (`lectore_id`),
  KEY `fk_prestamos_usuarios1` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='\n' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id`, `sancione_id`, `estado`, `fecha_prestamo`, `fecha_entrega`, `ejemplare_id`, `lectore_id`, `usuario_id`) VALUES
(1, NULL, NULL, '2012-08-27 19:26:59', NULL, 1, 1, 6),
(2, NULL, NULL, '2012-08-27 19:37:24', NULL, 1, 2, 6),
(4, NULL, NULL, '2012-08-28 08:44:36', NULL, 1, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_provincia` varchar(85) DEFAULT NULL,
  `departamento_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_provincias_departamentos_idx` (`departamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `nombre_provincia`, `departamento_id`) VALUES
(1, 'General Sánchez Cerro', 1),
(2, 'Ilo', 1),
(3, 'Mariscal Nieto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sanciones`
--

CREATE TABLE IF NOT EXISTS `sanciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_sancion` varchar(45) DEFAULT NULL,
  `grado` varchar(45) DEFAULT NULL,
  `costo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE IF NOT EXISTS `sedes` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_institucion` varchar(80) DEFAULT NULL,
  `pagina_web` varchar(60) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(120) DEFAULT NULL,
  `anexo` varchar(6) DEFAULT NULL,
  `departamento_id` smallint(5) unsigned DEFAULT NULL,
  `provincia_id` smallint(5) unsigned DEFAULT NULL,
  `distrito_id` smallint(5) unsigned DEFAULT NULL,
  `abrev_sede` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sedes_departamentos_idx` (`departamento_id`),
  KEY `fk_sedes_provincias_idx` (`provincia_id`),
  KEY `fk_sedes_distritos_idx` (`distrito_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `nombre_institucion`, `pagina_web`, `telefono`, `direccion`, `anexo`, `departamento_id`, `provincia_id`, `distrito_id`, `abrev_sede`) VALUES
(1, 'Universidad José Carlos Mariátegui - Moquegua', 'www.ujcm.edu.pe', '461110', 'Calle Ayacucho Nº 393', '101', 1, 1, 1, 'Moquegua'),
(2, 'Universidad José Carlos Mariátegui - Ilo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ilo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_subcategoria` varchar(45) DEFAULT NULL,
  `descripcion` mediumtext,
  `categoria_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subcategoria_categoria1_idx` (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `textos`
--

CREATE TABLE IF NOT EXISTS `textos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `categoria_id` int(10) unsigned NOT NULL,
  `subcategoria_id` int(10) unsigned DEFAULT NULL,
  `editorial_id` int(10) unsigned zerofill DEFAULT NULL,
  `cantidad_total` int(11) NOT NULL DEFAULT '0',
  `cantidad_disp` int(11) NOT NULL DEFAULT '0',
  `tomos` varchar(45) NOT NULL DEFAULT '0',
  `volumenes` varchar(45) NOT NULL DEFAULT '0',
  `fecha_adquisicion` datetime DEFAULT NULL,
  `idioma` varchar(45) NOT NULL DEFAULT 'Español',
  `etiquetas` mediumtext,
  `formato` varchar(45) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `lectore_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_libro_categoria1_idx` (`categoria_id`),
  KEY `fk_libro_subcategoria1_idx` (`subcategoria_id`),
  KEY `fk_texto_editorial1_idx` (`editorial_id`),
  KEY `fk_textos_lectores1` (`lectore_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `textos`
--

INSERT INTO `textos` (`id`, `titulo`, `autor`, `descripcion`, `categoria_id`, `subcategoria_id`, `editorial_id`, `cantidad_total`, `cantidad_disp`, `tomos`, `volumenes`, `fecha_adquisicion`, `idioma`, `etiquetas`, `formato`, `imagen`, `lectore_id`) VALUES
(1, 'Fundamento de base de datos', 'Korth', NULL, 1, NULL, NULL, 0, 0, '0', '0', NULL, 'Español', 'base de datos', NULL, 'portada-libro-secretos.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(120) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `administrador` tinyint(4) DEFAULT NULL,
  `biblioteca_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_bibliotecas1` (`biblioteca_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `fecha_registro`, `nombres`, `apellidos`, `administrador`, `biblioteca_id`) VALUES
(4, 'admin2@hotmail.com', '4e674e216391680efba0b0ea952c07bdbc165522', '2012-08-26 20:21:20', 'admin2', 'admin', NULL, 1),
(6, 'admin@hotmail.com', 'd37a302f8d783bffe76e4681593726e52ab0dcf4', '2012-08-27 06:15:07', 'admin', 'admin', NULL, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bibliotecas`
--
ALTER TABLE `bibliotecas`
  ADD CONSTRAINT `fk_bibliotecas_sedes1` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD CONSTRAINT `fk_distritos_provincias` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ejemplares`
--
ALTER TABLE `ejemplares`
  ADD CONSTRAINT `fk_ejemplares_bibliotecas1` FOREIGN KEY (`biblioteca_id`) REFERENCES `bibliotecas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_textos_has_sedes_textos1` FOREIGN KEY (`texto_id`) REFERENCES `textos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lectores`
--
ALTER TABLE `lectores`
  ADD CONSTRAINT `fk_perfiles_alumnos1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perfiles_personals1` FOREIGN KEY (`personal_id`) REFERENCES `personals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `fk_prestamos_lectores1` FOREIGN KEY (`lectore_id`) REFERENCES `lectores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamos_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamo_ejemplares1` FOREIGN KEY (`ejemplare_id`) REFERENCES `ejemplares` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamo_sanciones1` FOREIGN KEY (`sancione_id`) REFERENCES `sanciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `fk_provincias_departamentos` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD CONSTRAINT `fk_sedes_departamentos` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sedes_distritos` FOREIGN KEY (`distrito_id`) REFERENCES `distritos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sedes_provincias` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `fk_subcategoria_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `textos`
--
ALTER TABLE `textos`
  ADD CONSTRAINT `fk_libro_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_libro_subcategoria1` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_textos_lectores1` FOREIGN KEY (`lectore_id`) REFERENCES `lectores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_texto_editorial1` FOREIGN KEY (`editorial_id`) REFERENCES `editorials` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_bibliotecas1` FOREIGN KEY (`biblioteca_id`) REFERENCES `bibliotecas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
