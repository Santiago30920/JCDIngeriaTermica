<?php
if (!isset($_POST['oculto'])) {
    header('Location: ../views/Servicios.php');
}
include '../Conexion/Conexion.php';
$id1 = $_POST['id3'];
$ingreso = $_POST['txtIngreso'];
$salida = $_POST['txtSalida'];
$estado = $_POST['txtEstado'];
$observaciones = $_POST['txtObservaciones'];

$setencia1 = $bd->prepare("UPDATE mantenimientos SET FechaIngreso = ?, FechaSalida = ?, Observaciones = ?, Estado = ?, WHERE idMantenimientos = ?");
$resultado1 = $setencia1->execute([$ingreso, $salida, $observaciones, $estado, $id1]); 
if($resultado1 === TRUE){
    echo '<script type="text/javascript">
    alert("Se ha actualizado correctamente");
    window.location.href="../views/Servicios.php";
    </script>';
}else{
    echo '<script type="text/javascript">
    alert("email ya esta registrado intente nuevamente");
    window.location.href="../views/Servicios.php";
    </script>';
}
?>