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

    public function listarMarcasJson()
    {
        $mysql = new connection();
        $con = $mysql->get_connection();
        $q = "SELECT * FROM moduloprueba.marcas";
        $res = $con->query($q);
        mysqli_close($con);
        $rows = array();
        while ($r = mysqli_fetch_assoc($res)) {
            $rows[] = $r;
        }
        header('Content-Type: application/json; charset=utf8');
        echo json_encode($rows, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
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
        $Unidades  ){
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
}
