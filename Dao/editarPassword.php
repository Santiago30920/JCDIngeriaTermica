<?php
    if (!isset($_POST['oculto'])) {
        header('Location: ../views/Empleados.php');
    }
    include '../Conexion/Conexion.php';
    $id = $_POST['id2'];
    $passA = $_POST['txtContrasenaA'];
    $pass = $_POST['txtContrasena'];
    $pass1 = $_POST['txtConfirmed-pass'];

    $vereficar = $bd->prepare("SELECT Contrasena FROM empleados WHERE Cedula = ?;");
    $resultados = $vereficar->execute([$id]);
    $empleado = $vereficar->fetch(PDO::FETCH_OBJ);

    echo($resultados);

    if($empleado->Contrasena === $passA) {
        if ($pass === $pass1) {
            $setencia = $bd->prepare("UPDATE empleados SET 	Contrasena = ? WHERE Cedula = ?;");
            $resultado1 = $setencia->execute([$pass, $id]);
            if($resultado1 === TRUE){
                echo '<script type="text/javascript">
                alert("Se ha actualizado correctamente");
                window.location.href="../views/menu.php";
                </script>';
            }else{
                echo '<script type="text/javascript">
                alert("Error al actualizar la informacion intente nueva mente");
                window.location.href="../views/editarContrasena.php";
                </script>';
            }
        }else{
            echo '<script type="text/javascript">
            alert("Las contaseñas no coinciden, por favor intente nuevamente");
            window.location.href="../views/editarContrasena.php";
            </script>';
        }
    }else{
        echo '<script type="text/javascript">
        alert("Las contraseña actual es incorrecta.\nPor favor he intente nuevamente");
        window.location.href="../views/editarContrasena.php";
        </script>';
    }
?>