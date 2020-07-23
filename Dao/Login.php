<?php
    session_start();
    include '../Conexion/Conexion.php';
    $email = $_POST['txtEmail'];
    $password = $_POST['txtPassword'];
    $setencia = $bd->prepare('SELECT * FROM empleados WHERE Email = ? AND Contrasena = ?');
    $setencia->execute([$email, $password]);
    $datos = $setencia->fetch(PDO::FETCH_OBJ);
    if($datos === FALSE){
        echo '<script type="text/javascript">
        alert("Correo electronico o contraseña incorrecto");
        window.location.href="../login.php";
        </script>';
    }elseif($setencia->rowCount() == 1){
       $_SESSION['Cedula'] = $datos->Cedula;
       $_SESSION['Nombre'] = $datos->Nombre;
       $_SESSION['Apellidos'] = $datos->Apellidos;
       $_SESSION['Email'] = $datos->Email;
       $_SESSION['Telefono'] = $datos->Telefono;
       $_SESSION['Rol'] = $datos->Rol;
       $_SESSION['Estado'] = $datos->Estado;
       echo '<script type="text/javascript">
       window.location.href="../views/menu.php";
       </script>';
    }
?>