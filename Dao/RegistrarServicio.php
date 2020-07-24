<?php
    include "../Conexion/Conexion.php";
//Registrar equipo
    $nombre = $_POST['txtNombre'];
    $referencia = $_POST['txtReferencia'];
    $voltaje = $_POST['txtVoltaje'];
    $modelo = $_POST['txtModelo'];
    $gas = $_POST['txtGas'];
    $nombreE = $_POST['txtNombreE'];
    $marca = $_POST['txtMarca'];
    $serial = $_POST['txtSerial'];
    $capacidad = $_POST['txtCapacidad'];
    $descripcion = $_POST['txtDescripcion'];
    $surcursal = $_POST['txtSurcursal'];

    $sentencia = $bd->prepare("INSERT INTO equipos VALUES(?,?,?,?,?,?,?,?,?,?,?)");
    $resultado = $sentencia->execute([$serial, $nombre, $referencia, $voltaje, $modelo, $gas, $marca, $capacidad, $descripcion, $surcursal, $nombreE]);
    //Registrar servicio
    $ingreso = $_POST['txtIngreso'];
    $salida = $_POST['txtSalida'];
    $diagnostico = $_POST['txtDiagonostico'];
    $observaciones = $_POST['txtObservaciones'];
    $sentencia1 = $bd->prepare("INSERT INTO mantenimientos VALUES(?,?,?,?,?,?,?,?)");
    $resultado1 = $sentencia1->execute(['', $ingreso, $salida, $observaciones, $diagnostico, 'En espera', $nombreE, $serial]);
    //Funcion
    if($resultado1 === true AND $resultado === true){
        if($diagnostico === 'Preventivo'){
            header('Location:../views/Preventivo.php');
        }elseif ($diagnostico === 'Correctivo') {
            header('Location:../views/Correctivo.php');
        }
    }elseif($resultado1 === false AND $resultado === true){
        echo'<script type="text/javascript">
        alert("Registro denegado en la parte de servicios");
        window.location.href="../views/RegistrarServicios.php";
        </script>';
    }elseif($resultado1 === true AND $resultado === false){
        echo'<script type="text/javascript">
        alert("Registro denegado en la parte de equipos");
        window.location.href="../views/RegistrarServicios.php";
        </script>';
    }else{
        echo'<script type="text/javascript">
        alert("Registro denegado");

        </script>';
    }
?>