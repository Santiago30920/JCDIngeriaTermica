<?php
    include "../Conexion/Conexion.php";

    $mano = $_POST['txtMano'];
    $costos = $_POST['txtCostos'];
    $semana = $_POST['txtSemana'];
    $pagos = $_POST['txtPagos'];
    $id = $_POST['id2'];
    if($semana == 'Semana'){
        if($costos == 1){
            $total = 119000;
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
            $interes = $costos * 50000;
            $subtotal = (100000 + $interes);
            $totalf = ($subtotal * 0.19);
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
            $total = 154700;
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
            $interes = $costos * 87000;
            $subtotal = (100000 + $interes);
            $totalf = ($subtotal * 0.19);
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