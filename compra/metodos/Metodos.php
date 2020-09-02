<?php  
require_once('../../conexion.php');
class Metodos{


    public function insertarCabeceraNotaPedido(
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
            $id_cabecera_nota_pedidos = 0;
            $q = "call insertarCabeceraNotaPedido($id_proveedor,$id_usuario,'$fecha_creacion','$plazo','$forma_pago',$iva,$descuento,$total,@valor);";
            $con->query($q);
            $consulta = $con->query("select @valor;");
            mysqli_close($con);
            while ($fila = $consulta->fetch_assoc()) {
                $id_cabecera_nota_pedidos = $fila["@valor"];
            }
            return $id_cabecera_nota_pedidos;
        } catch (mysqli_sql_exception $e) {
            die('Error buscarProductoNuevo: ' . $e->getMessage());
        }
    }
    
}
?>