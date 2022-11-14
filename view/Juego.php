<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylejuego1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" href="Fondojuego.css" />
    <title>Document</title>
</head>
<body>   
    <?php
     $contador=1;  //Inicia en la pregunta 1 
     session_start();       
        if(isset($_POST["enviar"])){ //Si se ha pulsado enviar sumamos contador y examinamos las respuestas para sumar puntuacion
            $contador=$_SESSION["numeropregunta"]; 
            $respondio=$_POST["correcta"];
            $valor = "";
            if(isset($_POST["respuesta"])){ //Para las respuestas
                $valor =$_POST["respuesta"];
            }
         
            if(isset($_POST["respuestaa"])){ //Para las respuestas de checkbox
                $valor=$_POST["respuestaa"].$_POST["respuestab"].$_POST["respuestac"].$_POST["respuestad"];
            }
            if($valor==$respondio){
                $_SESSION["puntuacion"]=$_SESSION["puntuacion"]+5;
            }
          
        }else{ //Se ejecuta la primera vez, si no se ha pulsado el botón enviar
            $_SESSION["preguntaTipo"]=$_GET["tipo"];
            $_SESSION["numeropregunta"]=1;   
            $_SESSION["puntuacion"]=0;      
        }
     
        require_once("../control/pasaPreguntas.php");   
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">

        <?php foreach($arrayPreguntas as $registro):?>
            <?php if($registro["numeroPregunta"]==$_SESSION["numeropregunta"]):?>
            <?php $correcta=$registro["correcta"];?> 
        <h1 class="mt-5 pt-5">Pregunta <?php echo $contador;?></h1>
        <fieldset>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <table class="table table-striped mt-5">
                <?php if($registro["tipo"]=="textarea"):?>
                    <tr><th colspan="2"><?php echo $registro["pregunta"]?><input type="hidden" name="correcta" value="<?php echo $correcta;?>"></th></tr>
                    <tr><td><input type="<?php echo $registro["tipo"];?>" name="respuesta"></td><td><?php echo $registro["a"];?></td></tr>
                <?php endif;?>
                <?php if($registro["tipo"]=="radio"):?>
                    <tr><th colspan="2"><?php echo $registro["pregunta"]?><input type="hidden" name="correcta" value="<?php echo $correcta;?>"></th></tr>
                    <tr><td><input type="<?php echo $registro["tipo"];?>" name="respuesta" value="a"></td><td><?php echo $registro["a"];?></td></tr>
                    <tr><td><input type="<?php echo $registro["tipo"];?>" name="respuesta" value="b"></td><td><?php echo $registro["b"];?></td></tr>
                    <tr><td><input type="<?php echo $registro["tipo"];?>" name="respuesta" value="c"></td><td><?php echo $registro["c"];?></td></tr>
                    <tr><td><input type="<?php echo $registro["tipo"];?>" name="respuesta" value="d"></td><td><?php echo $registro["d"];?></td></tr> 
                <?php endif;?> 
                <?php if($registro["tipo"]=="checkbox"):?>
                    <tr><th colspan="2"><?php echo $registro["pregunta"]?><input type="hidden" name="correcta" value="<?php echo $correcta;?>"></th></tr>
                    <tr><td><input type="<?php echo $registro["tipo"];?>" name="respuestaa" value="a"></td><td><?php echo $registro["a"];?></td></tr>
                    <tr><td><input type="<?php echo $registro["tipo"];?>" name="respuestab" value="b"></td><td><?php echo $registro["b"];?></td></tr>
                    <tr><td><input type="<?php echo $registro["tipo"];?>" name="respuestac" value="c"></td><td><?php echo $registro["c"];?></td></tr>
                    <tr><td><input type="<?php echo $registro["tipo"];?>" name="respuestad" value="d"></td><td><?php echo $registro["d"];?></td></tr> 
                <?php endif;?>
                <?php if($registro["tipo"]=="range"):?>
                    <tr><th colspan="2"><?php echo $registro["pregunta"]?><input type="hidden" name="correcta" value="<?php echo $correcta;?>"></th></tr>
                    <tr><td><?php echo $registro["a"];?><input type="<?php echo $registro["tipo"];?>" name="respuesta"min="0" max="2"></td><td><?php echo $registro["b"];?></td></tr>
               
                <?php endif;?>
                <tr>
                <td colspan="2"><input type="submit" name="enviar" value="Siguiente"></td>
                </tr> 
                 
            </table>
        </form>


        </fieldset>
         <?php endif;?>
        <?php endforeach;?>  
      <?php $_SESSION["numeropregunta"]=$contador+1;?>
        
    </div>
    </div>
    </div>
    <?php
        if($contador==8){
            header("location:../control/puntuacion.php"); 
        }

    ?>
  
    
</body>
</html>