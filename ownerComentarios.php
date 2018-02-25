<?php

    require "Actions.php";

    $obj = new Actions;
    $_SESSION["video"] = $_REQUEST["id_video"];
    $obj->getListComentariosFromVideo( intval( $_REQUEST["id_video"] ) );
?>

<a href="?id=createComentarioForm" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Comentar video</a>
