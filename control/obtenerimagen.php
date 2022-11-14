<?php
  require_once("../model/BaseDeDatos.php");
    $usuario= new Database(); //creo el objeto
    $imagendeusuario=$usuario->getperfil($_SESSION['nombreUsuario']);
  require_once("../view/registrados.php");//creo el objeto

?>