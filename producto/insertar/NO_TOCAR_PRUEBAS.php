<?php 
require_once('../metodos/Buscar.php');
$buscar = new Bucar();

//DATOS PARA PROBAR
$Codigo_barras = '00008';
$Nombre = 'PELUCHE';
$Descripcion = 'PELUCHE X 1';
$Peso = 5.00;
$Id_tipo = 13;
$Id_medidas = 14;
$Id_envase = 6;
$Id_marcas = 4;
$Id_usuario = 44;
$Iva = 'NO';
$Cantidad_minima = 1;
$Receta = 'SIN RECETA';
$Unidades = 0;
$fecha = '2020-08-31';

echo$IdProducto = $buscar->buscarProductoNuevo(
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
$Unidades);



?>