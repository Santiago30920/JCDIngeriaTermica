<?php
    if (!isset($_POST['oculto'])) {
        header('Location: ../views/Servicios.php');
    }
    include '../Conexion/Conexion.php';
    $id = $_POST['id2'];
    //Equipos
    $serial = $_POST['txtSerial'];    
    $nombre = $_POST['txtNombre'];
    $referencia = $_POST['txtReferencia'];    
    $voltaje = $_POST['txtVoltaje'];    
    $modelo = $_POST['txtModelo'];    
    $gas = $_POST['txtGas'];
    $marca = $_POST['txtMarca']; 
    $capacidad = $_POST['txtCapacidad']; 
    $descripcion = $_POST['txtDescripcion']; 
    $nombreE = $_POST['txtNombreE'];    
    

    $setencia = $bd->prepare("UPDATE equipos SET NumeroSerie = ?, NombreEquipos = ?, Referencia = ?, Voltaje = ?, Modelo = ?, TipoGas = ?, Marca = ?, Capacidad = ?, Descripcion = ?, CedulaEmpleado = ? WHERE idEquipos = ?");
    $resultado = $setencia->execute([$serial, $nombre, $referencia, $voltaje, $modelo, $gas, $marca, $capacidad, $descripcion, $nombreE, $id]);
    if($resultado === TRUE){
        echo '<script type="text/javascript">
        alert("Se ha actualizado correctamente");
        window.location.href="../views/Servicios.php";
        </script>';
    }else{
         echo '<script type="text/javascript">
         alert("Error a la hora de actualizar informacion");
         window.location.href="../views/Servicios.php";
         </script>';
    }
    ?>