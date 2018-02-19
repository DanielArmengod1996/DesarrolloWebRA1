<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 19/02/2018
 * Time: 19:50
 */

require 'Actions.php';
$email           = $_POST['email'];
$contrasena      = $_POST['contrasena'];
$obj = new Actions;
$obj->iniciar( Array( $email, sha1( $contrasena ) ) );

