<?php   
$Host='localhost';
$Usuario='root';
$Contraseña='root';
$Basedatos='moduloprueba';
$Conexion=mysqli_connect($Host,$Usuario,$Contraseña,$Basedatos);
//mysqli_close($Conexion);
if (!$Conexion) {
    echo "Error de Conexion a la Base de Datos";
}
?>