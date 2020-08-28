<?php
//$_POST["envase"]="TUBO";


try {
    if (!empty($_POST["envase"])) {
    $envase = $_POST["envase"];
    require_once('../../conexion.php');
    $mysql = new connection();
    $conexion = $mysql->get_connection();
    //Consulta
    //@valor1 esta demas pero es necesario
    $sql = 'CALL insertarEnvaseProducto(?,@valor1)';
    $statement = $conexion->prepare($sql);
    //  i=int s=string d=decimal
    $statement->bind_param('s', $envase);
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