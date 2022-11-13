<?php
  require_once("../model/BaseDeDatos.php");
  $preguntas= new Database();
    session_start(); 
    $preguntas->setPuntos($_SESSION["nombreUsuario"],$_SESSION["puntuacion"],$_SESSION["preguntaTipo"]);
  require_once("../view/Resultado.php");


?>