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
    $ingreso = $_POST['txtIngreso'];
    $salida = $_POST['txtSalida'];
    $dias = $_POST['txtDias'];
    $precio = $_POST['txtPrecio'];
    $diagnostico = $_POST['txtDiagonostico'];
    $observaciones = $_POST['txtSolicitud'];

    if ($Dias === 'Normal') {
        $total = 119000;
    }else{
        $total = 59500;
    }
    $sentencia = $bd->prepare("INSERT INTO equipos VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $resultado = $sentencia->execute(['',$serial, $nombre, $referencia, $voltaje, $modelo, $gas, $marca, $capacidad, $descripcion, $ingreso, $salida, $observaciones, $diagnostico, $total, $precio,'En espera', $surcursal, $nombreE]);
        
        //Registrar servicio
        //Funcion
    if ($resultado === true){
    if($diagnostico === 'Preventivo'){
        header('Location:../views/Preventivo.php');
    }elseif ($diagnostico === 'Correctivo') {
        header('Location:../views/Correctivo.php');
    }
    }else{
        echo'<script type="text/javascript">
        alert("Registro denegado");
        window.location.href="../views/RegistrarServicios.php";
        </script>';
    }
?>