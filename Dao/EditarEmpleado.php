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
    $estado = $_POST['txtEstado'];
    
    $setencia = $bd->prepare("UPDATE empleados SET Nombre = ?, Apellidos = ?, Email = ?, Telefono = ?, Estado = ? WHERE Cedula = ?;");
    $resultado = $setencia->execute([$nombre, $apellido, $email, $telefonos, $estado, $id]);
    if($resultado === TRUE){
        echo '<script type="text/javascript">
        alert("Se ha actualizado correctamente");
        window.location.href="../views/Empleados.php";
        </script>';
    }else{
        echo '<script type="text/javascript">
        alert("email ya esta registrado intente nuevamente");
        window.location.href="../views/Empleados.php";
        </script>';
    }
?>