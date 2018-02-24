<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 20/02/2018
 * Time: 20:45
 */
    require "Actions.php";
    $obj = new Actions;
    $idCanal = $_REQUEST["id_canal"];
    $obj->getListVideosFromChannel( $idCanal );
?>

<a href="?id=createVideoForm&id_canal=<?php $idCanal ?>" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Crear un Video</a>
