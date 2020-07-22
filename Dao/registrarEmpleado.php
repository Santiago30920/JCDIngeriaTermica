
<?php
    include "../Conexion/Conexion.php";

    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $cedula = $_POST['txtCedula'];
    $email = $_POST['txtEmail'];
    $telefonos = $_POST['txtTelefono'];
    $rol = $_POST['txtRol'];
    $password = $_POST['txtCedula'];

    $sentencia = $bd->prepare("INSERT INTO empleados VALUES(?,?,?,?,?,?,?,?)");
    $resultado = $sentencia->execute([$nombre, $apellido, $cedula, $email, $telefonos, $password, $rol, 'Activo']);
    if($resultado === true){
        echo '<script type="text/javascript">
        alert("Registro exitoso");
        window.location.href="../views/Empleados.php";
        </script>';
    }else{
        echo'<script type="text/javascript">
        alert("Registro denegado \nPuede que el correo, cedula o telefono ya este registrado \nVerifique he intente nuevamente");
        window.location.href="../views/registrarEmpleado.php";
        </script>';
    }