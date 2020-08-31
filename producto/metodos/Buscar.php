<?php
require_once('../../conexion.php');
class Bucar
{


    public function fechaActual()
    {
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d');
        return $fecha;
    }

    public function fechaHoraActual()
    {
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d H:i:s');
        return $fecha;
    }


    public function buscarProductoNuevo(
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
    ) {
        try {
            $mysql = new connection();
            $con = $mysql->get_connection();
            $idProducto = 0;
            $q = "CALL BuscarIDProducto('$Nombre', '$Descripcion', '$fecha', $Peso, $Id_tipo, $Id_medidas, $Id_envase, $Id_marcas, $Id_usuario, '$Iva', $Cantidad_minima, '$Receta', $Unidades);";
            $consulta = $con->query($q);
            mysqli_close($con);
            while ($fila = $consulta->fetch_assoc()) {
                $idProducto = $fila["valor"];
            }
            return $idProducto;
        } catch (mysqli_sql_exception $e) {
            die('Error buscarProductoNuevo: ' . $e->getMessage());
        }
    }

    public function insertarPrecioProducto(
        $IdProducto,
        $PrecioCompra,
        $PrecioVenta,
        $fechaHora,
        $Id_usuario,
        $Porcentaje
    ) {
        try {
            $mysql = new connection();
            $con = $mysql->get_connection();
            $idProducto = 0;
            $sql = "call moduloprueba.actualizarPrecioCompra($IdProducto, 0, $PrecioCompra, $PrecioVenta, '$fechaHora', $Id_usuario, $Porcentaje, 0, @valor1);";
            $consulta = $con->query($sql);
            mysqli_close($con);
        } catch (mysqli_sql_exception $e) {
            die('Error buscarProductoNuevo: ' . $e->getMessage());
        }
    }

    public function insertarProducto(
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
    ) {
        try {
            $mysql = new connection();
            $con = $mysql->get_connection();
            //@valor1 esta demas pero es necesario 
            $sql = 'CALL ingresarProducto(?,?,?,?,?,?,?,?,?,?,?,?,?,?,@valor1)';
            $statement = $con->prepare($sql);
            //  i=int s=string d=decimal
            $statement->bind_param('ssssdiiiiisisi', $Codigo_barras, $Nombre, $Descripcion, $fecha, $Peso, $Id_tipo, $Id_medidas, $Id_envase, $Id_marcas, $Id_usuario, $Iva, $Cantidad_minima, $Receta, $Unidades);
            $statement->execute();
            $statement->close();
            $con->close();
        } catch (mysqli_sql_exception $e) {
            die('Error buscarProductoNuevo: ' . $e->getMessage());
        }
    }
}
