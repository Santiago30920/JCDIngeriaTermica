<?php
    include "../Conexion/Conexion.php";

    $mant = $_POST['txtMant'];
    $orden = $_POST['txtOrden'];
    $Observaciones = $_POST['txtObservaciones'];

    $sentencia = $bd->prepare("INSERT INTO preventivo VALUES(?,?,?,?)");
    $resultado = $sentencia->execute(['', $orden, $Observaciones, $mant]);
    if($resultado === true){
        header('Location:../views/Servicios.php');  
    }else{
        echo'<script type="text/javascript">
        alert("Registro denegado");
        window.location.href="../views/Preventivo.php";
        </script>';
    }
?>