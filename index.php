<?php
session_start();
if (isset($_REQUEST["status"]))
    $status = $_REQUEST["status"];
else
    $status = "";

if ( isset( $_REQUEST["id_canal"] ) ){
    $id_canal = $_REQUEST["id_canal"];
}
else{
    $id_usuario = "";
}

if (isset($_REQUEST["id"]))
    $id = $_REQUEST["id"];
else
    $id = "login";
?>
<html>
    <head>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages lod faster -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css"/>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>


    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
                if( isset( $_REQUEST["status"] ) ) {
                    $status = $_REQUEST["status"];
                    if ($status == "cerrar_sesion") {
                        unset($_SESSION["ID"]);
                        $status = "";
                    }
                }
            ?>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?id=login">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                    <?php
                    if ( isset( $_SESSION["ID"] ) ){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mi sesión</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="?id=ownerChannels">Mis canales</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="?status=cerrar_sesion">Cerrar sesion</a>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" onfocus="?id=videos" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <main role="main" class="container">
            <div class="starter-template">
                </br></br></br>
            </div>
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="?id=videos">Videos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?id=login">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <?php
                        include($id . ".php");
                    ?>
                    <!--comprobante de estado-->
                    <?php
                    //si el estado se encuentra en cerrar_sesion, cerramos la sesion y le establecemos de nuevo la id a l
                    if( isset( $_REQUEST["status"] ) ) {
                        $status = $_REQUEST["status"];
                        if( $status == "error_login" ){
                            echo '<script language="javascript">';
                            echo 'alert("¡¡¡Error al iniciar sesion!!!, el email o la contraseña incorrectos, no existen.")';
                            echo '</script>';
                            $status = "";
                        }
                    }
                    ?>
                </div>
            </div>
        </main>
    </body>
</html>