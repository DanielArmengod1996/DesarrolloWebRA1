<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 20/02/2018
 * Time: 20:57
 */

    $nombre             = $_POST['nombre'];
    $imagen             = $_POST['imagen'];
    $descripcion        = $_POST['descripcion'];
    $categoria          = $_POST['categoria'];
    $canales            = $_POST['canales'];
    $mayorEdad          = $_POST['mayorEdad'];
    $miIdSesion         = $_POST["id_session"];

    echo $miIdSesion;

    include 'Actions.php';
    $obj = new Actions;
    $sql = "INSERT INTO canales (nombre, imagen, descripcion, categoria, canales_recomendados, isAdultos, id_usuario) VALUES ( ? , ? , ? , ? , ? , ? , ? )";
    $obj -> register( $sql, Array( $nombre, $imagen, $descripcion, $categoria, $canales, $mayorEdad, $miIdSesion ) );
?>