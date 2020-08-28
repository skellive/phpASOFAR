<?php
//$_POST["tipo"]="GENERAL";

try {
    if (!empty($_POST["tipo"])) {
    $tipo = $_POST["tipo"];
    require_once('../../conexion.php');
    $mysql = new connection();
    $conexion = $mysql->get_connection();
    //Consulta
    //@valor1 esta demas pero es necesario 
    $sql = 'CALL insertarTipoProducto(?,@valor1)';
    $statement = $conexion->prepare($sql);
    //  i=int s=string d=decimal
    $statement->bind_param('s', $tipo);
    $statement->execute();
    $statement->close();
    $conexion->close();
    } else {
        echo('CAMPO VACIO');
    }
} catch (mysqli_sql_exception $e) {
    die('Failed: '.$e->getMessage());
}

?>