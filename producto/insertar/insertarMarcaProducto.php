<?php
//$_POST["marca"]="NOKIA";


try {
    if (!empty($_POST["marca"])) {
    $marca = $_POST["marca"];
    require_once('../../conexion.php');
    $mysql = new connection();
    $conexion = $mysql->get_connection();
    //Consulta
    //@valor1 esta demas pero es necesario 
    $sql = 'CALL insertarMarcaProducto(?,@valor1)';   
    $statement = $conexion->prepare($sql);
    //  i=int s=string d=decimal
    $statement->bind_param('s', $marca);
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