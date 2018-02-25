<?php
    /**
 * Created by PhpStorm.
 * User: daniel
 * Date: 20/02/2018
 * Time: 20:57
 */

    $titulo             = $_POST['titulo'];
    $contenido          = $_POST['contenido'];
    $id              = intval( $_POST['idComentario'] );

    include 'Actions.php';
    $obj = new Actions;
    $sql = "UPDATE comentarios SET titulo = ?, contenido = ? WHERE Id = ?  ";

    $obj -> register( $sql, Array( $titulo, $contenido, $id ) );

?>