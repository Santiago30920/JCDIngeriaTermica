<?php
    if (!isset($_POST['oculto'])) {
        header('Location: ../views/Empleados.php');
    }
    include '../Conexion/Conexion.php';
    $id = $_POST['id2'];
    $nit = $_POST['txtNit'];
    $nombre = $_POST['txtNombre'];
    $telefono = $_POST['txtTelefono'];
    $email = $_POST['txtEmail'];
    $direccion= $_POST['txtDireccion'];
    $estado = $_POST['txtEstado'];
    
    $setencia = $bd->prepare("UPDATE empresas SET Nombre = ?, Telefono = ?, Email = ?, Direccion = ?, Estado = ? WHERE Nit = ?;");
    $resultado = $setencia->execute([$nombre, $telefono, $email, $direccion, $estado, $id]);
    if($resultado === TRUE){
        echo '<script type="text/javascript">
        alert("Se ha actualizado correctamente");
        window.location.href="../views/Empresa.php";
        </script>';
    }else{
        echo '<script type="text/javascript">
        alert("email ya esta registrado intente nuevamente");
        window.location.href="../views/Empresa.php";
        </script>';
    }
?>