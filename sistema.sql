-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2019 a las 19:15:56
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Cliente_Actualizar` (IN `idcli` INT, IN `nom` VARCHAR(30), IN `doc` VARCHAR(20), IN `dir` VARCHAR(30), IN `bar` VARCHAR(30), IN `tel` VARCHAR(30))  begin 
  UPDATE cliente set
                            NombreCliente= nom,                                 
                            DocumentoCliente= doc,
                            DireccionCliente= dir,
                            BarrioCliente= bar,                                
                            TelefonoCliente= tel   
                            
 WHERE IdCliente = idcli;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Cliente_Comprobar_Existe_Documento` (IN `doc` VARCHAR(30))  begin  
SELECT DocumentoCliente FROM  cliente  WHERE DocumentoCliente = doc; 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Cliente_Comprobar_Existe_Documento_Actualizar` (IN `DocActual` VARCHAR(30), IN `doc` VARCHAR(30))  begin  
SELECT DocumentoCliente FROM cliente where not DocumentoCliente = DocActual and DocumentoCliente = doc;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Cliente_Consultar_Por_Documento` (IN `doc` VARCHAR(30))  begin  
 SELECT IdCliente,NombreCliente,ApellidoCliente from
      cliente  WHERE DocumentoCliente= doc; 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Cliente_Consultar_Tabla` ()  begin 
 
 SELECT IdCliente,NombreCliente,DocumentoCliente,DireccionCliente,BarrioCliente,TelefonoCliente,EmailCliente,NumeroCompraCliente from cliente;
 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Cliente_Eliminar` (IN `id` INT)  begin  
DELETE FROM  cliente  WHERE IdCliente = id; 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Cliente_Insertar` (IN `nom` VARCHAR(30), IN `ape` VARCHAR(30), IN `Idtp` INT, IN `doc` VARCHAR(30), IN `dir` VARCHAR(50), IN `bar` VARCHAR(50), IN `tel` VARCHAR(50), IN `ema` VARCHAR(50), IN `tpcli` VARCHAR(50), IN `numcop` VARCHAR(30), IN `idusu` INT)  begin 
 
  INSERT INTO cliente (NombreCliente,ApellidoCliente,IdTipoDocumento,DocumentoCliente,DireccionCliente,BarrioCliente,TelefonoCliente,EmailCliente,TipoCliente,NumeroCompraCliente,IdUsuario) VALUES (nom,ape,Idtp,doc,dir,bar,tel,ema,tpcli,numcop,idusu);
  
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DetalleFactura_Insertar` (IN `idfactura` INT, IN `idproducto` INT, IN `cantidad` INT, IN `subtotal` INT)  begin 
   INSERT INTO detallefactura (IdFactura,IdProducto,Cantidad,SubTotal) VALUES (idfactura,idproducto,cantidad,subtotal);
   
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Factura_Consular_Ultimo_Id` ()  begin 
 
SELECT MAX(IdFactura) as Id from factura;
 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Factura_Consular_Ultimo_Id_Mas_Cero` ()  begin 
 
SELECT MAX(NumeroFactura+0) as Num from factura;
 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Factura_Insertar` (IN `numerodefactura` VARCHAR(30), IN `cantidadtotal` INT, IN `valortotal` INT, IN `recibido` INT, IN `idcliente` INT, IN `idusuario` INT)  begin 
  INSERT INTO factura (NumeroFactura,CantidadTotal,TotalFactura,RecibidoFactura,IdCliente,IdUsuario) VALUES (numerodefactura,cantidadtotal,valortotal,recibido,idcliente,idusuario);
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Login_Consultar_Credenciales` (IN `usu` VARCHAR(30), IN `pass` VARCHAR(30))  begin  
select  IdUsuario,NombreUsuario,ApellidoUsuario from usuario where LoginUsuario= usu and PasswordUsuario= pass; 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Producto_Actualizar` (IN `id` INT, IN `nombre` VARCHAR(30), IN `cod` VARCHAR(20), IN `can` VARCHAR(30), IN `val` VARCHAR(30), IN `pro` VARCHAR(30))  begin 
  UPDATE producto set 
                      NombreProducto=nombre,
                      CodigoProducto=cod,
                      CantidadProducto=can,
                      ValorProducto=val,
                      ProveedorProducto=pro
                     WHERE IdProducto =id;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Producto_Comprobar_Codigo_Actualizar` (IN `CodActual` VARCHAR(30), IN `cod` VARCHAR(30))  begin  
