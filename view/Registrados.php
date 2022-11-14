<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" href="perfil.css" />
    <title>Document</title> 
</head>
<body>
  

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="nav justify-content-end">
        <a class="navbar-brand" href="#">BBr</a>
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
<!-- Si no se ha creado la sesión con el nombre de usuario vamosa login -->
<?php
  session_start();
  if(!isset($_SESSION["nombreUsuario"])){
      header("location:../index.php");
  }
?>  

<div class="container pt-5">
  <div class="row ">
      <div class="col-md-1">
      </div>
      <!-- La foto de perfil del usuario -->
      <div class="col-sm-12 col-md-2">
        <div class="wrapper">
          <div class="profile">
            <?php 
            // si no tiene foto se le pone una por defecto
            $perfil="avatar.jpg";
            require_once("../control/obtenerimagen.php");
            //Recuperamos la foto de la base de datos
              if(isset($imagendeusuario)){
                  foreach ($imagendeusuario as $valor) {
                  $perfil=$valor["imagen"];
                  }
                  if($perfil==""){
                  $perfil="avatar.jpg";
                  }
              }
            ?>
            <!-- Asignamos la foto a la url del src de imagen -->
            <img class="img-thumbnail" src="../../LOGIN/imagenes/<?php echo $perfil;?>"  style="width:10vw;height:20vh;" alt="dibujo" >
            <div class="overlay">
                <div class="about d-flex flex-column">
                    <a href="../edicion.php">Editar</a> 
                </div>
            </div>
          </div> 
        </div>
      </div>
      <!-- Datos del usuario el nombre y su descripción -->
      <div class="col-sm-12 col-md-5">
            <h1><?php echo " Hola ".$_SESSION["nombreUsuario"]."<br>";?></h1>
            <p>Bienvenido al Juego de 2do de DAW</p>
            <p>Proyecto de Php Quiz Game dos juegos enjoy!!</p>
           
      </div>
       <!-- Instanciamos el número de De juegos, la cantidad de insignias y ganarInsignia(en 3 Porque es cuando se gana la primera insignia)
              Con el require_once sacamos el arrayPuntos(datos sobre las 5 mejores jugadas) y partidasJugadas(Cantidad de juegos del usuario)-->
      <div class="col-sm-12 col-md-4">
         <?php
        $numeroJuegos="0"; 
        $ganarInsignia="3";
        $cantidadInsigina="0";
        require_once("../control/todopuntos.php");
        foreach($partidasJugadas as $juegos){
          $numeroJuegos=$juegos["total"];
        }?>
        <h5>Insignias</h5>
        <!-- Se editan los datos depende de la cantidad de partidas jugadas -->
        <div>   
          <?php 
            if($numeroJuegos>=3){
            echo  '<img class="rounded-circle" src="../imagenes/i2.jpg" style="width:65px;height:55px;margin-right:15px;" alt="entrada instagram">'; 
            $ganarInsignia="5";
            $cantidadInsigina="1";
            }else{
              echo' <img class="rounded-circle" src="../imagenes/i1.jpg" style="width:65px;height:55px;margin-right:15px;" alt="entrada facebook"> ';
            }
            if($numeroJuegos>=5){
              echo  '<img class="rounded-circle" src="../imagenes/i2.jpg" style="width:65px;height:55px;margin-right:15px;" alt="entrada instagram">'; 
              $ganarInsignia="8";
              $cantidadInsigina="2";
            }else{
              echo' <img class="rounded-circle" src="../imagenes/i1.jpg" style="width:65px;height:55px;margin-right:15px;" alt="entrada facebook"> ';
            }
            if($numeroJuegos>=8){
              echo  '<img class="rounded-circle" src="../imagenes/i2.jpg" style="width:65px;height:55px;margin-right:15px;" alt="entrada instagram">'; 
              $ganarInsignia="100";
              $cantidadInsigina="3";
            }else{
              echo' <img class="rounded-circle" src="../imagenes/i1.jpg" style="width:65px;height:55px;margin-right:15px;" alt="entrada facebook"> ';
            } 
            if($numeroJuegos>=100){
              echo  '<img class="rounded-circle" src="../imagenes/i2.jpg" style="width:65px;height:55px;margin-right:15px;" alt="entrada instagram">'; 
              $ganarInsignia="0";
              $cantidadInsigina="4";
            }else{
              echo' <img class="rounded-circle" src="../imagenes/i1.jpg" style="width:65px;height:55px;margin-right:15px;" alt="entrada facebook"> ';
            }
            echo "<br>Juega $ganarInsignia partidas para ganar una insignia";
          ?>

          <div class="d-flex justify-content-between align-items-center mt-4 px-4">

            <div class="stats">
              <h6 class="mb-0">Juegos</h6>
              <span><?php echo $numeroJuegos; ?></span>
            </div>

            <div class="stats">
              <h6 class="mb-0">Insignias</h6>
              <span><?php echo $cantidadInsigina;?></span>
            </div>

            

          </div>
          
        </div>

      </div>    
  </div>
  <div class="row my-5">
      <div class="col-sm-12 col-md-8">
        <!-- Tabla personal con las 5 mejores partidas -->
        <table class="table table-striped">
          <thead>
            <tr>
                <th class="col-md-5">Usuario</th>
                <th class="col-md-3">Juego</th>
                <th class="col-md-2">Puntuación</th>
            </tr>
          </thead>
          <tbody>
            <!-- arrayPuntos que solicitamos a la base de datos con las 5 mejores puntuaciones -->
            <?php foreach($arrayPuntos as $puntuacion):?>
              <tr>
                  <td><?php echo $puntuacion["nombreUsuario"];?></td>
                  <td><?php echo $puntuacion["Juego"];?></td> 
                  <td><?php echo $puntuacion["puntuacion"];?></td>
              </tr> 
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <!-- Div con las imágenes y enlaces a los juegos -->
      <div class="col-md-4 pr-5">
        <h3>Juegos</h3>
        <a href="juego.php?tipo=cerveza">
        <img class="rounded-circle mb-5" src="../imagenes/cerveza.gif" style="width:10vw;height:20vh;margin-right:15px;" alt="entrada instagram">  
        </a>
        <a href="juego.php?tipo=preguntaswhisky">
        <img class="rounded-circle mb-5" src="../imagenes/whisky.gif" style="width:10vw;height:20vh;margin-right:15px;" alt="entrada instagram">       
        </a>
      </div>
  </div>
</div>



    
</body>
</html>