<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    
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
              <a class="nav-link" href="puntuaciones.php">Top 5 </a>
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
    <div class="row my-5 py-5">
      <!-- require_once Para obtener el arrayPuntos con todos los datos de las 5 mejores partidas -->
      <?php require_once("../control/topcinco.php");?>

        <div class="col-sm-12 col-md-12">
            <!-- tabla de mejores puntuaciones juego Whiskie -->
            <br>
              <h1>5 Mejores jugadores</h1> 
              <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="col-md-2">Puesto</th>
                    <th class="col-md-5">Usuario</th>
                    <th class="col-md-3">Juego</th>
                    <th class="col-md-2">Puntuación</th>
                </tr>
                </thead>
                <tbody>
                  
                <?php $contadorpuesto=1; foreach($arrayPuntos as $puntuacinos):?>
                        <tr>
                            <td><?php echo $contadorpuesto;?></td>
                            <td><?php echo $puntuacinos["nombreUsuario"];?></td>
                            <td><?php echo $puntuacinos["Juego"];?></td>
                            <td><?php echo $puntuacinos["puntuacion"];?></td>
                            <?php $contadorpuesto++; ?>
                        </tr> 
                    <?php endforeach;?>
                </tbody>
            </table>
             <br>
              <h1>5 ultimos jugadores</h1> 
              <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="col-md-2">Puesto</th>
                    <th class="col-md-5">Usuario</th>
                    <th class="col-md-3">Juego</th>
                    <th class="col-md-2">Puntuación</th>
                </tr>
                </thead>
                <tbody>
                 
                  
                <?php $contadorpuesto=1; foreach($arrayJugadores as $puntuacinos):?>
                        <tr>
                            <td><?php echo $contadorpuesto;?></td>
                            <td><?php echo $puntuacinos["nombreUsuario"];?></td>
                            <td><?php echo $puntuacinos["Juego"];?></td>
                            <td><?php echo $puntuacinos["puntuacion"];?></td>
                            <?php $contadorpuesto++; 
                            if($contadorpuesto==6){
                              break;
                            }?>
                        </tr> 
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-12 col-md-7">
        </div>

    </div>
</div>
</body>
</html>