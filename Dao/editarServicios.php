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

$setencia1 = $bd->prepare("SELECT * FROM equipos WHERE idEquipos = ?");
$resultado = $setencia1->execute([$id]);
$empresa = $setencia1->fetch(PDO::FETCH_OBJ);

if($resultado === TRUE){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <script type="text/javascript">
        var respuesta = confirm("Se ha ecjecutado correctamente.\nDeseas editar el diagnostico");
        if(respuesta){
            <?php
                if ($empresa->Diagnostico == "Preventivo") {
            ?>
                    window.location.href="../views/editarPreventivo.php?id1=<?php echo $id?>";
            <?php
                }else{
            ?>
                    window.location.href="../views/editarCorrectivo.php?id1=<?php echo $id?>";
            <?php
                }
            ?>
                }else{ 
                    window.location.href="../views/Servicios.php";
                }      
        </script>    
    </body>
</html>
    <?php
}else{
    echo '<script type="text/javascript">
    alert("Error a la hora de actualizar informacion");
    window.location.href="../views/Servicios.php";
    </script>';
}
?>