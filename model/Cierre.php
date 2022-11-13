
    <?php
    if(isset($_GET["eliminar"])){
        if($_GET["eliminar"]==1){

            require_once("conectar.php");
            $base=Conectar::conexion();
            session_start();   
            $nombre=$_SESSION["nombreUsuario"];  //recuerda envias la informacion en enlaces y se usa get para enlaces 
            $base->query("DELETE FROM usuarios WHERE nombreUsuario='$nombre'");
            header("Location:../index.php");
        }
    }
   
    session_start();
    session_destroy();
    setcookie("nomUsuario", "katty",time()-5,'/', 'localhost');
       // echo "se borro";
    header("location:../index.php");

   


?>
