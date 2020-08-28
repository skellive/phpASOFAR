<?php

/*
//PRODUCTO
$_POST["Codigo_barras"]="";
$_POST["Nombre"]="";
$_POST["Descripcion"]="";
$_POST["Peso"]="";
$_POST["Id_tipo"]="";
$_POST["Id_medidas"]="";
$_POST["Id_envase"]="";
$_POST["Id_marcas"]="";
$_POST["Id_usuario"]="";
$_POST["Iva"]="";
$_POST["Cantidad_minima"]="";
$_POST["Receta"]="";
$_POST["Unidades"]="";
*/

//PRECIO



//validar campos vacios

try {
    if (
    !empty($_POST["Codigo_barras"]) ||  
    !empty($_POST["Nombre"]) || 
    !empty($_POST["Descripcion"]) || 
    !empty($_POST["Peso"]) || 
    !empty($_POST["Id_tipo"]) || 
    !empty($_POST["Id_medidas"]) || 
    !empty($_POST["Id_envase"]) || 
    !empty($_POST["Id_marcas"]) || 
    !empty($_POST["Id_usuario"]) || 
    !empty($_POST["Iva"]) || 
    !empty($_POST["Cantidad_minima"]) || 
    !empty($_POST["Receta"]) || 
    !empty($_POST["Unidades"]) 
    ) {
    // fecha y hora actual
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s');
    
    //guardar los datos en variables
    $Codigo_barras = $_POST["Codigo_barras"];
    $Nombre = $_POST["Nombre"];
    $Descripcion = $_POST["Descripcion"];
    $Peso = $_POST["Peso"];
    $Id_tipo = $_POST["Id_tipo"];
    $Id_medidas = $_POST["Id_medidas"];
    $Id_envase = $_POST["Id_envase"];
    $Id_marcas = $_POST["Id_marcas"];
    $Id_usuario = $_POST["Id_usuario"];
    $Iva = $_POST["Iva"];
    $Cantidad_minima = $_POST["Cantidad_minima"];
    $Receta = $_POST["Receta"];
    $Unidades = $_POST["Unidades"];

    require_once('../../conexion.php');
    $mysql = new connection();
    $conexion = $mysql->get_connection();



    //GURADAR EN LA TABLA PRODUCTO
    //Consulta
    //@valor1 esta demas pero es necesario 
    $sql = 'CALL ingresarProducto(?,?,?,?,?,?,?,?,?,?,?,?,?,?,@valor1)';
    $statement = $conexion->prepare($sql);
    //  i=int s=string d=decimal
    $statement->bind_param('ssss', $Codigo_barras,$Nombre,$Descripcion,$fecha);
    $statement->bind_param('diii', $Peso,$Id_tipo,$Id_medidas,$Id_envase);
    $statement->bind_param('iisi', $Id_marcas,$Id_usuario,$Iva,$Cantidad_minima);
    $statement->bind_param('si', $Receta,$Unidades);
    $statement->execute();
    $statement->close();



    //BUSCAR PRODUCTO INSERTADO
    //Consulta
    //@valor1 esta demas pero es necesario 
    $sql = 'CALL BuscarIDProductoNuevo(?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $statement = $conexion->prepare($sql);
    //  i=int s=string d=decimal
    $statement->bind_param('ssss', $Codigo_barras,$Nombre,$Descripcion,$fecha);
    $statement->bind_param('diii', $Peso,$Id_tipo,$Id_medidas,$Id_envase);
    $statement->bind_param('iisi', $Id_marcas,$Id_usuario,$Iva,$Cantidad_minima);
    $statement->bind_param('si', $Receta,$Unidades);
    $statement->execute();
    $statement->close();





    //GURADAR EN LA TABLA PRECIO
    //Consulta
    //@valor1 esta demas pero es necesario 
    $sql = 'CALL actualizarPrecioCompra(?,?,?,?,?,?,?,?,@valor1)';
    $statement = $conexion->prepare($sql);
    //  i=int s=string d=decimal
    $statement->bind_param('ssss', $Codigo_barras,$Nombre,$Descripcion,$fecha);
    $statement->bind_param('diii', $Peso,$Id_tipo,$Id_medidas,$Id_envase);
    $statement->bind_param('iisi', $Id_marcas,$Id_usuario,$Iva,$Cantidad_minima);
    $statement->bind_param('si', $Receta,$Unidades);
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