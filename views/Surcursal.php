<?php
session_start();
if (!isset($_SESSION['Cedula'])) {
    header('Location:../login.php');
}elseif(isset($_SESSION['Cedula'])){
    include '../Conexion/Conexion.php';
    $sentencia = $bd->query('SELECT * FROM sucursal');
    $surcursal = $sentencia->fetchAll(PDO::FETCH_OBJ);
}else{
    echo '<script type="text/javascript">
    alert("error en el sistema");
    window.location.href="../login.php";
    </script>';
}
$estado="Administrador";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surcursal</title>
    <link rel="icon" href="../style/log/Logo.png">
    <link rel="stylesheet" href="../style/css/header.css">
    <link rel="stylesheet" href="../style/css/footer.css">
    <link rel="stylesheet" href="../style/css/header-menu.css">
    <link rel="stylesheet" href="../style/css/TablaEmplados.css">
</head>

<body>
    <header class="header-index">
        <img src="../style/log/Logo1.png" alt="logo" class="logo">
        <img src="../style/log/login.png" alt="login" class="login">
        <img src="../style/log/cerrar_sesion.png" class="Cerrar" alt="cerrar">
        <div class="menu">
            <ul class="nav">
                <li><a href="menu.html">Menú</a></li>
                <li><a href="Empresa.html">Empresa</a></li>
                <li><a href="Surcursal.html">Surcursal</a></li>
                <li><a href="Empleados.html">Empleados</a></li>
                <li><a href="Servicios.html">Servicios</a></li>
            </ul>
        </div>
    </header>
    <div class="Barra_de_busqueda">
        <input type="text" placeholder="Busqueda" class="busqueda">
        <input type="submit" value="Buscar" class="buscar">
        <a href="../views/RegistrarSurcursal.html">Registro</a>
        <button>Inactivos</button>
        <button>Activos</button>
    </div>
    <div class="tabla" style="width: 45%; margin-left: 28%;">
        <h3>Lista de surcursales registradas</h3>
        <table class="usuario" style="margin-left: 20%;">
            <th>Surcursal No.</th>
            <th>Nombre de la surcursal</th>
            <th>Telefono</th>
            <th>Nit de empresa</th>
            <th>Estado</th>
            <th>Acciones</th>
            <?php
                foreach($surcursal as $dato){
            ?>
            <tr>
                <td><?php echo $dato->idSucursal?></td>
                <td><?php echo $dato->NombreSucursal?></td>
                <td><?php echo $dato->Telefono?></td>
                <td><?php echo $dato->NitEmpresa?></td>
                <td><?php echo $dato->Estado?></td>
                <td>
                    <a href="ActualizarSurcursal.php?id=<?php echo $dato->idSucursal;?>" class="boton-actualizar" style="text-decoration:none; color:black">Editar</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
    <footer>
        <div class="contactos">
            <img src="../style/log/telefono1.png" alt="telefo">
            <a href="#">Equipos: 311 8518533</a>
            <img src="../style/log/telefono1.png" alt="telefo">
            <a href="#">Equipos: 321 9144584</a>
            <img src="../style/log/telefono1.png" alt="telefo">
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
    <script type="text/javascript" src="../style/js/calendario.js"></script>
</body>

</html>