<?php
    require 'Actions.php';
    $email           = $_POST['email'];
    $contrasena      = $_POST['contrasena'];
    $nombre          = $_POST['nombre'];
    $nick            = $_POST['nick'];
    $apellidos       = $_POST['apellidos'];
    $fechaNacimiento = $_POST['fechaNacimiento'];

    $obj = new Actions;
    $sql = "INSERT INTO usuarios (nombre, apellidos, nick, password, email, fecha_nacimiento, admin) VALUES ( ? , ? , ? , ? , ? , ? , ? )";
    $obj -> register( $sql, Array( $nombre, $apellidos, $nick, sha1( $contrasena ), $email, $fechaNacimiento, 0 ) );