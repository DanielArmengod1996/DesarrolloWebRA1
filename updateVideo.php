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
    $id              = intval( $_POST['idVideo'] );


    include 'Actions.php';
    $obj = new Actions;
    $sql = "UPDATE videos SET titulo = ?, contenido = ?, ruta_video = ?, etiquetas = ? WHERE Id = ? ";

    $obj -> register( $sql, Array( $titulo, $contenido, $rutaVideo, $etiquetas, $id ) );

?>