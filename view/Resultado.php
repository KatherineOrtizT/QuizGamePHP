<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../Estilos.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="nav justify-content-end">
        <a class="navbar-brand" href="#">Navbar</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarColor02"
          aria-controls="navbarColor02"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="../view/Registrados.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="puntuaciones.php">Top 5</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../model/Cierre.php?eliminar=1">Eliminar cuenta</a>
            </li>
            <li class="nav-item dropdown">
            <li class="nav-item">
              <a class="nav-link" href="../model/Cierre.php">Cerrar Sesion</a>
            </li>
           
            </li>
          </ul>
          <form class="d-flex"></form>
        </div>
      </div>
</nav> 
    <div class="container">  
      <div class="row">  
        <div class="col-sm-2 col-md-4">
          <?php
         
          $imagen="";
          $texto="";
            if($_SESSION["puntuacion"]<=10){
              $imagen="homer1.gif";
              $texto="Lo has intentado pero te falta un poco mas suerte para la proxima, tu resultado ";

            }else if($_SESSION["puntuacion"]<=20){
              $imagen="homer2.gif";
              $texto="Ya casi lo consigues sigue practicando, tu resultado ";
            }else if($_SESSION["puntuacion"]<=29){
              $imagen="homer3.gif";
              $texto="Vas muy bien casi consigues la maxima puntuacion, tu resultado ";
            }else{
              $imagen="homer.gif";
              $texto="Muy bien eres un profesional, tu resultado ";
            }
          ?>
        </div>   
        <div class="card" style="width: 18rem;" id="formContent">
          <img class="card-img-top" src="../imagenes/<?php echo $imagen;?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Resultado</h5>
            <p class="card-text"> <?php echo $texto. $_SESSION["puntuacion"]; ?></p>
          </div>
        </div>     
        
      </div> 
    </div>
</body>
</html>