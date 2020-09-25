<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intermediario</title>
</head>
<body>
    <?php $id = $_GET['id'];
        $id2 = $_GET['id2'];
        $id3 = $_GET['id3'];
        $dia = $_GET['dia'];
    ?>
    <script>
        var mensaje = confirm('Desea enviar el reposte al correo de la surcursal');
        if(mensaje){
            window.location.href="enviarReporte.php?id=<?php echo $id ?>&id2=<?php echo $id2 ?>&id3=<?php echo $id3 ?>&dia=<?php echo $dia ?>";
        }else{
            window.location.href="reporte.php?id=<?php echo $id ?>&id2=<?php echo $id2 ?>&id3=<?php echo $id3 ?>&dia=<?php echo $dia ?>";
        }
    </script>
</body>
</html>