-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-07-2020 a las 18:42:29
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha_creado` datetime NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `nombre`, `fecha_creado`, `fecha_modificado`) VALUES
(1, 'Almacen en tienda Cajigal', '2019-11-23 00:00:00', NULL),
(2, 'Almacen en tienda cuatla', '2019-11-23 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen_sucursal`
--

CREATE TABLE `almacen_sucursal` (
  `sucursal_id` int(11) NOT NULL,
  `almacen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `almacen_sucursal`
--

INSERT INTO `almacen_sucursal` (`sucursal_id`, `almacen_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrador', '1', 1595898942);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/producto/*', 2, NULL, NULL, NULL, 1595899348, 1595899348),
('administrador', 1, NULL, NULL, NULL, 1595898385, 1595898385),
('ProductoManager', 2, 'Administra el Producto', NULL, NULL, 1595899495, 1595899495);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('ProductoManager', '/producto/*'),
('administrador', 'ProductoManager');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `creado`, `modificado`) VALUES
(1, 'Abarrotes', '2019-11-23 00:00:00', NULL),
(2, 'Bebidas', '2019-11-23 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `creado` date NOT NULL,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `creado`, `empresa_id`) VALUES
(1, 'Venta monstrador', '2019-11-28', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_nota`
--

CREATE TABLE `detalle_nota` (
  `id` int(11) NOT NULL,
  `nota_id` int(11) NOT NULL,
  `unidad_id` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `descripion` varchar(255) NOT NULL,
  `costo` decimal(10,5) NOT NULL,
  `precio` decimal(10,5) NOT NULL,
  `total` decimal(10,5) NOT NULL,
  `creado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_nota`
--

INSERT INTO `detalle_nota` (`id`, `nota_id`, `unidad_id`, `cantidad`, `descripion`, `costo`, `precio`, `total`, `creado`) VALUES
(1, 1, 4, 1, 'Boing de 500ml', '5.00000', '6.00000', '6.00000', '2019-12-03'),
(2, 2, 4, 1, 'Amper 500 ml.', '8.00000', '10.00000', '10.00000', '2019-12-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `descripcion`, `creado`, `modificado`) VALUES
(1, 'Empresa Fundadora', '2019-11-28 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `empresa_id`, `descripcion`, `creado`, `modificado`) VALUES
(1, 1, 'Sin Marca', '2019-11-23 00:00:00', NULL),
(2, 1, 'Boing', '2019-11-23 00:00:00', NULL),
(3, 1, 'Coca-Cola', '2019-11-28 00:00:00', NULL),
(4, 1, 'Amper', '2019-12-03 00:00:00', NULL),
(5, 1, 'Vitaloe', '2019-12-03 00:00:00', NULL),
(6, 1, 'Purisima', '2019-12-03 00:00:00', NULL),
(7, 1, 'Bonafon', '2019-12-03 00:00:00', NULL),
(8, 1, 'Arizona', '2019-12-03 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1595707823),
('m140506_102106_rbac_init', 1595708590),
('m140602_111327_create_menu_table', 1595896582),
('m160312_050000_create_user', 1595896584),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1595708592),
('m180523_151638_rbac_updates_indexes_without_prefix', 1595708594),
('m200409_110543_rbac_update_mssql_trigger', 1595708595);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`id`, `descripcion`, `creado`, `modificado`) VALUES
(1, 'Ingreso por compra', '2019-12-01 00:00:00', NULL),
(2, 'Salida por venta', '2019-12-01 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_almacen`
--

CREATE TABLE `movimiento_almacen` (
  `id` int(11) NOT NULL,
  `almacen_id` int(11) NOT NULL,
  `movimiento_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `fecha_movimiento` datetime NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimiento_almacen`
--

INSERT INTO `movimiento_almacen` (`id`, `almacen_id`, `movimiento_id`, `producto_id`, `cantidad`, `fecha_movimiento`, `creado`, `modificado`) VALUES
(1, 1, 1, 5, 10000, '2019-12-01 00:00:00', '2019-12-01 00:00:00', NULL),
(2, 1, 1, 6, 10, '2019-12-03 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 1, 1, 6, 10, '2019-12-03 00:00:00', '2019-12-03 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `id` int(11) NOT NULL,
  `clientes_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `total` decimal(10,5) DEFAULT NULL,
  `fecha_nota` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`id`, `clientes_id`, `empresa_id`, `total`, `fecha_nota`) VALUES
(1, 1, 1, '6.00000', '2019-12-03 00:00:00'),
(2, 1, 1, '10.00000', '2019-12-03 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `marca_id` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `unidad_id` int(11) NOT NULL,
  `sku` varchar(45) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `costo_unidad` decimal(10,5) NOT NULL,
  `precio_unidad` decimal(10,5) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `empresa_id`, `marca_id`, `proveedor_id`, `categoria_id`, `unidad_id`, `sku`, `descripcion`, `costo_unidad`, `precio_unidad`, `activo`, `creado`, `modificado`) VALUES
(5, 1, 1, 2, 1, 1, '1', 'Azucar', '0.00000', '0.00000', 0, '2019-11-28 00:00:00', NULL),
(6, 1, 2, 3, 2, 4, '77723265989', 'Boing de 500ml', '5.00000', '6.00000', 1, '2019-12-01 00:00:00', NULL),
(7, 1, 4, 2, 2, 4, '12345', 'Amper 500 ml.', '8.00000', '10.00000', 1, '2019-12-03 00:00:00', NULL),
(8, 1, 5, 2, 2, 4, '1234', 'Vitaloe 500 ml.', '12.00000', '13.00000', 1, '2019-12-03 00:00:00', NULL),
(9, 1, 6, 2, 2, 4, '123565', 'Agua purificada de 20 lts', '25.00000', '27.00000', 1, '2019-12-03 00:00:00', NULL),
(10, 1, 7, 4, 2, 4, '123568', 'Agua bonafond 1.5 Lts.', '12.00000', '13.00000', 1, '2019-12-03 00:00:00', NULL),
(11, 1, 7, 4, 2, 4, '', 'Agua Bonafon 1 Lts.', '9.00000', '11.00000', 1, '2019-12-03 00:00:00', NULL),
(12, 1, 7, 4, 2, 4, '', 'Agua Bonafon 600 ml', '7.00000', '8.00000', 1, '2019-12-03 00:00:00', NULL),
(13, 1, 8, 2, 2, 4, '', 'Arizona', '12.00000', '13.00000', 1, '2019-12-03 00:00:00', NULL),
(14, 1, 2, 3, 2, 4, '3135456', 'Boing 1 Lt.', '17.00000', '18.00000', 1, '2019-12-03 00:00:00', NULL),
(15, 1, 4, 3, 2, 4, '12345', 'Boing 250 ml.', '7.00000', '8.00000', 1, '2020-07-03 00:00:00', '2019-12-03 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `empresa_id`, `nombre`, `creado`, `modificado`) VALUES
(1, 1, 'Coca cola', '2019-11-23 00:00:00', NULL),
(2, 1, 'La placita', '2019-11-23 00:00:00', NULL),
(3, 1, 'Boing', '2019-11-28 01:00:00', NULL),
(4, 1, 'Bonafond', '2019-12-03 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id`, `empresa_id`, `nombre`, `direccion`, `creado`, `modificado`) VALUES
(1, 1, 'Yautepec', 'Cajigal', '2019-11-23 00:00:00', NULL),
(2, 1, 'Cuautla', 'Insurgentes # 10', '2019-11-23 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `creado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id`, `nombre`, `creado`) VALUES
(1, 'Gramos', '2019-11-28 00:00:00'),
(2, 'Mililitros', '2019-11-28 00:00:00'),
(3, 'Cuartillo', '2019-11-28 00:00:00'),
(4, 'Pieza', '2019-11-28 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `names` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `names`, `password`) VALUES
(1, 'pablo', 'Pablo Perez', '$2y$13$Qu62UOvfILjS6xGXkmNEE.b6gSnCPcj3U2dnmmSIOr5TfRHtgU3fa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `almacen_sucursal`
--
ALTER TABLE `almacen_sucursal`
  ADD KEY `fk_almacen_sucursal_sucursal1_idx` (`sucursal_id`),
  ADD KEY `fk_almacen_sucursal_almacen1_idx` (`almacen_id`);

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clientes_empresa1_idx` (`empresa_id`);

--
-- Indices de la tabla `detalle_nota`
--
ALTER TABLE `detalle_nota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_nota_nota1_idx` (`nota_id`),
  ADD KEY `fk_detalle_nota_unidad1_idx` (`unidad_id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_marca_empresa1_idx` (`empresa_id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimiento_almacen`
--
ALTER TABLE `movimiento_almacen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_movimiento_almacen_almacen1_idx` (`almacen_id`),
  ADD KEY `fk_movimiento_almacen_movimiento1_idx` (`movimiento_id`),
  ADD KEY `fk_movimiento_almacen_producto1_idx` (`producto_id`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nota_clientes1_idx` (`clientes_id`),
  ADD KEY `fk_nota_empresa1_idx` (`empresa_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_marca1_idx` (`marca_id`),
  ADD KEY `fk_producto_proveedor1_idx` (`proveedor_id`),
  ADD KEY `fk_producto_categoria1_idx` (`categoria_id`),
  ADD KEY `fk_producto_unidad1_idx` (`unidad_id`),
  ADD KEY `fk_producto_empresa1_idx` (`empresa_id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proveedor_empresa1_idx` (`empresa_id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sucursal_empresa1_idx` (`empresa_id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_nota`
--
ALTER TABLE `detalle_nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `movimiento_almacen`
--
ALTER TABLE `movimiento_almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen_sucursal`
--
ALTER TABLE `almacen_sucursal`
  ADD CONSTRAINT `fk_almacen_sucursal_almacen1` FOREIGN KEY (`almacen_id`) REFERENCES `almacen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_almacen_sucursal_sucursal1` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_nota`
--
ALTER TABLE `detalle_nota`
  ADD CONSTRAINT `fk_detalle_nota_nota1` FOREIGN KEY (`nota_id`) REFERENCES `nota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_nota_unidad1` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `fk_marca_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimiento_almacen`
--
ALTER TABLE `movimiento_almacen`
  ADD CONSTRAINT `fk_movimiento_almacen_almacen1` FOREIGN KEY (`almacen_id`) REFERENCES `almacen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimiento_almacen_movimiento1` FOREIGN KEY (`movimiento_id`) REFERENCES `movimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimiento_almacen_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_nota_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nota_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_marca1` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_proveedor1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_unidad1` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_proveedor_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `fk_sucursal_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
