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

    echo "titulo"       . $titulo . "<br/>";
    echo "contenido"    . $contenido . "<br/>";
    echo "ruta video"   . $rutaVideo . "<br/>";
    echo "etiquetas"    . $etiquetas . "<br/>";
    echo "canal"        . $canal . "<br/>";

    include 'Actions.php';
    $obj = new Actions;
    $sql = "INSERT INTO videos ( titulo, contenido, ruta_video, etiquetas, id_canal ) VALUES ( ? , ? , ? , ?, ? )";
    $obj -> register( $sql, Array( $titulo, $contenido, $rutaVideo, $etiquetas, $canal ) );

?>