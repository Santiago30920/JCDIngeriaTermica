<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="style/log/Logo.png">
    <link rel="stylesheet" href="style/css/header.css">
    <link rel="stylesheet" href="style/css/login.css">
    <link rel="stylesheet" href="style/css/footer.css">
    <link rel="stylesheet" href="style/css/calendario.css">
</head>

<body>
    <header class="header-index">
        <img src="style/log/Logo1.png" alt="logo" class="logo" style="margin-bottom: 2.5%;">
    </header>
    <div class="inicio">
        <form action="Dao/Login.php" method="post">
            <h2>INICIO DE SESION</h2>
            <input type="email" name="txtEmail" class="contenedor" placeholder="Ingrese email" required>
            <input type="password" name="txtPassword" class="contenedor" placeholder="Ingrese contraseña" required>
            <br>
            <input type="submit" class="Aceptar" value="Ingresar">
            <a href="https://www.jcdingenieriatermica.com/" class="Cancelar">Cancelar</a>
            <br>
            <a href="views/Contraseña.php" class="olvide">¿Has olvidado tu contraseña?</a>
            <br><br><br>
        </form>
    </div>
    <footer>
        <div class="contactos">
            <img src="style/log/telefono1.png" alt="telefo">
            <a href="#">Equipos: 311 8518533</a>
            <img src="style/log/telefono1.png" alt="telefo">
            <a href="#">Equipos: 321 9144584</a>
            <img src="style/log/telefono1.png" alt="telefo">
            <a href="#">Equipos: 310 2529091</a>
        </div>
        <p>
            Cll 145 No.50-16 Bogotá, Colombia
            <br><br>
            Tel:(57-1) 738 9054 - Cel: 310 252 9091
        </p>
        <iframe class="mapas"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d994.0604328502938!2d-74.05326700431122!3d4.72802357476163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f8515297fb3ef%3A0x8bfff25310fd9c65!2sCl.%20145%20%2350-16%2C%20Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1594662968879!5m2!1ses!2sco"
            width="80%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0">
        </iframe>
    </footer>
    <div class="contenedor1">
        <div style="text-align: center;" class="referencias">
            <a href="#">Equipos de refrigeración en Colombia</a> | <a
                href="https://www.jcdingenieriatermica.com/maquinaria-para-cocina-de-restaurante">Maquinaria para cocina
                de restaurante</a> | <a href="#">Equipos de refrigeración industrial en colombia</a> | <a
                href="https://www.jcdingenieriatermica.com/repuestos-para-estufas-industriales">Repuestos para estufas
                industriales</a> | <a href="#">Refrigeradores para restaurantes cocinas industriales</a> | <a
                href="https://www.jcdingenieriatermica.com/licuadora-industrial">Licuadora industrial</a> | <a
                href="#">Horno combi</a> | <a
                href="https://www.jcdingenieriatermica.com/venta-de-hornos-para-pizza">Venta de hornos para pizza</a> |
            <a href="#">Deshidratadora de frutas</a> | <a
                href="https://www.jcdingenieriatermica.com/horno-turbochef">Horno turbochef precio</a>
        </div>
    </div>
</body>

</html>
    <?php
?>