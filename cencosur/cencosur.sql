-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2022 a las 06:18:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE cencosur;
use cencosur;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cencosur`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_precio` (IN `id_producto` INT, IN `valor` INT, IN `fecha_i` DATE, IN `fecha_f` DATE)   BEGIN
	insert into precio (id_producto, valor, fecha_inicio, fecha_fin) values (id_producto, valor,fecha_i , fecha_f);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_producto` (IN `pedido` INT, IN `producto` INT, IN `cantidad` INT)   BEGIN
select fecha into @fecha from venta where pedido = id_venta;
select valor into @valor from precio where id_producto = producto and @fecha >= fecha_inicio and @fecha <= fecha_fin;
select id_producto, stock into @producto, @stock from producto where id_producto = producto;

insert into detallar (id_venta, id_producto, cantidad, Valor_unitario, valor_total) values (pedido, @producto, cantidad, @valor, cantidad*@valor);
update producto set stock = @stock - cantidad where id_producto = @producto;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_producto_nuevo` (IN `proveedor` VARCHAR(10), IN `categoria` INT, IN `nombre` VARCHAR(20), IN `stock` INT)   BEGIN
		insert into producto (rut_proveedor, id_categoria, nombre, stock) values (proveedor, categoria, nombre, stock);
		
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_stock` (IN `producto` INT, IN `cantidad` INT)   BEGIN
update producto set stock = cantidad + stock
where producto = id_producto;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_venta` (IN `cliente` VARCHAR(20))   BEGIN
insert into venta (rut_cliente) values (cliente);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `total` (IN `pedido_actual` INT, IN `descuento` FLOAT)   BEGIN
select sum(valor_total) into @valor_total from detallar where id_venta = pedido_actual;
update venta set monto_total = @valor_total * descuento where id_venta = pedido_actual;
update venta set descuento = descuento where id_venta = pedido_actual;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'Muebles', 'Mesas, sillas, sillones, sofás, escritorios, etc.'),
(2, 'Tablet', 'Solo tablet'),
(3, 'Televisores', 'Smart tv, OLED, 4k, LED, Full HD'),
(4, 'Notebooks Gamers', 'Lenovo, Asus, HP Pavilion, Acer'),
(5, 'Celular', 'Xiaomi, Iphone, Samsung'),
(6, 'Parlantes', 'Bose, JBL, Harman Kardon, Sony, Master-G, LG'),
(7, 'almohadas', 'Rosen, Fabrics, Attimo, Cannon, Alaniz Home'),
(8, 'lapices', 'Bic, Faber Castell, sharpie, proarte, giotto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `rut_cliente` varchar(20) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `num_calle` varchar(45) DEFAULT NULL,
  `comuna` varchar(45) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  `fecha_registro` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`rut_cliente`, `nombre`, `apellido`, `email`, `calle`, `num_calle`, `comuna`, `region`, `fecha_registro`) VALUES
