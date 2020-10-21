<?php
session_start();
if (!isset($_SESSION['Cedula'])) {
    header('Location:../index.php');
} elseif (isset($_SESSION['Cedula'])) {
    include '../Conexion/Conexion.php';
    $sentencia = $bd->query('SELECT * FROM empleados');
    $cliente = $sentencia->fetchAll(PDO::FETCH_OBJ);

    $sentencia1 = $bd->query('SELECT * FROM equipos');
    $cliente1 = $sentencia1->fetchAll(PDO::FETCH_OBJ);

    $sentencia2 = $bd->query('SELECT * FROM preventivo');
    $cliente2 = $sentencia2->fetchAll(PDO::FETCH_OBJ);

} else {
    echo '<script type="text/javascript">
        alert("error en el sistema");
        window.location.href="../index.php";
        </script>';
}
foreach ($cliente1 as $dato) {
    $fecha = $dato->FechaIngreso;
    $fechaEntera = strtotime($fecha);
    $anio = date("Y", $fechaEntera);
    $mes = date("m", $fechaEntera);
    $dia = date("d", $fechaEntera);
}
$estado = "Administrador";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="icon" href="../style/log/Logo.png">
    <link rel="stylesheet" href="../style/css/header.css">
    <link rel="stylesheet" href="../style/css/footer.css">
    <link rel="stylesheet" href="../style/css/header-menu.css">
    <link rel="stylesheet" type="text/css" href="../style/css/calendario.css" media="all" />
</head>

