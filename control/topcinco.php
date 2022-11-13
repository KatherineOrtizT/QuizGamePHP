<?php
    require_once("../model/BaseDeDatos.php");
    $puntos= new Database();
    $arrayPuntos=$puntos->setMejoresPuntos();
    require_once("../view/puntuaciones.php");
?>