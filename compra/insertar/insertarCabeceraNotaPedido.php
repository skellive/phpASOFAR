<?php
/*
//DATOS PARA PROBAR
date_default_timezone_set("America/Guayaquil");
$fechaHora = date('Y-m-d H:i:s');
$_POST["id_proveedor"] = 9;
$_POST["id_usuario"] = 2;
$_POST["fecha_creacion"] = $fechaHora;
$_POST["plazo"] = "Inmediato";
$_POST["forma_pago"] = "Contado";
$_POST["iva"] = 4.14;
$_POST["descuento"] = 0;
$_POST["total"] = 38.64;
*/
try {
    if (
        !empty($_POST["id_proveedor"]) ||
        !empty($_POST["id_usuario"]) ||
        !empty($_POST["fecha_creacion"]) ||
        !empty($_POST["plazo"]) ||
        !empty($_POST["forma_pago"]) ||
        !empty($_POST["iva"]) ||
        !empty($_POST["descuento"]) ||
        !empty($_POST["total"])
    ) {
        //Metodos
        require_once('../metodos/Metodos.php');
        $metodos = new Metodos();

        //guardar los datos en variables
        $id_proveedor = $_POST["id_proveedor"];
        $id_usuario = $_POST["id_usuario"];
        $fecha_creacion = $_POST["fecha_creacion"];
        $plazo =$_POST["plazo"];
        $forma_pago = $_POST["forma_pago"];
        $iva = $_POST["iva"];
        $descuento = $_POST["descuento"];
        $total = $_POST["total"];

        $id_cabecera_nota_pedidos=$metodos->insertarCabeceraNotaPedido(
            $id_proveedor,
            $id_usuario,
            $fecha_creacion,
            $plazo,
            $forma_pago,
            $iva,
            $descuento,
            $total);
       
    } else {
        echo ('CAMPO VACIO');
    }
} catch (Exception $e) {
    die('Failed: ' . $e->getMessage());
}
