<?php
    class Actions
    {
        function loginAccount($email, $password)
        {
            $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
            $sql = "SELECT * FROM usuarios WHERE password = $password AND email = $email";
        }
        
        function registerAccoun($nombre, $apellidos, $nick, $password, $email, $fecha_nacimiento, $admin){
            $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
            $sql = "INSERT INTO usuarios (nombre, apellidos, nick, password, email, fecha_nacimiento, admin) VALUES OF (?, ?, ?, ?, ?, ?, ?)";

            $sentencia = $conexion->prepare($sql);

            $sentencia->bind_param($nombre, $apellidos, $nick, $password, $email, $fecha_nacimiento, $admin);
            $sentencia->execute();

            $sentencia->close();
            $conexion->close();

        }
    }
?>