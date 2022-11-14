<?php
    require_once("../model/BaseDeDatos.php");
    $puntos= new Database(); //creo el objeto
    $arrayPuntos=$puntos->setMejoresPuntos();
    $arrayJugadores=$puntos->setUltimosJugadores();
    $arrayJugadores=array_reverse($arrayJugadores);
    require_once("../view/puntuaciones.php");//creo el objeto
?>