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

echo $IdProducto."<br>";
echo $fechaHora=$buscar->fechaHoraActual();

/*

require_once('../../conexion.php');
$mysql = new connection();
$conexion = $mysql->get_connection();

$sql = 'CALL actualizarPrecioCompra(?,?,?,?,?,?,?,?,@valor1)';
$statement = $conexion->prepare($sql);
//  i=int s=string d=decimal
$statement->bind_param('ssss', $Codigo_barras,$Nombre,$Descripcion,$fecha);
$statement->bind_param('diii', $Peso,$Id_tipo,$Id_medidas,$Id_envase);
$statement->execute();
$statement->close();
$conexion->close();
*/


?>