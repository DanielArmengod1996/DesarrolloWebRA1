<?php
    /**
 * Created by PhpStorm.
 * User: daniel
 * Date: 20/02/2018
 * Time: 20:57
 */

    $id = $_REQUEST["idVideo"];

    include 'Actions.php';
    $obj = new Actions;
    $sql = "DELETE FROM videos WHERE Id = ? ";
    $obj -> register( $sql, Array( $id ) );

?>