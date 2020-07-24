<?php
    if (!isset($_POST['oculto'])) {
        header('Location: ../views/Servicios.php');
    }
    include '../Conexion/Conexion.php';
    $id = $_POST['id2'];
    //Equipos
    $nombre = $_POST['txtNombre'];
    $referencia = $_POST['txtReferencia'];    
    $voltaje = $_POST['txtVoltaje'];    
    $modelo = $_POST['txtModelo'];    
    $nombreE = $_POST['txtNombreE'];    
    $gas = $_POST['txtGas'];    
    $marca = $_POST['txtMarca']; 
    $capacidad = $_POST['txtCapacidad']; 
    $descripcion = $_POST['txtDescripcion']; 
    

    $setencia = $bd->prepare("UPDATE equipos SET NombreEquipos = ?, Referencia = ?, Voltaje = ?, Modelo = ?, TipoGas = ?, Marca = ?, Capacidad = ?, Descripcion = ?, CedulaEmpleado = ? WHERE NumeroSerie = ?;");
    $resultado = $setencia->execute([$nombre, $referencia, $voltaje, $modelo, $gas, $marca, $capacidad, $descripcion, $nombreE, $id]);
    if($resultado === TRUE){
        echo '<script type="text/javascript">
        alert("Se ha actualizado correctamente");
        window.location.href="../views/Servicios.php";
        </script>';
    }else{
        echo '<script type="text/javascript">
        alert("email ya esta registrado intente nuevamente");
        window.location.href="../views/Servicios.php";
        </script>';
    }
    //Servicios
    $id1 = $_POST['id3'];
    $ingreso = $_POST['txtIngreso'];
    $salida = $_POST['txtSalida'];
    $estado = $_POST['txtEstado'];
    $observaciones = $_POST['txtObservaciones'];

    $setencia1 = $bd->prepare("UPDATE mantenimientos SET FechaIngreso = ?, FechaSalida = ?, Observaciones = ?, Estado = ?, WHERE idMantenimientos = ?");
    $resultado1 = $setencia1->execute([$ingreso, $salida, $observaciones, $estado, $id1]); 
    if($resultado1 === TRUE){
        echo '<script type="text/javascript">
        alert("Se ha actualizado correctamente");
        window.location.href="../views/Servicios.php";
        </script>';
    }else{
        echo '<script type="text/javascript">
        alert("email ya esta registrado intente nuevamente");
        window.location.href="../views/Servicios.php";
        </script>';
    }
    ?>