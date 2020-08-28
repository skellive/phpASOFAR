<?php
require_once ('../../conexion.php');
$mysql = new connection();
$conexion = $mysql->get_connection();
//consulta
$sql="CALL insertarEnvaseProducto(?,?)";
$statement = $conexion->prepare($sql);
//  i=int s=string d=decimal
$statement->bind_param("i",1);
$statement->execute();
$statement->close();
$conexion->close();




?>