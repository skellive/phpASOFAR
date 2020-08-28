<?php
//$_POST["medida"]="2G";


try {
   if (!empty($_POST["medida"])) {
    $medida = $_POST["medida"];
    require_once('../../conexion.php');
    $mysql = new connection();
    $conexion = $mysql->get_connection();
    //Consulta
    //@valor1 esta demas pero es necesario   
    $sql = 'CALL insertarMedidaProducto(?,@valor1)';
    $statement = $conexion->prepare($sql);
    //  i=int s=string d=decimal
    $statement->bind_param('s', $medida);
    $statement->execute();
    $statement->close();
    $conexion->close();
    } else {
        echo('CAMPO VACIO');
    } 
} catch (Exception $e) {
    die('Failed: '.$e->getMessage());
}
?>