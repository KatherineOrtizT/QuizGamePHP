<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST["enviar"])){
$archivo=$_FILES["imagen"]["name"];
$tamaño=$_FILES["imagen"]["size"];
$tipo=$_FILES["imagen"]["type"];
$nombreTem=$_FILES["imagen"]["tmp_name"];
    if($tamaño<=1000000){
        if($tipo=="image/jpg"||$tipo=="image/jpeg"||$tipo=="image/png"||$tipo=="image/gif"){//que solo puedan subir imagenes
            $carpeta=$_SERVER['DOCUMENT_ROOT'].'/katty/LOGIN/imagenes/';
            move_uploaded_file($_FILES["imagen"]["tmp_name"],$carpeta.$archivo);
            session_start(); 
            $_SESSION["fotoperfil"]=$archivo;
           require_once("control/rutaSubir.php");
            
        }else{
            echo"Solo se pueden subir imagenes jpg/jpeg/png/gif";
        }
    }else{
        echo "El tamaño es muy grande";
    }
} 
?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data"> 
        <input type="file" name="imagen">
        <input type="submit" name="enviar" value="Subir">
      
    </form>
</body>
</html>