('19795335-6', 'Javiera', 'Flores', 'florJavi@gmail.com', 'Cristobal Colon', '1137', 'Las Condes', 'Metropolitana', '2022-06-23'),
('20379525-4', 'Vicente', 'Martínez', 'vicente.m@gmail.com', 'Vargas Buston', '1051', 'San Miguel', 'Metropolitana', '2022-06-23'),
('20593385-8', 'Mabel', 'Vargas', 'eduvargasthebest@gmail.com', 'San Isidro', '88', 'Maipu', 'Metropolitana', '2022-06-23'),
('20773456-8', 'Jesus', 'Perez', 'diositoperez@gmail.com', 'Colo colo', '738', 'Providencia', 'Metropolitana', '2022-06-23'),
('20876556-6', 'Manuel', 'Gonzales', 'gonzalitogamerpro@gmail.com', 'Pedrero', '1843', 'San Joaquín', 'Metropolitana', '2022-06-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallar`
--

CREATE TABLE `detallar` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `Valor_unitario` int(11) DEFAULT NULL,
  `valor_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallar`
--

INSERT INTO `detallar` (`id_venta`, `id_producto`, `cantidad`, `Valor_unitario`, `valor_total`) VALUES
(242, 2, 2, 300000, 600000),
(242, 3, 1, 92000, 92000),
(243, 5, 1, 350000, 350000),
(243, 8, 1, 500000, 500000),
(244, 4, 1, 180000, 180000),
(244, 5, 1, 350000, 350000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `id_precio` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `valor` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`id_precio`, `id_producto`, `valor`, `fecha_inicio`, `fecha_fin`) VALUES
(18, 1, 25000, '2022-06-07', '2022-06-20'),
(19, 2, 300000, '2022-06-08', '2022-06-27'),
(20, 3, 92000, '2022-05-07', '2022-06-28'),
(21, 4, 180000, '2022-06-07', '2022-06-30'),
(22, 5, 350000, '2022-06-06', '2022-06-28'),
(23, 6, 600000, '2022-06-07', '2022-07-08'),
(24, 7, 900000, '2022-06-07', '2022-06-20'),
(25, 8, 500000, '2022-06-06', '2022-06-24'),
(26, 9, 330000, '2022-06-08', '2022-06-28'),
(27, 1, 25500, '2022-06-23', '2022-06-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `rut_proveedor` varchar(10) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_categoria`, `rut_proveedor`, `nombre`, `stock`) VALUES
(1, 1, '74234754-2', 'Silla', 25),
(2, 1, '74234754-2', 'sofá', 7),
(3, 2, '78267482-5', 'Tablet 64G', 14),
(4, 2, '78267482-5', 'Tablet 128G', 5),
(5, 3, '76545355-4', 'Smart tv', 3),
(6, 3, '76545355-4', 'OLED', 3),
(7, 4, '75768346-5', 'Asus', 2),
(8, 4, '75768346-5', 'Acer', 1),
(9, 5, '76453723-6', 'Xiaomi', 1),
(10, 5, '76453723-6', 'Iphone', 2),
(11, 6, '74238876-4', 'Bose', 13),
(12, 6, '74238876-4', 'JBL', 11),
(13, 7, '75321435-5', 'Rosen', 42),
(14, 7, '75321435-5', 'Attimo', 35),
(15, 8, '76567887-6', 'Bic', 123),
(16, 8, '76567887-6', 'sharpie', 155);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `rut_proveedor` varchar(10) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `num_calle` int(11) DEFAULT NULL,
  `comuna` varchar(45) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  `numero_celular` varchar(20) DEFAULT NULL,
  `pagina_web` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`rut_proveedor`, `nombre`, `calle`, `num_calle`, `comuna`, `region`, `numero_celular`, `pagina_web`) VALUES
('74234754-2', 'Muebles y más LTDA.', 'Avenida pedro', 7, 'Conchali', 'Metropolitana', '+56975849653', 'www.mueblesymasltda.cl'),
('74238876-4', 'ExplosivoParlante', 'Primera transversal', 94, 'las condes', 'Metropolitana', '+56946732409', 'www.explosivoparlante.cl'),
('75321435-5', 'Dulce Sueño', 'galvarino', 10, 'quilicura', 'Metropolitana', '+56976435465', 'www.dulcesueño.cl'),
('75768346-5', 'GamerPro', 'Carmen', 12, 'pudahuel', 'Metropolitana', '+56923576547', 'www.worldgamer.cl'),
('76453723-6', 'TodoCelular', 'pablo segundo', 43, 'recoleta', 'Metropolitana', '+56976121345', 'www.todocelular.cl'),
('76545355-4', 'Cabeza Tv', 'New York', 55, 'Providencia', 'Metropolitana', '+56965465256', 'www.cabezatv.cl'),
('76567887-6', 'LapiceraColor', 'Francisco bilbao', 16, 'Providencia', 'Metropolitana', '+56988745677', 'www.lapiceracolor.cl'),
('78267482-5', 'Electrónica Unida', 'Sergio freire', 32, 'San Miguel', 'Metropolitana', '+56987678436', 'www.electronicaunida.cl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `descuento` float DEFAULT NULL,
  `monto_total` float DEFAULT NULL,
  `rut_cliente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha`, `descuento`, `monto_total`, `rut_cliente`) VALUES
(242, '2022-06-23 23:53:55', 0.95, 657400, '19795335-6'),
(243, '2022-06-23 23:55:02', 1, 850000, '19795335-6'),
(244, '2022-06-24 00:04:01', 1, 530000, '19795335-6');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `ver_ultimos_precios`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `ver_ultimos_precios` (
`id_producto` int(11)
,`id_precio` int(11)
,`id_categoria` int(11)
,`rut_proveedor` varchar(10)
,`nombre` varchar(20)
,`stock` int(11)
,`valor` int(11)
,`fecha_inicio` date
,`fecha_fin` date
);

-- --------------------------------------------------------

--
-- Estructura para la vista `ver_ultimos_precios`
--
DROP TABLE IF EXISTS `ver_ultimos_precios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ver_ultimos_precios`  AS SELECT `producto`.`id_producto` AS `id_producto`, `precio`.`id_precio` AS `id_precio`, `producto`.`id_categoria` AS `id_categoria`, `producto`.`rut_proveedor` AS `rut_proveedor`, `producto`.`nombre` AS `nombre`, `producto`.`stock` AS `stock`, `precio`.`valor` AS `valor`, `precio`.`fecha_inicio` AS `fecha_inicio`, `precio`.`fecha_fin` AS `fecha_fin` FROM (`producto` left join `precio` on(`producto`.`id_producto` = `precio`.`id_producto`)) WHERE `precio`.`id_precio` in (select max(`precio`.`id_precio`) from `precio` group by `precio`.`id_producto`) OR `precio`.`valor` is null ORDER BY `producto`.`id_producto` ASC  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`rut_cliente`);

--
-- Indices de la tabla `detallar`
--
ALTER TABLE `detallar`
  ADD PRIMARY KEY (`id_venta`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`id_precio`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `producto_ibfk_2_idx` (`rut_proveedor`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`rut_proveedor`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `rut_cliente` (`rut_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `id_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallar`
--
ALTER TABLE `detallar`
  ADD CONSTRAINT `detallar_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`),
  ADD CONSTRAINT `detallar_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `precio`
--
ALTER TABLE `precio`
  ADD CONSTRAINT `precio_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`rut_proveedor`) REFERENCES `proveedor` (`rut_proveedor`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`rut_cliente`) REFERENCES `cliente` (`rut_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
