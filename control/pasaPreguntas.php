<?php
    require_once("../model/BaseDeDatos.php");
    $preguntas= new Database();//creo el objeto pregunta
    $arrayPreguntas=$preguntas->get_pregunta($_SESSION["preguntaTipo"]);
    require_once("../view/Juego.php"); //para pasar el array
?>