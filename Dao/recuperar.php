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

    $correo = $_POST['txtEmail'];

    $sentencia = $bd->prepare("SELECT * FROM Empleados WHERE Email = ? LIMIT 1");
    $resultado = $sentencia->execute([$correo]);
    $empleado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if ($resultado === TRUE) {
        foreach($empleado as $dato){
            $cedula = $dato->Cedula;
            $nombre = $dato->Nombre;
            $apellidos = $dato->Apellidos;
        }
        $url = 'http://'.$_SERVER["SERVER_NAME"].'/PaginaJCD/views/cambia_pass.php?id='.$cedula;
        
        $mail->setFrom("jcdingeneriatermica@gmail.com");
        $mail->addAddress($correo);
        $mail->addReplyTo("auxiliar1@jcdingenieriatermica.com");

        $mail->isHTML(true);
        $mail->Subject='Solicitud de cambio de clave para: '.$nombre.' '.$apellidos;
        $mail->Body='<p>Nombre: '.$nombre.' '.$apellidos.'<br>Con correo: '.$correo.'<br>'
        .'Usted ha solicitado un cambio de contraseña, ya halla sido por perdida de la misma.<br>Si usted no hizo 
        ningun cambio por favor ignore este correo.<br>Por al contrario ingrese a este link: </p>'
        ."<a href='".$url."'>Cambiar contraseña</a>";

        if(!$mail->send()){
            echo '<script type="text/javascript">
                alert("El correo no se pudo enviar, Por favor revisar conexion a internet y volverlo a intentar.");
                window.location.href="../views/Contraseña.php";
                </script>';
        }else{
            echo '<script type="text/javascript">
                alert("El correo se ha enviado correctamente, por favor rivise su bandeja de entrada.");
                window.location.href="../index.php";
                </script>';
        }

    }else{
        echo '<script type="text/javascript">
        alert("El correo ingrsado no existe,\npor favor he intente nuevamente");
        window.location.href="../views/Contraseña.php";
        </script>';
    }
?>