<?php
if (!isset($_POST['oculto'])) {
    header('Location: ../views/Servicios.php');
}
include '../Conexion/Conexion.php';
$id = $_POST['id2'];
$ingreso = $_POST['txtIngreso'];
$salida = $_POST['txtSalida'];
$estado = $_POST['txtEstado'];
$observaciones = $_POST['txtSolicitud'];

$setencia = $bd->prepare("UPDATE equipos SET FechaIngreso = ?, FechaSalida = ?, Solicitud = ?, Estado = ? WHERE idEquipos = ?");
$resultado = $setencia->execute([$ingreso, $salida, $observaciones, $estado, $id]); 
if($resultado === TRUE){
    echo '<script type="text/javascript">
    alert("Se ha actualizado correctamente");
    window.location.href="../views/Servicios.php";
    </script>';
}else{
    echo '<script type="text/javascript">
    alert("Error a la hora de actualizar informacion");
    window.location.href="../views/Servicios.php";
    </script>';
}
?>