<?php
  require_once("../model/BaseDeDatos.php");
  $preguntas= new Database(); //creo el objeto
    session_start(); //Porque aún no se ha iniciado las sesiones
    $preguntas->setPuntos($_SESSION["nombreUsuario"],$_SESSION["puntuacion"],$_SESSION["preguntaTipo"]);
  require_once("../view/Resultado.php"); //para pasar el array


?>