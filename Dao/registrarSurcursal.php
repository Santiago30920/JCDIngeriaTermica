<?php
    include "../Conexion/Conexion.php";

    $nombre = $_POST['txtNombre'];
    $telefono = $_POST['txtTelefono'];
    $direccion = $_POST['txtDireccion'];
    $correo = $_POST['txtCorreo'];
    $nit = $_POST['txtNit'];

    $sentencia = $bd->prepare("INSERT INTO sucursal VALUES(?,?,?,?,?,?,?)");
    $resultado = $sentencia->execute(['',$nombre, $telefono, $direccion, $correo,'Activo', $nit]);
    if($resultado === true){
        echo '<script type="text/javascript">
        alert("Registro exitoso");
        window.location.href="../views/Surcursal.php";
        </script>';
    }else{
        echo'<script type="text/javascript">
        alert("Registro denegado");

        </script>';
    }