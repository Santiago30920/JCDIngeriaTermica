<?php
    if (!isset($_POST['oculto'])) {
        header('Location: ../views/Empleados.php');
    }
    include '../Conexion/Conexion.php';
    $id = $_POST['id2'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $email = $_POST['txtEmail'];
    $telefonos = $_POST['txtTelefono'];
    
    $setencia = $bd->prepare("UPDATE empleados SET Nombre = ?, Apellidos = ?, Email = ?, Telefono = ? WHERE Cedula = ?;");
    $resultado = $setencia->execute([$nombre, $apellido, $email, $telefonos, $id]);
    if($resultado === TRUE){
        echo '<script type="text/javascript">
        alert("Se ha actualizado correctamente");
        window.location.href="../views/menu.php";
        </script>';
    }else{
        echo '<script type="text/javascript">
        alert("ha ocurrido un error por favor intente nueva mente");
        window.location.href="../views/editarDatos.php";
        </script>';
    }
?>