<?php
    require 'Actions.php';

    $nameVideo = $_POST["nameVideo"];

    header( "Location: index.php?id=videos&nameVideo=" . $nameVideo);

?>