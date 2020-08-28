<?php
require_once ('../../conexion.php');
$mysql = new connection();
$conexion = $mysql->get_connection();
$envase='BOTELLA';
//Consulata
//@valor1 esta demas pero es necesario
$sql='CALL insertarEnvaseProducto(?,@valor1)'; 
$statement = $conexion->prepare($sql);
//  i=int s=string d=decimal
$statement->bind_param('s',$envase);
$statement->execute();
$statement->close();
$conexion->close();




?>