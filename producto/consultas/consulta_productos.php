<?php
require_once ('../../conexion.php');


try {
	/* con id */
	if (!empty($_POST["id"])) {
        $id = $_POST["id"];
        $conexion = $mysql->get_connection();
        $sql = "SELECT p.id_productos,p.codigo_barras,p.nombre,p.descripcion,p.fecha_registro,p.peso,p.id_tipo,t.nombre AS tipo,p.id_medidas,m.nombre_medida AS medida,
        p.id_envase,e.nombre AS envase ,p.id_marcas, ma.nombre AS marca, p.id_usuario, p.iva , p.cantidad_minima,p.receta,p.unidades
        FROM productos p
        INNER JOIN tipo t ON t.id_tipo = p.id_tipo 
        INNER JOIN medidas m ON m.id_medidas= p.id_medidas
        INNER JOIN envase e ON e.id_envase= p.id_envase
        INNER JOIN marcas ma ON ma.id_marcas= p.id_marcas
        WHERE p.estado='A' AND p.id_productos = $id";
        
        $statement = mysqli_query($conexion, $sql);

		while($rows = mysqli_fetch_assoc($statement)){
			echo json_encode($rows, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
		}
        header('Content-Type: application/json; charset=utf8');

        $statement->close();
        $conexion->close();
    } else {
         echo ('CAMPO VACIO');
	}
	/*  */
} catch (Exception $e) {
    die('Failed: '.$e->getMessage());
}

/*try {
	//code...    //productos por envase
    if (!empty($_POST["estado"])) {
        $estado = $_POST["estado"];
        $conexion = $mysql->get_connection();
        $sql = "CALL listarPoductosCompras($estado)";
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
}  catch (Exception $e) {
    die('Failed: '.$e->getMessage());
}*/


?>