SELECT CodigoProducto FROM producto where not CodigoProducto = CodActual and CodigoProducto =  cod;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Producto_Comprobar_Existe_Codigo` (IN `cod` VARCHAR(30))  begin  
SELECT CodigoProducto FROM  producto  WHERE CodigoProducto = cod; 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Producto_Consultar_Por_Codigo` (IN `cod` VARCHAR(30))  begin  
 SELECT IdProducto,NombreProducto,CantidadProducto,ValorProducto from
      producto  WHERE CodigoProducto= cod; 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Producto_Consultar_Tablar` ()  begin  
SELECT IdProducto,NombreProducto,CodigoProducto,CantidadProducto,StockMinimoProducto,ValorProducto,ProveedorProducto from producto;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Producto_Eliminar` (IN `id` INT)  begin  
DELETE FROM  producto  WHERE IdProducto = id; 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Producto_Insertar` (IN `nom` VARCHAR(30), IN `cod` VARCHAR(20), IN `can` VARCHAR(30), IN `sto` VARCHAR(30), IN `val` VARCHAR(30), IN `pro` VARCHAR(50), IN `idtip` INT, IN `idpro` INT, IN `idmar` INT, IN `act` VARCHAR(20))  begin 
  INSERT INTO producto (NombreProducto,CodigoProducto,CantidadProducto,StockMinimoProducto,ValorProducto,ProveedorProducto,IdTipoProducto,IdProveedor,IdMarca,ActivoProducto) VALUES (nom,cod,can,sto,val,pro,idtip,idpro,idmar,act);
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Proveedor_Actualizar` (IN `id` INT, IN `nombre` VARCHAR(30), IN `dir` VARCHAR(20), IN `nomcon` VARCHAR(30), IN `celcont` VARCHAR(30), IN `nit` VARCHAR(30), IN `pag` VARCHAR(30))  begin 
  UPDATE proveedor set 
                NombreProveedor=nombre
                ,DireccionProveedor=dir,
                NombreContactoProveedor=nomcon,
                CelularContactoProveedor=celcont,
                NitProveedor=nit,
                PaginaProveedor=pag
                 WHERE IdProveedor=id;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Proveedor_Comprobar_Existe_Nit` (IN `Nit` VARCHAR(30))  begin  
SELECT NitProveedor FROM  proveedor  WHERE NitProveedor = Nit; 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Proveedor_Comprobar_Existe_Nit_Actualizar` (IN `NitActual` VARCHAR(30), IN `Nit` VARCHAR(30))  begin  
SELECT NitProveedor FROM proveedor where not NitProveedor = NitActual and NitProveedor =  Nit;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Proveedor_Consultar_Tablar` ()  begin  
SELECT IdProveedor,NombreProveedor,DireccionProveedor,NombreContactoProveedor,CelularContactoProveedor,NitProveedor,PaginaProveedor from proveedor;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Proveedor_Eliminar` (IN `id` INT)  begin  
DELETE FROM  proveedor  WHERE IdProveedor= id; 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Proveedor_Insertar` (IN `nom` VARCHAR(30), IN `dir` VARCHAR(20), IN `nomcon` VARCHAR(30), IN `celcont` VARCHAR(30), IN `nit` VARCHAR(30), IN `pag` VARCHAR(50))  begin   
INSERT INTO proveedor (NombreProveedor,DireccionProveedor,NombreContactoProveedor,CelularContactoProveedor,NitProveedor,PaginaProveedor)VALUES
                 (nom,dir,nomcon,celcont,nit,pag);
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Usuario_Actualizar` (IN `id` INT, IN `login` VARCHAR(30), IN `pass` VARCHAR(20), IN `nom` VARCHAR(30), IN `ape` VARCHAR(30), IN `doc` VARCHAR(30), IN `ema` VARCHAR(50), IN `idperf` INT)  begin 
  UPDATE usuario set LoginUsuario= login,
                PasswordUsuario= pass,
                NombreUsuario= nom,
                ApellidoUsuario= ape,
                DocumentoUsuario= doc,                                
                EmailUsuario= ema,
                IdPerfil= idperf
                WHERE IdUsuario = id;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Usuario_Comprobar_Existe_Documento` (IN `doc` VARCHAR(30))  begin 
 
 SELECT DocumentoUsuario FROM  usuario  WHERE DocumentoUsuario = doc;
 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Usuario_Comprobar_Existe_Documento_Actualizar` (IN `DocActual` VARCHAR(30), IN `doc` VARCHAR(30))  begin  
