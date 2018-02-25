<?php
    class Actions
    {
        function loginAccount($email, $password)
        {
            $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
            $sql = "SELECT * FROM usuarios WHERE password = $password AND email = $email";
        }

        function register($sql, $parametros = array())
        {

            $conexion = Actions:: joinSession();

            if (mysqli_connect_errno()) {
                printf("Error de conexion ", mysqli_connect_error());
                exit();
            } else if ($sql != null || $sql != '') {

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
                header('Location: index.php?id=videos');
            }
        }

        function getListVideos( $param )
        {
            $conexion = Actions:: joinSession();

            $min = $param*5;
            $max = ( $param+1 ) * 5;

            $listVideos = array();

            $sql = "SELECT * FROM videos LIMIT ?, ?";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bind_param('ii', $min, $max );
            $sentencia->execute();
            $resultado = $sentencia->get_result();
            ?>
            <div class="card-group">
            <?php
            $cont = 0;
            while ($fila = $resultado->fetch_row()) {
                $cont++;
                ?>

                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title"><?php echo $fila[0] ?></h4>
                        <p class="card-text"><?php echo $fila[1] ?></p>
                        <img width = 200 class="card-image" src = "videos/<?php echo $fila[0] . $fila[1] . $fila[2]?>" />
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div>

                <?php
                if ($cont % 2 == 0) {
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

        function getListChanels($param)
        {
            $conexion = Actions:: joinSession();

            $listVideos = array();

            $sql = "SELECT * FROM canales WHERE id_usuario = ?";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bind_param("i", $param);
            $sentencia->execute();
            $resultado = $sentencia->get_result();
            ?>
            <div class="card-group">
            <?php
            $cont = 0;
            while ($fila = $resultado->fetch_row()) {
                $cont++;
                ?>

                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title"><?php echo $fila[1] ?></h4>
                        <p class="card-text"><?php echo $fila[2] ?></p>
                        <a type="button" href="<?php echo "?id=ownerVideos&id_canal=" . $fila[0] ?>" class="btn btn-primary">Ver videos</a>
                        <a type="button" class="btn btn-warning" href="<?php echo "?id=updateChannelForm&id_canal=" . $fila[0] ?>">EDIT</a>
                        <a type="button" class="btn btn-danger" href="<?php echo "?id=deleteChannel&idCanal=" . $fila[0] ?>">DELETE</a>
                        <p class="card-text">
                            <small class="text-muted">canal</small>
                        </p>
                    </div>
                </div>

                <?php
                if ($cont % 3 == 0) {
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

        function getListVideosFromChannel( $param ){
        $conexion = Actions:: joinSession();
        $listVideos = array();

        $sql = "SELECT * FROM videos WHERE id_canal = ?";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bind_param("i", $param);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        ?>
        <div class="card-group">
        <?php
        $cont = 0;
        while ($fila = $resultado->fetch_row()) {
            $cont++;
            ?>

            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"><?php echo $fila[0] ?></h4>
                    <p class="card-text">  <?php echo $fila[2] ?></p>
                    <a type="button" href="<?php echo "?id=ownerComentarios&id_video=" . $fila[4] ?>" class="btn btn-primary">Ver comentarios</a>
                    <a type="button" class="btn btn-warning" href="<?php echo "?id=updateVideoForm&id_video=" . $fila[4] ?>">EDIT</a>
                    <a type="button" class="btn btn-danger" href="<?php echo "?id=deleteVideo&idVideo=" . $fila[4] ?>">DELETE</a>
                    <p class="card-text">
                        <small class="text-muted">video</small>
                    </p>
                </div>
            </div>

            <?php
            if ($cont % 3 == 0) {
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
        function getListComentariosFromVideo( $param ){
            $conexion = Actions:: joinSession();
            $listVideos = array();

            $sql = "SELECT * FROM comentarios WHERE id_video = ?";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bind_param("i", $param);
            $sentencia->execute();
            $resultado = $sentencia->get_result();
            ?>
            <?php
            $cont = 0;
            while ($fila = $resultado->fetch_row()) {
                $cont++;
                ?>
                <div class="card-group">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title"><?php echo $fila[1] ?></h4>
                            <p class="card-text">  <?php echo $fila[2] ?></p>
                            <a type="button" class="btn btn-danger">DELETE</a>
                            <p class="card-text"><small class="text-muted">Fecha creación : <?php echo $fila[3] ?></small>
                            </p>
                        </div>
                    </div>
                </div>
            <?php
            }
            $sentencia->close();
            $conexion->close();

            return $listVideos;

        }

            function iniciar($parametros = array())
            {
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
                if (!isset($_SESSION["ID"])) {
                    $status = "errorLogin";
                    header('Location: index.php?status=error_login');
                } else {
                    header('Location: index.php');
                }
            }

            function joinSession()
            {
                include("configuration.php");
                $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
                if (mysqli_connect_errno()) {
                    printf("Error de conexion ", mysqli_connect_error());
                    exit();
                }
                return $conexion;
            }

    }