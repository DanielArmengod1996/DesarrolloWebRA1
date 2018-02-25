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
    $mayorEdad          = $_POST['mayorEdad'] == 'on' ? 1 : 0;
    $id                 = intval( $_POST["idCanal"] );

    echo $nombre . "</br>";
    echo $imagen . "</br>";
    echo $descripcion . "</br>";
    echo $categoria . "</br>";
    echo $canales . "</br>";
    echo $mayorEdad . "</br>";
    echo $miIdSesion . "</br>";


    include 'Actions.php';

    $obj = new Actions;
    $sql = "UPDATE canales SET nombre = ? , imagen = ? , descripcion = ? , categoria = ? , canales_recomendados = ? , isAdultos = ? WHERE Id = ? ";
    $obj -> register( $sql, Array( $nombre, $imagen, $descripcion, $categoria, $canales, $mayorEdad, $id ) );

?>