SELECT DocumentoUsuario FROM usuario where not DocumentoUsuario = DocActual and DocumentoUsuario =  doc;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Usuario_Comprobar_Existe_Login` (IN `log` VARCHAR(30))  begin 
 
 SELECT LoginUsuario FROM  usuario  WHERE LoginUsuario = log;
 
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Usuario_Comprobar_Existe_Login_Actualizar` (IN `LogActual` VARCHAR(30), IN `log` VARCHAR(30))  begin  
SELECT LoginUsuario FROM usuario where not LoginUsuario = LogActual and LoginUsuario =  log;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Usuario_Consultar_Tabla` ()  begin
 
SELECT IdUsuario,LoginUsuario,PasswordUsuario,NombreUsuario,ApellidoUsuario,DocumentoUsuario,EmailUsuario,IdPerfil from usuario where not IdUsuario=1
;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Usuario_Eliminar` (IN `Id_Usuario` INT)  begin
   DELETE FROM  usuario  WHERE IdUsuario =Id_Usuario;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Usuario_Insertar` (IN `login` VARCHAR(30), IN `pass` VARCHAR(20), IN `nom` VARCHAR(30), IN `ape` VARCHAR(30), IN `doc` VARCHAR(30), IN `dir` VARCHAR(50), IN `ema` VARCHAR(50), IN `cel` VARCHAR(30), IN `idocu` INT, IN `idperf` INT)  begin
 
   INSERT INTO usuario (LoginUsuario,PasswordUsuario,NombreUsuario,ApellidoUsuario,DocumentoUsuario,DireccionUsuario,EmailUsuario,CelularUsuario,IdTipoDocumento,IdPerfil)
   VALUES  (login,pass,nom,ape,doc,dir,ema,cel,idocu,idperf);
 end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `IdCiudad` int(11) NOT NULL,
  `NombreCiudad` varchar(20) NOT NULL,
  `AbreviaturaCiudad` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`IdCiudad`, `NombreCiudad`, `AbreviaturaCiudad`) VALUES
(1, 'Barranquilla', 'Bquilla'),
(2, 'Cartagena', 'Ctgna'),
(5, 'Bucaramanga', 'B/ga'),
(6, 'Cucuta', 'C/ta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `IdCliente` int(11) NOT NULL,
  `NombreCliente` varchar(30) DEFAULT NULL,
  `ApellidoCliente` varchar(30) DEFAULT NULL,
  `IdTipoDocumento` int(11) DEFAULT NULL,
  `DocumentoCliente` varchar(20) DEFAULT NULL,
  `DireccionCliente` varchar(30) DEFAULT NULL,
  `BarrioCliente` varchar(30) DEFAULT NULL,
  `TelefonoCliente` varchar(20) DEFAULT NULL,
  `EmailCliente` varchar(50) DEFAULT NULL,
  `TipoCliente` varchar(20) DEFAULT NULL,
  `NumeroCompraCliente` int(11) DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `ActivoCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IdCliente`, `NombreCliente`, `ApellidoCliente`, `IdTipoDocumento`, `DocumentoCliente`, `DireccionCliente`, `BarrioCliente`, `TelefonoCliente`, `EmailCliente`, `TipoCliente`, `NumeroCompraCliente`, `IdUsuario`, `ActivoCliente`) VALUES
(1, 'Jesus', 'Escalante', 1, '123456', 'Calle 45# 45-76', 'La Pradera', '6554785485', 'jesus@gmail.com', 'Natural', 0, 1, 1),
(9, 'Adonis', 'Fredez', 1, '123456789', 'Calle 4d # 27A', 'La candelari', '63254875', 'alonso@gmail.com', 'Natural', 9, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `IdDetalleFactura` int(11) NOT NULL,
  `IdFactura` int(11) DEFAULT NULL,
  `IdProducto` int(11) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL,
  `SubTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`IdDetalleFactura`, `IdFactura`, `IdProducto`, `Cantidad`, `SubTotal`) VALUES
