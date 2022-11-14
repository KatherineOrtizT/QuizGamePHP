<?php
    require_once("../model/BaseDeDatos.php");
    $puntosUsuario= new Database();//creo el objeto
    $arrayPuntos=$puntosUsuario->get_puntosUsuario($_SESSION["nombreUsuario"]); 
    $partidasJugadas=$puntosUsuario->get_partidas($_SESSION["nombreUsuario"]);
    require_once("../view/registrados.php"); //para pasar los array

?>