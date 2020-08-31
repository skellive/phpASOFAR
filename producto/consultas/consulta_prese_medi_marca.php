<?php
require_once ('../../conexion.php');

$mysql = new connection();

try {
    if (!empty($_POST["id"])) {
        $id = $_POST["id"];
        $conexion = $mysql->get_connection();
        $sql = "SELECT pro.id_marcas as idMarcas, ma.nombre as Marca, pro.id_medidas as idMedidas, me.nombre_medida as Medida, pro.id_presentacion as idPresentacion ,pre.nombre as Presentacion
        from productos pro
        INNER JOIN presentaciones pre
        ON pro.id_presentacion = pre.idPresentaciones
        INNER JOIN marcas ma
        ON pro.id_marcas = ma.id_marcas
        INNER JOIN medidas me
        ON pro.id_medidas = me.id_medidas
        where pro.id_productos = $id and pre.estado = 'A' and me.estado = 'A' and ma.estado = 'A'";

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