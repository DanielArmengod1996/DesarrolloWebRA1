<?php
    /**
 * Created by PhpStorm.
 * User: daniel
 * Date: 20/02/2018
 * Time: 20:57
 */

    $id = $_REQUEST["idComentario"];

    include 'Actions.php';
    $obj = new Actions;
    $sql = "DELETE FROM comentarios WHERE Id = ? ";
    $obj -> register( $sql, Array( $id ) );

?>