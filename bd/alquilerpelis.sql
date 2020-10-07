-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2020 a las 19:15:44
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquilerpelis`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePelicula` (IN `idPeliculaVariable` INT(11))  NO SQL
BEGIN

	DELETE FROM pelicula WHERE pelicula.id_pelicula = idPeliculaVariable;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAnio` (IN `anioVariable` VARCHAR(4), OUT `idAnio` VARCHAR(11))  NO SQL
BEGIN
	DECLARE existeAnio INT;
    SELECT  COUNT(anio.id_anio) INTO existeAnio FROM anio WHERE anio.anio= anioVariable; 
    
    IF existeAnio > 0 THEN
    	SELECT anio.id_anio INTO idAnio FROM anio WHERE anio.anio = anioVariable; 
    ELSE
    	INSERT into anio(anio) VALUES(anioVariable);
        SELECT LAST_INSERT_ID() into idAnio;
    END IF;    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCategoria` (IN `categoriaVariable` VARCHAR(50), OUT `idCategoria` VARCHAR(11))  BEGIN
	DECLARE existeCategoria INT;
    SELECT  COUNT(categoria.id_categoria) INTO existeCategoria FROM categoria WHERE categoria = categoriaVariable; 
    
    IF existeCategoria > 0 THEN
    	SELECT categoria.id_categoria INTO idCategoria FROM categoria WHERE categoria = categoriaVariable; 
    ELSE
    	INSERT into categoria(categoria.categoria) VALUES(categoriaVariable);
        SELECT LAST_INSERT_ID() into idCategoria;
    END IF;    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPreciosDia` (IN `precioDiaVariable` INT(11), IN `multaDiaVariable` INT(11), OUT `idPreciosDia` INT(11))  NO SQL
BEGIN
	DECLARE existePreciosDia INT;
    SELECT  COUNT(preciosdia.id_precioDia) INTO existePreciosDia FROM preciosdia WHERE preciosdia.precioDia = precioDiaVariable and preciosdia.multaDia = multaDiaVariable; 
    
    IF existePreciosDia > 0 THEN
    	SELECT id_precioDia INTO idPreciosDia FROM preciosdia WHERE preciosdia.precioDia = precioDiaVariable and preciosdia.multaDia = multaDiaVariable; 
    ELSE
    	INSERT into preciosdia(preciosdia.precioDia,preciosdia.multaDia) VALUES(precioDiaVariable,multaDiaVariable);
        SELECT LAST_INSERT_ID() into idPreciosDia;
    END IF;    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `incrementarAlquilerPelicula` (IN `idPeliculaVariable` INT(11))  NO SQL
BEGIN
	UPDATE pelicula SET pelicula.numeroAlquilados = pelicula.numeroAlquilados + 1 WHERE pelicula.id_pelicula = idPeliculaVariable;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPelicula` (IN `nombreVariable` VARCHAR(50), IN `descripcionVariable` TEXT, IN `calificacionVariable` INT(2), IN `pathImageVariable` VARCHAR(255), IN `categoriaVariable` VARCHAR(50), IN `precioDiaVariable` INT(11), IN `multaDiaVariable` INT(11), IN `anioVariable` INT(4))  NO SQL
BEGIN
	
    CALL getAnio(anioVariable,@idAnio);
    CALL getCategoria(categoriaVariable,@idCategoria);
    CALL getPreciosDia(precioDiaVariable,multaDiaVariable,@idPreciosDia);
    
    INSERT INTO pelicula(id_categoria,id_preciosDia,id_anio,nombre,descripcion,numeroAlquilados,calificacion,pathImage)
    VALUES (@idCategoria, @idPreciosDia, @idAnio, nombreVariable, descripcionVariable, 0 ,calificacionVariable, pathImageVariable);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectPeliculas` ()  NO SQL
BEGIN
    SELECT 
        id_pelicula,
        categoria,
        precioDia,
        multaDia,
        anio,
        nombre,
        descripcion,
        calificacion
    FROM
        pelicula a
    INNER JOIN anio b ON a.id_anio = b.id_anio
    INNER JOIN categoria c ON a.id_categoria = c.id_categoria
    INNER JOIN preciosdia d ON a.id_preciosDia = d.id_precioDia;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePelicula` (IN `idPeliculaVariable` INT(11), IN `nombreVariable` VARCHAR(50), IN `descripcionVariable` TEXT, IN `calificacionVariable` INT(2), IN `categoriaVariable` VARCHAR(50), IN `precioDiaVariable` INT(11), IN `multaDiaVariable` INT(11), IN `anioVariable` INT(4))  NO SQL
