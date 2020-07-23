<?php
    if (!isset($_POST['oculto'])) {
        header('Location: ../views/Empleados.php');
    }
    include '../Conexion/Conexion.php';
    $id = $_POST['id2'];
    $nombre = $_POST['txtNombre'];
    $telefono = $_POST['txtTelefono'];
    $estado = $_POST['txtEstado'];
    
    $setencia = $bd->prepare("UPDATE sucursal SET NombreSucursal = ?, Telefono = ?, Estado = ? WHERE idSucursal = ?;");
    $resultado = $setencia->execute([$nombre, $telefono, $estado, $id]);
    if($resultado === TRUE){
        echo '<script type="text/javascript">
        alert("Se ha actualizado correctamente");
        window.location.href="../views/Surcursal.php";
        </script>';
    }else{
        echo '<script type="text/javascript">
        alert("Error, por favor intentelo nueva mente");
        window.location.href="../views/Surcursal.php";
        </script>';
    }
?>