<?php
    include "../Conexion/Conexion.php";

    $mant = $_POST['txtMant'];
    $orden = $_POST['txtOrden'];
    $Solicitud = $_POST['txtSolicitud'];

    $sentencia = $bd->prepare("INSERT INTO correctivo VALUES(?,?,?,?)");
    $resultado = $sentencia->execute(['', $orden, $Solicitud, $mant]);
    if($resultado === true){
        header('Location:../views/Servicios.php');
    }else{
        echo'<script type="text/javascript">
        alert("Registro denegado");
        window.location.href="../views/Correctivo.php";
        </script>';
    }
?>