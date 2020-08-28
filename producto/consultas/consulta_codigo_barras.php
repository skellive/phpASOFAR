<?php
require_once ('../../conexion.php');


try {
	$mysql = new connection();
	$conexion = $mysql->get_connection();
	$datos = array("op" => 1);
	$statement = $conexion->prepare("CALL listarProductosCompras(?)");
	$statement->bind_param("i",$datos["op"]);
	$statement->execute();
	$rows = array();
		while($r = mysqli_fetch_assoc($statement)){
			$rows[] = $r;
		}
	header('Content-Type: application/json; charset=utf8');
	echo json_encode($rows, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
	$statement->close();
	$conexion->close();
} catch (mysqli_sql_exception $e) {
    die('Failed: '.$e->getMessage());
}


?>