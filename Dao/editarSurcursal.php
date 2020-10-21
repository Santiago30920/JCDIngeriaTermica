<?php
    if (!isset($_POST['oculto'])) {
        header('Location: ../views/Empleados.php');
    }
    include '../Conexion/Conexion.php';
    $id = $_POST['id2'];
    $nombre = $_POST['txtNombre'];
    $telefono = $_POST['txtTelefono'];
    $direccion = $_POST['txtDireccion'];
    $correo = $_POST['txtCorreo'];
    $estado = $_POST['txtEstado'];
    
    $setencia = $bd->prepare("UPDATE sucursal SET NombreSucursal = ?, Telefono = ?, Direccion = ?, correo = ?,Estado = ? WHERE idSucursal = ?;");
    $resultado = $setencia->execute([$nombre, $telefono, $direccion, $correo, $estado, $id]);
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