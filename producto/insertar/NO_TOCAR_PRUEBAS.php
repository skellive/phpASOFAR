<?php 
require_once('../metodos/Buscar.php');
$buscar = new Bucar();

//DATOS PARA PROBAR
$Codigo_barras = '00005';
$Nombre = 'ARROZ';
$Descripcion = 'SACO X 1';
$Peso = 5.00;
$Id_tipo = 13;
$Id_medidas = 7;
$Id_envase = 8;
$Id_marcas = 4;
$Id_usuario = 43;
$Iva = 'NO';
$Cantidad_minima = 1;
$Receta = 'SIN RECETA';
$Unidades = 0;
$fecha = '2020-08-28';
/*
$IdProducto = $buscar->buscarProductoNuevo(
    $Nombre,
    $Descripcion,
    $fecha,
    $Peso,
    $Id_tipo,
    $Id_medidas,
    $Id_envase,
    $Id_marcas,
    $Id_usuario,
    $Iva,
    $Cantidad_minima,
    $Receta,
    $Unidades );
    */
$IdProducto=48;
$fechaHora=$buscar->fechaHoraActual();
$PrecioCompra=1.10;
$PrecioVenta=1.53;
$Porcentaje=40;


$buscar->insertarPrecioProducto($IdProducto,$PrecioCompra,$PrecioVenta,$fechaHora,$Id_usuario,$Porcentaje);



?>