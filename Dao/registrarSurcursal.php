<?php
    include "../Conexion/Conexion.php";

    $nombre = $_POST['txtNombre'];
    $telefono = $_POST['txtTelefono'];
    $nit = $_POST['txtNit'];

    $sentencia = $bd->prepare("INSERT INTO sucursal VALUES(?,?,?,?,?)");
    $resultado = $sentencia->execute(['',$nombre, $telefono, 'Activo', $nit]);
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