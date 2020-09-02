<?php
require_once ('../../conexion.php');

$mysql = new connection();

try {
    if (!empty($_POST["id"])) {
        $id = $_POST["id"];
        $conexion = $mysql->get_connection();
        $sql = "SELECT k.idkardex, k.id_producto, p.nombre as nombreProducto, k.id_sucursal, s.nombre as nombreSucursal, k.id_detalle_compra, dc.cantidad, dc.descuento,dc.precio, dc.iva,
        k.saldoActual from kardex k
        inner join productos p
        on k.id_producto = p.id_productos
        inner join sucursal s
        on k.id_sucursal = s.id_sucursal
        inner join detalle_compra dc
        on k.id_detalle_compra = dc.id_detalle_compra
        where p.estado = 'A' AND k.idkardex = $id";

        $statement = mysqli_query($conexion, $sql);

		while($rows = mysqli_fetch_assoc($statement)){
			echo json_encode($rows, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
		}
        header('Content-Type: application/json; charset=utf8');

        $statement->close();
        $conexion->close();
        } else {
            echo('CAMPO VACIO');
        }  
} catch (Exception $e) {
    die('Failed: '.$e->getMessage());
}
?>