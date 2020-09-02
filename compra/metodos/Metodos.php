<?php
require_once('../../conexion.php');
class Metodos
{


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
            $consulta = $con->query("select @valor AS id;");
            $rows = array();
            while ($r = mysqli_fetch_assoc($consulta)) {
                $rows[] = $r;
            }
            // Set del contenido de la respuesta
            header('Content-Type: application/json; charset=utf8');

            echo json_encode($rows, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
        } catch (mysqli_sql_exception $e) {
            die('Error buscarProductoNuevo: ' . $e->getMessage());
        }
    }
}
