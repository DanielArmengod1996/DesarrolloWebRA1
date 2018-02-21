<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 20/02/2018
 * Time: 20:57
 */

    include 'Actions.php';
    $nombre             = $_POST['nombre'];
    $imagen             = $_POST['imagen'];
    $descripcion        = $_POST['descripcion'];
    $categoria          = $_POST['categoria'];
    $canales            = $_POST['canales'];
    $mayorEdad          = $_POST['mayorEdad'];
    echo $_SESSION["ID"];
    $id                 = $_SESSION["ID"];

    $obj = new Actions;
    $sql = "INSERT INTO canales (nombre, imagen, descripcion, categoria, canales_recomendados, isAdultos, id_usuario) VALUES ( ? , ? , ? , ? , ? , ? , ? )";
    $obj -> register( $sql, Array( $nombre, $imagen, $descripcion, $categoria, $canales, $mayorEdad, $id ) );
?>