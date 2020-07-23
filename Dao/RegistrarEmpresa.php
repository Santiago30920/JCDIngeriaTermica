<?php
    include "../Conexion/Conexion.php";

    $nit = $_POST['txtNit'];
    $nombre = $_POST['txtNombre'];
    $telefono = $_POST['txtTelefono'];
    $email = $_POST['txtEmail'];
    $direccion = $_POST['txtDireccion'];

    $sentencia = $bd->prepare("INSERT INTO empresas VALUES(?,?,?,?,?,?)");
    $resultado = $sentencia->execute([$nit, $nombre, $telefono, $email, $direccion, 'Activo']);
    if($resultado === true){
        header('Location:../views/Empresa.php');
    }else{
        echo'<script type="text/javascript">
        alert("Registro denegado \nPuede que el correo, cedula o telefono ya este registrado \nVerifique he intente nuevamente");
        window.location.href="../views/RegistrarEmpresa.php";
        </script>';
    }