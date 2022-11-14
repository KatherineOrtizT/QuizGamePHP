<?php
  require_once("model/BaseDeDatos.php");
    $preguntas= new Database(); //creo el objeto
    $preguntas->setperfil($_SESSION["fotoperfil"],$_SESSION['nombreUsuario']);
    header("location:view/registrados.php"); //Hacemos un header y no un require porque viene de una página diferente a la que va

?>