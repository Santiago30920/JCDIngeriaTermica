<?php
    $contrasena = '';
    $usuario = 'root';
    $nombrebd = '';
    try {
        $bd = new PDO('mysql:host=localhost:3307;dbname=jcdingeneriatermica', $usuario, $contrasena, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (Exception $e) {
        echo "Error de conexion".$e->getMessage();
    }
?>