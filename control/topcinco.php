<?php
    require_once("../model/BaseDeDatos.php");
    $puntos= new Database(); //creo el objeto
    $arrayPuntos=$puntos->setMejoresPuntos();
    require_once("../view/puntuaciones.php");//creo el objeto
?>