<?php
    if (!isset($_POST['oculto'])) {
        header('Location: ../views/Servicios.php');
    }
    include '../Conexion/Conexion.php';
    $id = $_POST['id2'];
    $id1 = $_POST['id3'];
    $respuestos = $_POST['txtMano'];    
    $mano = $_POST['txtCostos'];
    $pagos = $_POST['txtPagos'];       
    

    $setencia = $bd->prepare("UPDATE factura SET repuestos = ?, mano_obra = ?, pagos = ? WHERE id_factura = ?");
    $resultado = $setencia->execute([$respuestos, $mano, $pagos, $id1]);
    if($resultado === TRUE){
        echo '<script type="text/javascript">
        alert("Se ha actualizado correctamente");
        window.location.href="../views/Servicios.php";
        </script>';
    }else{
         echo '<script type="text/javascript">
         alert("Hubo un error al actualizarse, por favor he intente nuevamente");
         window.location.href="../views/factura.php?id='.$id.'";
         </script>';
    }
    ?>