<body>
    <header class="header-index">
        <img src="../style/log/Logo1.png" alt="logo" class="logo">
        <a href="cambiarDatos.html">
            <img src="../style/log/login.png" alt="login" class="login">
        </a>
        <a href="../Dao/CerrarSession.php"><img src="../style/log/iniciar-sesion.png" class="Cerrar" alt="cerrar"></a>
        <div class="menu">
            <ul class="nav">
                <li><a href="menu.php">Menú</a></li>
                <li><a href="Empresa.php">Empresa</a></li>
                <li><a href="Surcursal.php">Surcursal</a></li>
                <li><a href="Empleados.php">Empleados</a></li>
                <li><a href="Servicios.php">Servicios</a></li>
            </ul>
        </div>
    </header>
    <!---Revisar calendario para cambiarlo-->
    <div id="calendario">
        <div id="anterior" onclick="mesantes()"></div>
        <div id="posterior" onclick="mesdespues()"></div>
        <h2 id="titulos"></h2>
        <table id="diasc">
            <tr id="fila0">
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr id="fila1">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr id="fila2">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr id="fila3">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr id="fila4">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr id="fila5">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr id="fila6">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <div id="fechaactual"><i onclick="actualizar()">HOY: </i></div>
        <div id="buscafecha">
            <form action="#" name="buscar">
                <p>Buscar ... MES
                    <select name="buscames">
                        <option value="0">Enero</option>
                        <option value="1">Febrero</option>
                        <option value="2">Marzo</option>
                        <option value="3">Abril</option>
                        <option value="4">Mayo</option>
                        <option value="5">Junio</option>
                        <option value="6">Julio</option>
                        <option value="7">Agosto</option>
                        <option value="8">Septiembre</option>
                        <option value="9">Octubre</option>
                        <option value="10">Noviembre</option>
                        <option value="11">Diciembre</option>
                    </select>
                    ... AÑO ...
                    <input type="text" name="buscaanno" maxlength="4" size="4" />
                    ...
                    <input type="button" class="fecha" value="BUSCAR" onclick="mifecha()" />
                </p>
            </form>
        </div>
    </div>
    <div class="busqueda">
        <a href="Empresa.php" class="guias">Empresa</a>
        <a href="Surcursal.php" class="guias">Surcursal</a>
        <a href="Empleados.php" class="guias">Empleados</a>
        <a href="Servicios.php" class="guias">Servicios</a>
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
        <iframe class="mapas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d994.0604328502938!2d-74.05326700431122!3d4.72802357476163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f8515297fb3ef%3A0x8bfff25310fd9c65!2sCl.%20145%20%2350-16%2C%20Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1594662968879!5m2!1ses!2sco" width="80%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
        </iframe>
    </footer>
    <div class="contenedor1">
        <div style="text-align: center;" class="referencias">
            <a href="#">Equipos de refrigeración en Colombia</a> | <a href="https://www.jcdingenieriatermica.com/maquinaria-para-cocina-de-restaurante">Maquinaria para cocina
                de restaurante</a> | <a href="#">Equipos de refrigeración industrial en colombia</a> | <a href="https://www.jcdingenieriatermica.com/repuestos-para-estufas-industriales">Repuestos para estufas
                industriales</a> | <a href="#">Refrigeradores para restaurantes cocinas industriales</a> | <a href="https://www.jcdingenieriatermica.com/licuadora-industrial">Licuadora industrial</a> | <a href="#">Horno combi</a> | <a href="https://www.jcdingenieriatermica.com/venta-de-hornos-para-pizza">Venta de hornos para pizza</a> |
            <a href="#">Deshidratadora de frutas</a> | <a href="https://www.jcdingenieriatermica.com/horno-turbochef">Horno turbochef precio</a>
        </div>
    </div>
    <script type="text/javascript">
        meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
        lasemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"]
        diassemana = ["lun", "mar", "mié", "jue", "vie", "sáb", "dom"];
        //Tras cargarse la página ...
        window.onload = function() {
            //fecha actual
            hoy = new Date(); //objeto fecha actual
            diasemhoy = hoy.getDay(); //dia semana actual
            diahoy = hoy.getDate(); //dia mes actual
            meshoy = hoy.getMonth(); //mes actual
            annohoy = hoy.getFullYear(); //año actual

            //PHP esxtraer datos

            // Elementos del DOM: en cabecera de calendario 
            tit = document.getElementById("titulos"); //cabecera del calendario
            ant = document.getElementById("anterior"); //mes anterior
            pos = document.getElementById("posterior"); //mes posterior
            // Elementos del DOM en primera fila
            f0 = document.getElementById("fila0");
            //Pie de calendario
            pie = document.getElementById("fechaactual");
            pie.innerHTML += lasemana[diasemhoy] + ", " + diahoy + " de " + meses[meshoy] + " de " + annohoy;
            //formulario: datos iniciales:
            document.buscar.buscaanno.value = annohoy;
            // Definir elementos iniciales:
            mescal = meshoy; //mes principal
            annocal = annohoy //año principal
            //iniciar calendario:
            cabecera()
            primeralinea()
            escribirdias()
        }
        //FUNCIONES de creación del calendario:
        //cabecera del calendario
        function cabecera() {
            tit.innerHTML = meses[mescal] + " de " + annocal;
            mesant = mescal - 1; //mes anterior
            mespos = mescal + 1; //mes posterior
            if (mesant < 0) {
                mesant = 11;
            }
            if (mespos > 11) {
                mespos = 0;
            }
            ant.innerHTML = meses[mesant]
            pos.innerHTML = meses[mespos]
        }
        //primera línea de tabla: días de la semana.
        function primeralinea() {
            for (i = 0; i < 7; i++) {
                celda0 = f0.getElementsByTagName("th")[i];
                celda0.innerHTML = diassemana[i]
            }
        }
        //rellenar celdas con los días
        function escribirdias() {
            //Buscar dia de la semana del dia 1 del mes:
            primeromes = new Date(annocal, mescal, "1") //buscar primer día del mes
            prsem = primeromes.getDay() //buscar día de la semana del día 1
            prsem--; //adaptar al calendario español (empezar por lunes)
            if (prsem == -1) {
                prsem = 6;
            }
            //buscar fecha para primera celda:
            diaprmes = primeromes.getDate()
            prcelda = diaprmes - prsem; //restar días que sobran de la semana
            empezar = primeromes.setDate(prcelda) //empezar= tiempo UNIX 1ª celda
            diames = new Date() //convertir en fecha
            diames.setTime(empezar); //diames=fecha primera celda.
            //Recorrer las celdas para escribir el día:
            for (i = 1; i < 7; i++) { //localizar fila
                fila = document.getElementById("fila" + i);
                for (j = 0; j < 7; j++) {
                    midia = diames.getDate()
                    mimes = diames.getMonth()
                    mianno = diames.getFullYear()
                    celda = fila.getElementsByTagName("td")[j];
                    celda.innerHTML = midia;
                    //Recuperar estado inicial al cambiar de mes:
                    celda.style.backgroundColor = "#ffffff";
                    celda.style.color = "#492736";
                    //domingos en rojo
                    if (j == 6) {
                        celda.style.color = "#f11445";
                    }
                    //dias restantes del mes en gris
                    if (mimes != mescal) {
                        celda.style.color = "#a0babc";
                    }
                    //destacar la fecha actual
                    if (mimes == meshoy && midia == diahoy && mianno == annohoy) {
                        celda.style.backgroundColor = "#f0b19e";
                        celda.innerHTML = "<cite title='Fecha Actual'>" + midia + "</cite>";
                    }
                    <?php foreach ($cliente1 as $dato) {
                        $fecha = $dato->FechaSalida;
                        $fechaEntera = strtotime($fecha);
                        $anio = date("Y", $fechaEntera);
                        $mes = date("m", $fechaEntera);
                        $dia = date("d", $fechaEntera);
                    ?>
                        //fechas registradas
                        if (mimes == <?php echo ($mes - 1) ?> && midia == <?php echo $dia ?> && mianno == <?php echo $anio ?>) {
                            <?php if ($dato->Estado == "En espera") { ?>
                                celda.style.backgroundColor = "#ffed85";
                                celda.innerHTML = "<a href='buscar_servicios.php?busqueda=<?php echo $dato->FechaSalida; ?>'><cite  title='Fecha ocupada'>" + midia + "</cite></a>";
                            <?php } elseif ($dato->Estado == "Resuelto") { ?>
                                celda.style.backgroundColor = "#91cf70";
                                celda.innerHTML = "<a href='buscar_servicios.php?busqueda=<?php echo $dato->FechaSalida; ?>'><cite  title='Fecha ocupada'>" + midia + "</cite></a>";
                            <?php } else { ?>
                                celda.style.backgroundColor = "#d46363";
                                celda.innerHTML = "<a href='buscar_servicios.php?busqueda=<?php echo $dato->FechaSalida; ?>'><cite  title='Fecha ocupada'>" + midia + "</cite></a>";
                            <?php } ?>
                        }
                    <?php } ?>
                    <?php foreach ($cliente2 as $dato1) {
                        //fecha preventivo  
                        $fechaPrev = $dato1->fecha_actual;
                        $mesesReq = $dato1->meses;
                        $fechaPrev1 = date("Y-m-d", strtotime("+" . $mesesReq . " months", strtotime($fechaPrev)));
                        $anioPrev = date("Y", strtotime($fechaPrev1));
                        $mesPrev = date("m", strtotime($fechaPrev1));
                        $diaPrev = date("d", strtotime($fechaPrev1));
                    ?>
                    console.log(<?php echo $fechaPrev1?>);
                        if (mimes == <?php echo $mesPrev ?> && midia == <?php echo $diaPrev ?> && mianno == <?php echo $anioPrev ?>) {
                            <?php if(!isset($_GET['id'])){?>
                                window.location.href = "../Dao/prevCorreos.php?id=<?php echo $dato1->idPreventivo ?>";
                            <?php }?>
                    }
                    <?php } ?>
                    //pasar al siguiente día
                    midia = midia + 1;
                    diames.setDate(midia);
                }
            }
        }
        //Ver mes anterior
        function mesantes() {
            nuevomes = new Date() //nuevo objeto de fecha
            primeromes--; //Restamos un día al 1 del mes visualizado
            nuevomes.setTime(primeromes) //cambiamos fecha al mes anterior 
            mescal = nuevomes.getMonth() //cambiamos las variables que usarán las funciones
            annocal = nuevomes.getFullYear()
            cabecera() //llamada a funcion de cambio de cabecera
            escribirdias() //llamada a funcion de cambio de tabla.
        }
        //ver mes posterior
        function mesdespues() {
            nuevomes = new Date() //nuevo obejto fecha
            tiempounix = primeromes.getTime() //tiempo de primero mes visible
            tiempounix = tiempounix + (45 * 24 * 60 * 60 * 1000) //le añadimos 45 días 
            nuevomes.setTime(tiempounix) //fecha con mes posterior.
            mescal = nuevomes.getMonth() //cambiamos variables 
            annocal = nuevomes.getFullYear()
            cabecera() //escribir la cabecera 
            escribirdias() //escribir la tabla
        }
        //volver al mes actual
        function actualizar() {
            mescal = hoy.getMonth(); //cambiar a mes actual
            annocal = hoy.getFullYear(); //cambiar a año actual 
            cabecera() //escribir la cabecera
            escribirdias() //escribir la tabla
        }
        //ir al mes buscado
        function mifecha() {
            //Recoger dato del año en el formulario
            mianno = document.buscar.buscaanno.value;
            //recoger dato del mes en el formulario
            listameses = document.buscar.buscames;
            opciones = listameses.options;
            num = listameses.selectedIndex
            mimes = opciones[num].value;
            //Comprobar si el año está bien escrito
            if (isNaN(mianno) || mianno < 1) {
                //año mal escrito: mensaje de error
                alert("El año no es válido:\n debe ser un número mayor que 0")
            } else { //año bien escrito: ver mes en calendario:
                mife = new Date(); //nueva fecha
                mife.setMonth(mimes); //añadir mes y año a nueva fecha
                mife.setFullYear(mianno);
                mescal = mife.getMonth(); //cambiar a mes y año indicados
                annocal = mife.getFullYear();
                cabecera() //escribir cabecera
                escribirdias() //escribir tabla
            }
        }
    </script>
</body>

</html>