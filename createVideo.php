<?php
    /**
 * Created by PhpStorm.
 * User: daniel
 * Date: 20/02/2018
 * Time: 20:57
 */

    $titulo             = $_POST['titulo'];
    $contenido          = $_POST['contenido'];
    $rutaVideo          = $_POST['rutaVideo'];
    $etiquetas          = $_POST['etiquetas'];
    $canal              = intval( $_POST['idCanal'] );


    $target = "videos/";
    $target = $target . basename( $_FILES['uploaded']['name']) ;
    $ok=1;
    if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target))
    {
        echo "The file ". basename( $_FILES['uploaded']['name']). " has been uploaded";
    }
    else {
        echo "Sorry, there was a problem uploading your file.";
    }



    include 'Actions.php';
    $obj = new Actions;
    $sql = "INSERT INTO videos ( titulo, contenido, ruta_video, etiquetas, id_canal ) VALUES ( ? , ? , ? , ? , ? )";
    $obj -> register( $sql, Array( $titulo, $contenido, $rutaVideo, $etiquetas, $canal ) );

?>