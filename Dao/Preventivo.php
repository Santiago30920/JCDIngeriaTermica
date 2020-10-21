<?php
    include "../Conexion/Conexion.php";

    $mant = $_POST['txtMant'];
    $orden = $_POST['txtOrden'];
    $mes = $_POST['txtMes'];
    $Observaciones = $_POST['txtObservaciones'];

    $sentencia = $bd->prepare("INSERT INTO preventivo VALUES(?,?,?,?,?,?)");
    $resultado = $sentencia->execute(['', $orden, $mes, Date("Y-m-d", time()), $Observaciones, $mant]);
    if($resultado === true){
        header('Location:../views/Servicios.php');  
    }else{
        echo'<script type="text/javascript">
        alert("Registro denegado");
        window.location.href="../views/Preventivo.php";
        </script>';
    }
?>