BEGIN
	
    CALL getAnio(anioVariable,@idAnio);
    CALL getCategoria(categoriaVariable,@idCategoria);
    CALL getPreciosDia(precioDiaVariable,multaDiaVariable,@idPreciosDia);
    
    UPDATE pelicula set pelicula.id_categoria = @idCategoria, pelicula.id_preciosDia = @idPreciosDia, pelicula.id_anio = @idAnio, pelicula.nombre = nombreVariable, pelicula.descripcion = descripcionVariable, pelicula.calificacion = calificacionVariable WHERE pelicula.id_pelicula = idPeliculaVariable;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anio`
--

CREATE TABLE `anio` (
  `id_anio` int(11) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `anio`
--

INSERT INTO `anio` (`id_anio`, `anio`) VALUES
(1, 2020),
(2, 2017),
(3, 2022),
(4, 2025),
(5, 2015);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Terror'),
(2, 'Comedia'),
(3, 'Familia'),
(4, 'Ciencia Ficción'),
(6, 'Drama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id_pelicula` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_preciosDia` int(11) NOT NULL,
  `id_anio` int(3) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `numeroAlquilados` int(11) DEFAULT NULL,
  `calificacion` int(2) NOT NULL,
  `pathImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `id_categoria`, `id_preciosDia`, `id_anio`, `nombre`, `descripcion`, `numeroAlquilados`, `calificacion`, `pathImage`) VALUES
(3, 6, 2, 3, 'Pelicula de Prueba 2', 'Esta es una descripcion', 1, 7, 'images/peliculas/prueba.jpg'),
(4, 3, 3, 1, 'EXITO ACTUALIZADO', 'DESCRIPCION ACTUALIZADA', 2, 2, 'images/peliculas/prueba.jpg'),
(6, 2, 2, 5, 'EXITO 2', 'DESCRIPCION', 2, 10, 'images/peliculas/prueba.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preciosdia`
--

CREATE TABLE `preciosdia` (
  `id_precioDia` int(11) NOT NULL,
  `precioDia` int(11) NOT NULL,
  `multaDia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preciosdia`
--

INSERT INTO `preciosdia` (`id_precioDia`, `precioDia`, `multaDia`) VALUES
(1, 10000, 12000),
(2, 5000, 7500),
(3, 9000, 11000),
(4, 5000, 8000),
(5, 7500, 7500),
(6, 1000, 1500);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anio`
--
ALTER TABLE `anio`
  ADD PRIMARY KEY (`id_anio`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pelicula`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_anio` (`id_anio`),
  ADD KEY `id_preciosDia` (`id_preciosDia`);

--
-- Indices de la tabla `preciosdia`
--
ALTER TABLE `preciosdia`
  ADD PRIMARY KEY (`id_precioDia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anio`
--
ALTER TABLE `anio`
  MODIFY `id_anio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `preciosdia`
--
ALTER TABLE `preciosdia`
  MODIFY `id_precioDia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `pelicula_ibfk_3` FOREIGN KEY (`id_anio`) REFERENCES `anio` (`id_anio`),
  ADD CONSTRAINT `pelicula_ibfk_4` FOREIGN KEY (`id_preciosDia`) REFERENCES `preciosdia` (`id_precioDia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
