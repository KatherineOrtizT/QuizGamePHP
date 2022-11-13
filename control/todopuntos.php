<?php
    require_once("../model/BaseDeDatos.php");
    $puntosUsuario= new Database();//creo el objeto pregunta
    $arrayPuntos=$puntosUsuario->get_puntosUsuario($_SESSION["nombreUsuario"]);
    require_once("../view/registrados.php"); //para pasar el array

?>