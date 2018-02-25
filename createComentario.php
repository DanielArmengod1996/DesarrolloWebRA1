<?php
    /**
 * Created by PhpStorm.
 * User: daniel
 * Date: 20/02/2018
 * Time: 20:57
 */

    $titulo             = $_POST['titulo'];
    $contenido          = $_POST['contenido'];
    $video              = intval( $_POST['idVideo'] );

    echo "titulo" .     $titulo;
    echo "contenido" .  $contenido;
    echo "video" .      $video;

    include 'Actions.php';
    $obj = new Actions;
    $sql = "INSERT INTO comentarios ( titulo, contenido, id_video ) VALUES ( ? , ? , ? )";
    $obj -> register( $sql, Array( $titulo, $contenido, $video ) );

?>