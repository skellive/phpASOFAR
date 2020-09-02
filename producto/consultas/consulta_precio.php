<?php
require_once ('../../conexion.php');

$mysql = new connection();

try {
    if (!empty($_POST["id"])) {
        $id = $_POST["id"];
        $conexion = $mysql->get_connection();
        $sql = "SELECT  precios.id_precio AS 'Control', productos.id_productos AS 'Codigo', productos.nombre AS 'Nombre del Producto', productos.descripcion AS 'Descripcion', tipo.nombre AS 'Tipo', 
        medidas.nombre_medida AS 'Medida', envase.nombre AS 'Envase', marcas.nombre AS 'Marca', stock.cantidad AS 'Stock', 
        productos.iva AS 'Iva', precios.precio_venta  AS 'Precio de Venta', precios.`precio_compra` AS 'Precio de Compra'
        FROM precios 
        INNER JOIN productos ON  precios.id_producto = productos.id_productos 
        INNER JOIN tipo ON tipo.id_tipo = productos.id_tipo 
        INNER JOIN medidas ON medidas.id_medidas = productos.id_medidas
        INNER JOIN envase ON envase.id_envase = productos.id_envase
        INNER JOIN marcas ON marcas.id_marcas = productos.id_marcas
        INNER JOIN stock ON stock.id_precio = precios.id_precio
        WHERE precios.estado = 'A' AND precios.id_precio = $id";

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