(3, 2, 1, 1, 25000),
(4, 3, 1, 1, 25000),
(5, 4, 1, 1, 25000),
(6, 5, 1, 1, 25000),
(7, 7, 1, 1, 25000),
(8, 8, 1, 1, 25000),
(9, 9, 1, 1, 25000);

--
-- Disparadores `detallefactura`
--
DELIMITER $$
CREATE TRIGGER `before_ventas_delete` BEFORE DELETE ON `detallefactura` FOR EACH ROW begin
   update producto set CantidadProducto=producto.CantidadProducto+old.Cantidad
     where old.IdProducto=producto.IdProducto; 
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_ventas_insert` BEFORE INSERT ON `detallefactura` FOR EACH ROW begin
   update producto set CantidadProducto=producto.CantidadProducto-new.Cantidad
     where new.IdProducto=producto.IdProducto; 
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepago`
--

CREATE TABLE `detallepago` (
  `IdDetallePago` int(11) NOT NULL,
  `IdFactura` int(11) DEFAULT NULL,
  `IdTipoPago` int(11) DEFAULT NULL,
  `ValorDetallePago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `IdFactura` int(11) NOT NULL,
  `NumeroFactura` varchar(20) NOT NULL,
  `CantidadTotal` int(11) NOT NULL,
  `TotalFactura` int(11) NOT NULL,
  `RecibidoFactura` int(11) NOT NULL,
  `FechaFacturaVenta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdCliente` int(11) DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`IdFactura`, `NumeroFactura`, `CantidadTotal`, `TotalFactura`, `RecibidoFactura`, `FechaFacturaVenta`, `IdCliente`, `IdUsuario`) VALUES
(1, '1', 1, 25000, 25000, '2019-08-10 18:55:37', 9, 1),
(2, '2', 1, 25000, 25000, '2019-08-10 18:57:17', 9, 1),
(3, '3', 1, 25000, 25000, '2019-08-10 19:12:22', 9, 1),
(4, '4', 1, 25000, 25000, '2019-08-10 19:16:36', 9, 1),
(5, '5', 1, 25000, 25000, '2019-08-10 19:16:59', 9, 1),
(6, '6', 1, 25000, 25000, '2019-08-10 19:49:38', 9, 1),
(7, '7', 1, 25000, 25000, '2019-08-10 19:50:17', 9, 1),
(8, '8', 1, 25000, 25000, '2019-08-10 20:02:48', 9, 1),
(9, '9', 1, 25000, 25000, '2019-08-10 20:04:08', 9, 1);

--
-- Disparadores `factura`
--
DELIMITER $$
CREATE TRIGGER `before_Factura_delete_NumeroCompracliente` BEFORE DELETE ON `factura` FOR EACH ROW begin 

update cliente set NumeroCompraCliente=cliente.NumeroCompraCliente-1
where old.IdCliente =cliente.IdCliente;

 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_Factura_insert_NumeroCompracliente` BEFORE INSERT ON `factura` FOR EACH ROW begin
   update cliente set NumeroCompraCliente=cliente.NumeroCompraCliente+1
   where new.IdCliente =cliente.IdCliente; 
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `IdMarca` int(11) NOT NULL,
  `NombreMarca` varchar(20) NOT NULL,
  `NumeroReferencia` varchar(20) NOT NULL,
  `ActivoMarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`IdMarca`, `NombreMarca`, `NumeroReferencia`, `ActivoMarca`) VALUES
(1, 'hp', '01', 1),
(2, 'Huawei', '02', 1),
(3, 'Lg', '03', 1),
(4, 'Alcathel', '04', 1),
(5, 'samsun', '05', 0),
(6, 'sonic', '06', 0),
(7, 'Apple', '07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `IdPerfil` int(11) NOT NULL,
  `NombrePerfil` varchar(20) DEFAULT NULL,
  `ModuloUsuario` varchar(1) DEFAULT NULL,
  `ModuloCliente` varchar(1) DEFAULT NULL,
  `ModuloFactura` varchar(1) DEFAULT NULL,
  `ModuloProveedor` varchar(1) DEFAULT NULL,
  `ModuloMarca` varchar(1) DEFAULT NULL,
  `ModuloTipoProduto` varchar(1) DEFAULT NULL,
  `ModuloProducto` varchar(1) DEFAULT NULL,
  `ModuloReporteFactura` varchar(1) DEFAULT NULL,
  `ModuloRestaurar` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`IdPerfil`, `NombrePerfil`, `ModuloUsuario`, `ModuloCliente`, `ModuloFactura`, `ModuloProveedor`, `ModuloMarca`, `ModuloTipoProduto`, `ModuloProducto`, `ModuloReporteFactura`, `ModuloRestaurar`) VALUES
(1, 'Administrador', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `NombreProducto` varchar(20) NOT NULL,
  `CodigoProducto` varchar(20) NOT NULL,
  `CantidadProducto` int(11) NOT NULL,
  `StockMinimoProducto` int(11) NOT NULL,
  `ValorProducto` int(11) NOT NULL,
  `ProveedorProducto` varchar(50) NOT NULL,
  `IdTipoProducto` int(11) DEFAULT NULL,
  `IdProveedor` int(11) DEFAULT NULL,
  `IdMarca` int(11) DEFAULT NULL,
  `ActivoProducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `NombreProducto`, `CodigoProducto`, `CantidadProducto`, `StockMinimoProducto`, `ValorProducto`, `ProveedorProducto`, `IdTipoProducto`, `IdProveedor`, `IdMarca`, `ActivoProducto`) VALUES
