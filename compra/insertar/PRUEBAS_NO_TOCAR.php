<?php
require_once('../metodos/Metodos.php');
$metodos = new Metodos();
date_default_timezone_set("America/Guayaquil");
$fechaHora = date('Y-m-d H:i:s');
$fecha = date('Y-m-d');

$id_proveedor=10;
$id_usuario=2;
$fecha_creacion=$fechaHora;
$plazo="Inmediato";
$forma_pago="Contado";
$iva=4.14;
$descuento=0;
$total=38.64;


$id_cabecera_nota_pedidos=$metodos->insertarCabeceraNotaPedido(
$id_proveedor,
$id_usuario,
$fecha_creacion,
$plazo,
$forma_pago,
$iva,
$descuento,
$total);

?>