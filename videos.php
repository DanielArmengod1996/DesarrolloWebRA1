<?php
    require 'Actions.php';
    $obj = new Actions();

    if( isset( $_REQUEST["nameVideo"] ) ){
        $obj->getListSearchVideos( $_REQUEST["nameVideo"] );
    }
    else{
        if( isset( $_REQUEST["mode"] )){
            $posicion = intval( $_REQUEST["posicion"] );
            $modo     = $_REQUEST["mode"];
            $posicion = $posicion >= 1 && $modo == "-1" ? $posicion -=1 : $posicion +=1;
        }
        else{
            $posicion = 0;
        }
        $obj->getListVideos( $posicion );
    }




?>