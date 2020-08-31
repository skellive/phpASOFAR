<?php

// DTAOS PARA PROBAR LA INSERCION
//PRODUCTO
$_POST["Codigo_barras"] = "00008";
$_POST["Nombre"] = "MOBIL";
$_POST["Descripcion"] = "MOBIL Caja x1";
$_POST["Peso"] = 5.00;
$_POST["Id_tipo"] = 13;
$_POST["Id_medidas"] = 7;
$_POST["Id_envase"] = 8;
$_POST["Id_marcas"] = 4;
$_POST["Id_usuario"] = 43;
$_POST["Iva"] = 'NO';
$_POST["Cantidad_minima"] = 1;
$_POST["Receta"] = 'SIN RECETA';
$_POST["Unidades"] = 0;
//PRECIO
$_POST["PrecioCompra"] = 1.10;
$_POST["PrecioVenta"] = 1.53;
$_POST["Porcentaje"] = 40;




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
        !empty($_POST["Unidades"]) ||
        !empty($_POST["PrecioCompra"]) ||
        !empty($_POST["PrecioVenta"]) ||
        !empty($_POST["Porcentaje"])
    ) {
        //Metodos
        require_once('../metodos/Buscar.php');
        $buscar = new Bucar();
        // fecha y hora actual
        $fecha = $buscar->fechaActual();
        $fechaHora = $buscar->fechaHoraActual();

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

        $PrecioCompra=$_POST["PrecioCompra"];
        $PrecioVenta=$$_POST["PrecioVenta"];
        $Porcentaje=$_POST["Porcentaje"];


        //GUARDAMOS EL PRODUCTO
        $buscar->insertarProducto(
            $Codigo_barras,
            $Nombre,
            $Descripcion,
            $fecha,
            $Peso,
            $Id_tipo,
            $Id_medidas,
            $Id_envase,
            $Id_marcas,
            $Id_usuario,
            $Iva,
            $Cantidad_minima,
            $Receta,
            $Unidades
        );


        //BUSCAR PRODUCTO INSERTADO
        //Llamo a la funcion buscarProducto para traer su id
        $IdProducto = $buscar->buscarProductoNuevo(
            $Nombre,
            $Descripcion,
            $fecha,
            $Peso,
            $Id_tipo,
            $Id_medidas,
            $Id_envase,
            $Id_marcas,
            $Id_usuario,
            $Iva,
            $Cantidad_minima,
            $Receta,
            $Unidades
        );

        //GURADAR PRECIO del producto
        $buscar->insertarPrecioProducto($IdProducto, $PrecioCompra, $PrecioVenta, $fechaHora, $Id_usuario, $Porcentaje);
    } else {
        echo ('CAMPO VACIO');
    }
} catch (Exception $e) {
    die('Failed: ' . $e->getMessage());
}
