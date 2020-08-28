<?php
require_once ('../../conexion.php');
$mysql = new connection();
$conexion = $mysql->get_connection();
//consulta
$sql="CALL insertarEnvaseProducto(?,?)";
$statement = $conexion->prepare($sql);
//  i=int s=string d=decimal
$statement->bind_param("s","GOTERO");
$statement->bind_param("s","valor1");// ESTE ESTA POR LAS PURAS
$statement->execute();
$statement->close();
$conexion->close();




?>