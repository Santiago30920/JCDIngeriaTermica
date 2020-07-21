<?php
    function conexionBD(){
        $server = 'localhost:3306';
        $user = 'JCD_DB';
        $password = '1234';
        $db = '';
        $conectar = mysqli_connect($server, $user, $password, $db) or die("Error en la conexion");
    }
?>