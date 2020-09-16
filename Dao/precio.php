<?php
    include "../Conexion/Conexion.php";

    $semana = $_POST['txtsemana'];
    $txtFin = $_POST['txtfin'];
    $txtHora_s = $_POST['txthora_s'];
    $txtHora_f = $_POST['txthora_f'];
    $txtIva = $_POST['txtIva'];

    $sentencia = $bd->prepare("UPDATE precio SET semana = ?, fin_semana = ?, hora_semana = ?, hora_fin_semana = ?, iva = ? WHERE id_precio = 1;");
    $resultado = $sentencia->execute([$semana, $txtFin, $txtHora_s, $txtHora_f, $txtIva]);
    if($resultado === TRUE){
         echo '<script type="text/javascript">
         alert("Se ha actualizado correctamente");
         window.location.href="../views/factura.php";
         </script>';
    }else{
        echo '<script type="text/javascript">
        alert("Hubo un error al actualizarse, por favor he intente nuevamente");
        window.location.href="../views/precios.php";
        </script>';
    }
?>