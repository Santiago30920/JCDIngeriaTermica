<?php
    if (!isset($_POST['oculto'])) {
        header('Location: ../views/Empleados.php');
    }
    include '../Conexion/Conexion.php';
    $id = $_POST['id2'];
    print_r($id);
    // $Mant = $_POST['txtMant'];
    $Orden = $_POST['txtOrden'];
    $Observaciones = $_POST['txtObservaciones'];
    
    $sentencia = $bd->prepare("UPDATE correctivo SET OrdenServicio = ?, Observaciones = ? WHERE id_correctivo = ?;");
    $resultado = $sentencia->execute([$Orden, $Observaciones, $id]);
    if($resultado === TRUE){
         echo '<script type="text/javascript">
         alert("Se ha actualizado correctamente");
         window.location.href="../views/Servicios.php";
         </script>';
    }else{
        echo '<script type="text/javascript">
        alert("Hubo un error al actualizarse, por favor he intente nuevamente");
        window.location.href="../views/editarCorrectivo.php";
        </script>';
    }
?>