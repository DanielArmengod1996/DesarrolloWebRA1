<?php

    require "Actions.php";

    $obj = new Actions;
    $_SESSION["canal"] = $_REQUEST["id_canal"];
    $obj->getListVideosFromChannel( intval( $_REQUEST["id_canal"] ) );
?>

<a href="?id=createVideoForm" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Crear un Video</a>