(1, 'mause', '01', 33, 1, 25000, 'Cameron', 1, 1, 1, 1),
(2, 'Teclado', '02', 40, 1, 35000, 'Olimpica', 2, 2, 2, 1),
(8, 'RAM', '03', 50, 1, 2000, 'Granero', 1, 1, 1, 1),
(9, 'Cargador', '05', 30, 1, 83000, 'Olimpica', 7, 1, 7, 1),
(11, 'Camara', '06', 60, 2, 17500, 'Carulla', 1, 1, 1, 1),
(12, 'Audifono', '07', 60, 2, 45800, 'Exito', 1, 1, 1, 1),
(13, 'Cable USB', '08', 45, 2, 1500, 'Jumbo', 1, 1, 1, 1),
(14, 'Gafas virtuales', '04', 45, 2, 16250, 'Exito', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `IdProveedor` int(11) NOT NULL,
  `NombreProveedor` varchar(20) NOT NULL,
  `DireccionProveedor` varchar(30) DEFAULT NULL,
  `NombreContactoProveedor` varchar(30) DEFAULT NULL,
  `CelularContactoProveedor` varchar(20) NOT NULL,
  `NitProveedor` varchar(20) NOT NULL,
  `PaginaProveedor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`IdProveedor`, `NombreProveedor`, `DireccionProveedor`, `NombreContactoProveedor`, `CelularContactoProveedor`, `NitProveedor`, `PaginaProveedor`) VALUES
(1, 'Olimpica', 'Calle 43', 'carlos', '65498778', '32169', 'olimpica@gmail.com'),
(2, 'El Mono', 'Calle 34', 'fredis', '6549878', '9875', 'elmono@gmail.com'),
(3, 'Sao Olimpica', 'Calle 54', 'camila', '5648789', '6548', 'sao@gmail.com'),
(4, 'Stack Pionter', 'Calle 65', 'Camilo', '311165487', '4568', 'stacpointer@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `IdTipoDocumento` int(11) NOT NULL,
  `NombreTipoDocumento` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`IdTipoDocumento`, `NombreTipoDocumento`) VALUES
(1, 'CC'),
(2, 'T.I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE `tipopago` (
  `IdTipoPago` int(11) NOT NULL,
  `NombreTipoPago` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `tipoproducto` (
  `IdTipoProducto` int(11) NOT NULL,
  `NombreTipoProducto` varchar(20) NOT NULL,
  `DescripcionTipoProducto` varchar(100) NOT NULL,
  `ActivoTipoProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`IdTipoProducto`, `NombreTipoProducto`, `DescripcionTipoProducto`, `ActivoTipoProducto`) VALUES
