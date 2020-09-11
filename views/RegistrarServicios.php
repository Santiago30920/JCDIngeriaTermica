<?php
session_start();
if (!isset($_SESSION['Cedula'])) {
    header('Location:../index.php');
}elseif(isset($_SESSION['Cedula'])){
    include '../Conexion/Conexion.php';
    $sentencia = $bd->query('SELECT * FROM equipos');
    $empleado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    $sentencia = $bd->query('SELECT * FROM sucursal');
    $surcursal = $sentencia->fetchAll(PDO::FETCH_OBJ);
    $sentencia = $bd->query('SELECT * FROM empleados');
    $empleado = $sentencia->fetchAll(PDO::FETCH_OBJ);
}else{
    echo '<script type="text/javascript">
    alert("error en el sistema");
    window.location.href="../index.php";
    </script>';
}
$estado="Administrador";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar empresa</title>
    <link rel="icon" href="../style/log/Logo.png">
    <link rel="stylesheet" href="../style/css/header.css">
    <link rel="stylesheet" href="../style/css/footer.css">
    <link rel="stylesheet" href="../style/css/header-menu.css">
    <link rel="stylesheet" href="../style/css/registrar.css">
    <link rel="stylesheet" href="../style/css/ServiciosR.css">
</head>

<body>
    <header class="header-index">
        <img src="../style/log/Logo1.png" alt="logo" class="logo">
        <a href="cambiarDatos.html">
            <img src="../style/log/login.png" alt="login" class="login">
        </a>
        <a href="../Dao/CerrarSession.php"><img src="../style/log/iniciar-sesion.png" class="Cerrar" alt="cerrar"></a>
        <div class="menu" style="margin-right: 35%;">
            <ul class="nav">
            <li><a href="menu.php">Menú</a></li>
                <li><a href="Empresa.php">Empresa</a></li>
                <li><a href="Surcursal.php">Surcursal</a></li>
                <li><a href="Empleados.php">Empleados</a></li>
                <li><a href="Servicios.php">Servicios</a></li>
            </ul>
        </div>
    </header>
    <div class="registro">
        <h2>Registro de equipos</h2>
        <form action="../Dao/RegistrarServicio.php" class="Registrar" method="POST">
            <input type="text" name="txtNombre" class="Nombre-50" style="margin-right: 11%;" placeholder="Nombre del equipo">
            <input type="text" style="margin: -0.3%;" name="txtReferencia" style="margin-left: -2%;" class="Nombre-50" placeholder="referencia">
            <input type="text" name="txtVoltaje"  style="margin-right: 11%;" class="Nombre-50" placeholder="Voltaje">
            <input type="text" style="margin: -0.3%;"name="txtModelo" style="margin-left: -2%;" class="Nombre-50" placeholder="Modelo">
            <select name="txtGas" style="width: 90%;" id="gas" class="Rol-50">
                <option value="Propano">Propano</option>
                <option value="Natural">Natural</option>
                <option value="Ninguno">Ninguno</option>
            </select>
            <select name="txtNombreE" id="gas" class="Rol-50" style="width: 90%;">
            <option value="">Seleccione nombre responsable</option>
                <?php 
                    foreach($empleado as $dato1){
                ?>
                <option value="<?php echo $dato1->Cedula?>"><?php echo $dato1->Nombre?></option>
                <?php 
                    } 
                ?>
            </select>
            <input type="text" name="txtMarca" style="margin-right: 11%;" class="Nombre-50" placeholder="Marca">
            <input type="number" name="txtSerial"  style="margin-left: -0.3%;" class="Nombre-50" placeholder="Numero de serie">
            <select name="txtSurcursal"  style="width: 90%;" id="gas" class="Rol-50">
                <option value="">Seleccione nombre de la surcursal</option>
                <?php 
                    foreach($surcursal as $dato){
                ?>
                <option value="<?php echo $dato->idSucursal?>"><?php echo $dato->NombreSucursal?></option>
                <?php 
                    } 
                ?>
            </select>
            <!-- <select name="txtDias" id="Diagnostico" class="Rol-50">
                <option value="Normal">Normal</option>
                <option value="Dominicales">Dominicales</option>
            </select> -->
            <!-- <input type="text" name="txtPrecio" class="Nombre" style="width: 85%;" placeholder="Precio"> -->
            <input type="text"  style="width: 86%;" name="txtCapacidad" class="Nombre" style="width: 84.5%;" placeholder="Capacidad">
            <br>
            <textarea name="txtDescripcion" class="Descripcion" id="Descripcion" cols="165" rows="5"
            placeholder="Ingrese una descripcion"></textarea>
            <br><br>
            <hr>
            <br>
            <h2>Registro de servicios</h2>
            <br><br>
            <label class="especificacion" style="margin-left: -0%;">Fecha de ingreso:</label>
            <input type="date" name="txtIngreso" id="ingreso" class="Fecha">
            <label class="especificacion" style="margin-left: 8%;">Fecha de terminacion:</label>
            <input type="date" name="txtSalida" id="salida" class="Fecha">
            <select name="txtDiagonostico" id="Diagnostico" class="Rol-50">
                <option value="Preventivo">Preventivo</option>
                <option value="Correctivo">Correctivo</option>
            </select>
            <input type="text" name="txtSolicitud" class="Nombre" style="width: 85%;" placeholder="Solicitud" required>
            <br>
            <input type="submit" class="aceptar" value="Registrar">
            <a href="../views/Servicios.php" class="Cancelar">Cancelar</a>
            <br><br>
        </form>
    </div>
    <footer>
        <div class="contactos">
            <img src="../style/log/telefono1.png" alt="telefono">
            <a href="#">Equipos: 311 8518533</a>
            <img src="../style/log/telefono1.png" alt="telefono">
            <a href="#">Equipos: 321 9144584</a>
            <img src="../style/log/telefono1.png" alt="telefono">
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