<?php
    include "../Conexion/Conexion.php";

    $mano = $_POST['txtMano'];
    $costos = $_POST['txtCostos'];
    $semana = $_POST['txtSemana'];
    $pagos = $_POST['txtPagos'];
    $id = $_POST['id2'];
    
    $precios = $bd->query("SELECT * FROM precio WHERE id_precio = 1 LIMIT 1");
    $resultado = $precios->fetch(PDO::FETCH_OBJ);
    
    $semanas = (int)$resultado->semana; 
    $fin_semana = (int)$resultado->fin_semana; 
    $hora_semana = (int)$resultado->hora_semana; 
    $hora_fin = (int)$resultado->hora_fin_semana; 
    $iva = (int)$resultado->iva; 
    
    $ivaT = $iva/100;

    if($semana == 'Semana'){
        if($costos == 1){
            $subtotal = ($semanas)*$ivaT;
            $total = $subtotal + $semanas;
            $sentencia = $bd->prepare("INSERT INTO factura VALUES(?,?,?,?,?)");
            $resultado = $sentencia->execute(['', $mano, $total, $pagos, $id]);
                if($resultado === true){
                    header('Location:../views/Servicios.php');
                }else{
                    echo'<script type="text/javascript">
                    alert("Registro denegado");
                    window.location.href="../views/factura.php?id='.$id.'";
                    </script>';
                }
        }elseif($costos > 1){
            $interes = ($costos - 1)* $hora_semana;
            $subtotal = ($semanas + $interes);
            $totalf = ($subtotal * $ivaT);
            $total = ($subtotal + $totalf);
            $sentencia = $bd->prepare("INSERT INTO factura VALUES(?,?,?,?,?)");
            $resultado = $sentencia->execute(['', $mano, $total, $pagos, $id]);
            if($resultado === true){
                header('Location:../views/Servicios.php');
            }else{
                echo'<script type="text/javascript">
                alert("Registro denegado");
                window.location.href="../views/factura.php?id='.$id.'";
                </script>';
            }
        }elseif($costos < 1){
            echo'<script type="text/javascript">
            alert("No se puede registrar,\n las horas deben se mayores a 0");
            window.location.href="../views/factura.php?id='.$id.'";
            </script>';
        }
    }elseif($semana == 'Fin'){
        if($costos == 1) {
            $subtotal = ($fin_semana)*$ivaT;
            $total = $subtotal + $fin_semana;
            $sentencia = $bd->prepare("INSERT INTO factura VALUES(?,?,?,?,?)");
            $resultado = $sentencia->execute(['', $mano, $total, $pagos, $id]);
            if($resultado === true){
                header('Location:../views/Servicios.php');
            }else{
                echo'<script type="text/javascript">
                alert("Registro denegado");
                window.location.href="../views/factura.php?id='.$id.'";
                </script>';
            }
        }elseif($costos > 1){
            $interes = ($costos - 1) * $hora_fin;
            $subtotal = ($fin_semana + $interes);
            $totalf = ($subtotal * $ivaT);
            $total = ($subtotal + $totalf);
            $sentencia = $bd->prepare("INSERT INTO factura VALUES(?,?,?,?,?)");
            $resultado = $sentencia->execute(['', $mano, $total, $pagos, $id]);
            if($resultado === true){
                header('Location:../views/Servicios.php');
            }else{
                echo'<script type="text/javascript">
                alert("Registro denegado");
                window.location.href="../views/factura.php?id='.$id.'";
                </script>';
            }
        }else{
            echo'<script type="text/javascript">
            alert("No se puede registrar, /n las horas deben se mayores a 0");
            window.location.href="../views/factura.php?id='.$id.'";
            </script>';
        }
    }

?>