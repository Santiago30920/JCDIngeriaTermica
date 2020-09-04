<?php
    include "../Conexion/Conexion.php";
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
        $url = 'http://'.$_SERVER["SERVER_NAME"].'/views/cambia_pass.php?id='.$cedula;
        $asunto = 'Recuperar contraseña - Sistema de informacion';
        $cuerpo = "Hola ".$nombre." ".$apellidos.":
        <br><br> Se ha solicitado un reinicio de su contraseña, vista la siguiente direccion\n: 
        <a href='".$url."'>".$url."</a>";

        $cabeceras = 'From: jcdingeneriatermica@gmail.com' . "\r\n" .
                     'Reply-To: jcdingeneriatermica@gmail.com' . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();
        
        mail($correo, $asunto, $cuerpo, $cabeceras);
        //     echo '<script type="text/javascript">
        //     alert("Funcion \"mail()\" ejecutada, por favor verifique su bandeja de correo.");
        //     window.location.href="../views/Contraseña.php";
        //     </script>';
        // }else{
        //     echo '<script type="text/javascript">
        //     alert("No se pudo enviar el mail, por favor verifique su configuracion de correo SMTP saliente.");
        //     window.location.href="../views/Contraseña.php";
        //     </script>';
        // }

    }else{
        echo '<script type="text/javascript">
        alert("El correo ingrsado no existe,\npor favor he intente nuevamente");
        window.location.href="../views/Contraseña.php";
        </script>';
    }
?>