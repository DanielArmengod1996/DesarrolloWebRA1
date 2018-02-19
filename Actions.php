<?php
    class Actions
    {
        function loginAccount($email, $password)
        {
            $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
            $sql = "SELECT * FROM usuarios WHERE password = $password AND email = $email";
        }
        
        function registerAccount( $sql, $parametros = array()){

            $conexion = Actions:: joinSession();

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

        function getListVideos(){
            $conexion = Actions:: joinSession();

            $listVideos = array();

            $sql = "SELECT * FROM videos";
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->get_result();
            ?>
                <div class="card-group">
            <?php
            $cont = 0;
            while( $fila = $resultado->fetch_row() ) {
                $cont++;
                ?>

                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title"><?php echo $fila[0] ?></h4>
                            <p class="card-text"><?php echo $fila[1] ?></p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>

                <?php
                    if( $cont % 3 == 0 ) {
                ?>
                    </div>
                    <div class="card-group">
                <?php
                    }
            }
            ?>
                </div>
            <?php
            $sentencia->close();
            $conexion->close();

            return $listVideos;

        }

        function iniciar( $parametros = array() ){
            $conexion = Actions:: joinSession();
            if (mysqli_connect_errno()) {
                printf("Error de conexion ", mysqli_connect_error());
                exit();
            }

            $sql = "SELECT Id FROM Usuarios WHERE email = ? AND password = ?";
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
            $resultado = $sentencia->get_result();
            while ($fila = $resultado->fetch_row()) {
                session_start();
                $_SESSION["ID"] = $fila[0];
            }
            if( !isset( $_SESSION["ID"] ) ){
                $status="errorLogin";
                header('Location: index.php?status=error_login');
            }
            else{
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