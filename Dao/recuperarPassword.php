<?php
    if (!isset($_POST['oculto'])) {
        header('Location: ../views/Empleados.php');
    }
    include '../Conexion/Conexion.php';
    $id = $_POST['id2'];
    $pass = $_POST['txtContrasena'];
    $pass1 = $_POST['txtConfirmed-pass'];
    if ($pass === $pass1) {
        $setencia = $bd->prepare("UPDATE empleados SET 	Contrasena = ? WHERE Cedula = ?;");
        $resultado1 = $setencia->execute([$pass, $id]);
        if($resultado1 === TRUE){
            echo '<script type="text/javascript">
            alert("Se ha actualizado correctamente");
            window.location.href="../index.php";
            </script>';
        }else{
            echo '<script type="text/javascript">
            alert("Error al actualizar la informacion intente nueva mente");
            window.location.href="../views/cambia_pass.php";
            </script>';
            }
    }else{
        echo '<script type="text/javascript">
        alert("Las contaseñas no coinciden, por favor intente nuevamente");
        window.location.href="../views/editarContrasena.php";
        </script>';
    }
?>