<?php
  require_once("../model/BaseDeDatos.php");
    $usuario= new Database();
    $imagendeusuario=$usuario->getperfil($_SESSION['nombreUsuario']);
  require_once("../view/registrados.php");

?>