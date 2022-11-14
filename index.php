<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="Estilos.css" />
    <title>Document</title>
</head>
<body>

<!-- Si anteriormente alguien le dio a recordar se creo una cookie y vamos directamente a la página registrados -->
<?php
if(isset($_COOKIE["nomUsuario"])){
    header("location:view/Registrados.php");
}
?>



<!-- Formulario de inicio de login -->
<div class="wrapper fadeInDown zero-raduis">
  	  <div class="pt-5" id="formContent">
  	    <form action="model/comprueba.php" method="post">
  	      <input type="text" id="email" class="fadeIn second zero-raduis" name="login" placeholder="Usuario" required>
  	      <input type="password" id="password" class="fadeIn third zero-raduis" name="password" placeholder="Password" required>
  	      <input type="submit" name="enviar" class="fadeIn fourth zero-raduis" value="login">
            <div id="formFooter">
                Mantener activa la sesion <input type="checkbox" name="recordar" id="recordar"> 
            </div>
          <input type="submit" name="registrondo" class="fadeIn fourth zero-raduis pc" value="Registrar">
  	    </form>
  	  </div>
  </div>
    
</body>
</html>