<?php
    class Actions
    {
        function loginAccount($name, $password)
        {
            include('configuration.php');
            $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
            $sql = "SELECT * FROM usuarios WHERE ";
        }
    }
?>