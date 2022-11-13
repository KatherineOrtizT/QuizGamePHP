<?php
  require_once("model/BaseDeDatos.php");
    $preguntas= new Database();
    $preguntas->setperfil($_SESSION["fotoperfil"],$_SESSION['nombreUsuario']);
    header("location:view/registrados.php");

?>