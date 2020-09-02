<?php
require_once ('../../conexion.php');

$mysql = new connection();

try {
    if (!empty($_POST["id"])) {
        $id = $_POST["id"];
        $conexion = $mysql->get_connection();
        $sql = "SELECT pro.id_proveedor as id_proveedor, pro.id_proveedor_clase as id_clase, pro.cedula_ruc as cedula, pro.entidad as entidad, 
        pro.representante as representante, prov_c.clase  from proveedor pro
        inner join proveedor_clase prov_c
        on pro.id_proveedor_clase = prov_c.id_proclase
        Where pro.id_proveedor = $id and pro.estado = 'A';";

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