<?php
    require 'Actions.php';

    if( isset( $_REQUEST["mode"] )){
        echo $_REQUEST["mode"];
        echo $_REQUEST["posicion"];
        $posicion = intval( $_REQUEST["posicion"] );
        $modo     = $_REQUEST["mode"];
        $posicion = $posicion >= 1 && $modo == "-1" ? $posicion -=1 : $posicion +=1;
    }
    else{
        $posicion = 1;
    }

    $obj = new Actions();
    $nombreVideos = $obj->getListVideos( $posicion );

?>