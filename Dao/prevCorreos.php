<?php
    include "../Conexion/Conexion.php";
    require '../phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username="jcdingeneriatermica@gmail.com";
    $mail->Password="JCDI1234";

    $id = $_GET['id'];

    $sentencia = $bd->prepare("SELECT * FROM preventivo WHERE idPreventivo = ? LIMIT 1");
    $resultado = $sentencia->execute([$id]);
    $empleado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if ($resultado === TRUE) {
        foreach($empleado as $dato){
            $id2 = $dato->idEquipo;
        }
    }
    
    $sentencia = $bd->prepare("SELECT * FROM equipos WHERE 	idEquipos = ? LIMIT 1");
    $resultado = $sentencia->execute([$id2]);
    $empleado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if ($resultado === TRUE) {
        foreach($empleado as $dato){
            $id3 = $dato->IdSurcursal;
        }
    } 

    $sentencia = $bd->prepare("SELECT * FROM sucursal WHERE idSucursal = ? LIMIT 1");
    $resultado = $sentencia->execute([$id3]);
    $empleado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if ($resultado === TRUE) {
        foreach($empleado as $dato){
            $nombre = $dato->NombreSucursal;
            $correo = $dato->correo;
        }
    }   
        $mail->setFrom("jcdingeneriatermica@gmail.com");
        $mail->addAddress($correo);
        $mail->addReplyTo("auxiliar1@jcdingenieriatermica.com");

        $mail->isHTML(true);
        $mail->Subject='Recodatorio de mantenimiento';
        $mail->Body='<p>Empresa: '.$nombre.'<br>Con correo: '.$correo.'<br>'
        .'Esto es un recordatoria de mantenimiento para su equipo, que se le debe hacer a su maquinaria.<br>
        Este correo solo es informativo, por lo cual no será atendido por este medio <br> 
        Si tiene dudas comunicarse a la emprese JCD Ingeneria Termica.';

        if(!$mail->send()){
            echo '<script type="text/javascript">
                window.location.href="../views/menu.php?id=1";
                </script>';
        }else{
            $sentencia = $bd->prepare("UPDATE preventivo SET fecha_actual = ? WHERE idPreventivo = ?;");
            $resultado = $sentencia->execute([Date("Y-m-d", time()), $id]);
            echo '<script type="text/javascript">
                window.location.href="../views/menu.php?id=1";
                </script>';
        }
?>