(1, 'Mauses', 'PC', 1),
(2, 'Teclados', 'PC', 1),
(3, 'Audifonos', 'PC', 1),
(4, 'Microfonos', 'PC', 1),
(5, 'Parlantes', 'PC', 0),
(6, 'Camara web', 'PC', 0),
(7, 'Cargador', 'PC', 0),
(8, 'Memoria SD', 'PC', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `LoginUsuario` varchar(20) NOT NULL,
  `PasswordUsuario` varchar(20) NOT NULL,
  `NombreUsuario` varchar(20) NOT NULL,
  `ApellidoUsuario` varchar(20) NOT NULL,
  `DocumentoUsuario` varchar(20) NOT NULL,
  `DireccionUsuario` varchar(20) NOT NULL,
  `EmailUsuario` varchar(20) NOT NULL,
  `CelularUsuario` varchar(50) NOT NULL,
  `IdTipoDocumento` int(11) DEFAULT NULL,
  `IdPerfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `LoginUsuario`, `PasswordUsuario`, `NombreUsuario`, `ApellidoUsuario`, `DocumentoUsuario`, `DireccionUsuario`, `EmailUsuario`, `CelularUsuario`, `IdTipoDocumento`, `IdPerfil`) VALUES
(1, 'admin', '1234', 'Josue', 'Delgado', '1003336215', 'Calle 34', 'josue@gmail.com', '3216548', 1, 1),
(4, 'user', '1234', 'Juan de la Rosa', 'Castro', '123456', '', 'juan@gmail.com', '325487854', 1, 1),
(5, 'factur', '1234', 'Jesus', 'Escalante', '789456', 'Calle 56', 'jesus@gmail.com', '3216549875', 1, 1),
(17, 'car', '1234', 'andelfo', 'Carrascal', '123321', 'Calle 45 # 45', 'andelfo', '65521458', 1, 1),
(18, 'mer', '1234', 'Maria', 'Sandoval', '45612177', 'Calle 45 # 67-98', 'mari@gmail.com', '31454548', 1, 1),
(19, 'san', '1234', 'Santiago', 'Trilla', '545621212', 'Calle 54 #098', 'santi@gmail.com', '222544848', 1, 1),
(23, 'can', '1234', 'Alfredo', 'Rodriguez', '123456123', 'Calle 4d # 27A-70', 'alfredo@hotmail.com', '78787', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`IdCiudad`),
  ADD UNIQUE KEY `NombreCiudad` (`NombreCiudad`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IdCliente`),
  ADD KEY `IdTipoDocumento` (`IdTipoDocumento`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`IdDetalleFactura`),
  ADD KEY `IdFactura` (`IdFactura`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `detallepago`
--
ALTER TABLE `detallepago`
  ADD PRIMARY KEY (`IdDetallePago`),
  ADD KEY `IdFactura` (`IdFactura`),
  ADD KEY `IdTipoPago` (`IdTipoPago`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`IdFactura`),
  ADD KEY `IdCliente` (`IdCliente`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`IdMarca`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`IdPerfil`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `IdTipoProducto` (`IdTipoProducto`),
  ADD KEY `IdProveedor` (`IdProveedor`),
  ADD KEY `IdMarca` (`IdMarca`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`IdProveedor`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`IdTipoDocumento`);

--
-- Indices de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`IdTipoPago`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`IdTipoProducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdTipoDocumento` (`IdTipoDocumento`),
  ADD KEY `IdPerfil` (`IdPerfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `IdCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `IdDetalleFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `detallepago`
--
ALTER TABLE `detallepago`
  MODIFY `IdDetallePago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `IdFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `IdMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `IdPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `IdProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `IdTipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  MODIFY `IdTipoPago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  MODIFY `IdTipoProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`IdTipoDocumento`) REFERENCES `tipodocumento` (`IdTipoDocumento`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `detallefactura_ibfk_1` FOREIGN KEY (`IdFactura`) REFERENCES `factura` (`IdFactura`),
  ADD CONSTRAINT `detallefactura_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`);

--
-- Filtros para la tabla `detallepago`
--
ALTER TABLE `detallepago`
  ADD CONSTRAINT `detallepago_ibfk_1` FOREIGN KEY (`IdFactura`) REFERENCES `factura` (`IdFactura`),
  ADD CONSTRAINT `detallepago_ibfk_2` FOREIGN KEY (`IdTipoPago`) REFERENCES `tipopago` (`IdTipoPago`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`IdTipoProducto`) REFERENCES `tipoproducto` (`IdTipoProducto`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedor` (`IdProveedor`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`IdMarca`) REFERENCES `marca` (`IdMarca`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IdTipoDocumento`) REFERENCES `tipodocumento` (`IdTipoDocumento`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`IdPerfil`) REFERENCES `perfil` (`IdPerfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
