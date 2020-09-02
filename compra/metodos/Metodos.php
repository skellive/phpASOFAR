<?php  
require_once('../../conexion.php');
class Metodos{

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
        $id_proveedor,
        $id_usuario,
        $fecha_creacion,
        $plazo,
        $forma_pago,
        $iva,
        $descuento,
        $total
    ) {
        try {
            $mysql = new connection();
            $con = $mysql->get_connection();
            $idProducto = 0;
            $q = "call insertarCabeceraNotaPedido($id_proveedor,$id_usuario,'$fecha_creacion',$plazo,$forma_pago,$iva,$descuento,$total,@valor);";
            $con->query($q);
            $consulta = $con->query("select @valor;");
            mysqli_close($con);
            while ($fila = $consulta->fetch_assoc()) {
                $idProducto = $fila["@valor"];
            }
            return $idProducto;
        } catch (mysqli_sql_exception $e) {
            die('Error buscarProductoNuevo: ' . $e->getMessage());
        }
    }
    
}
?>