<?php
    class Actions
    {
        function loginAccount($email, $password)
        {
            $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
            $sql = "SELECT * FROM usuarios WHERE password = $password AND email = $email";
        }
        
        function registerAccount( $sql, $parametros = array()){

            $conexion = joinSession();

            if (mysqli_connect_errno()) {
                printf("Error de conexion ", mysqli_connect_error());
                exit();
            }
            else if( $sql != null || $sql != '' ) {

                $sentencia = $conexion->prepare($sql);

                if (!empty($parametros)) {
                    $tipos = "";
                    foreach ($parametros as $parametro) {
                        if (gettype($parametro) == "string")
                            $tipos = $tipos . "s";
                        else
                            $tipos = $tipos . "i";
                        }
                    $sentencia->bind_param($tipos, ...$parametros);
                }

                $sentencia->execute();
                $sentencia->close();
                $conexion->close();
                header('Location: index.php');
            }
        }

        function joinSession(){
            include("configuration.php");
            $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);

            if (mysqli_connect_errno()) {
                printf("Error de conexion ", mysqli_connect_error());
                exit();
            }

            return $conexion;
        }

    }