
    <?php
    //Si el usuario ha pulsado en eliminar su cuenta borramos sus datos de la base de datos
    if(isset($_GET["eliminar"])){
        if($_GET["eliminar"]==1){  //recuerda envias la informacion en enlaces y se usa get para enlaces 
            require_once("conectar.php");
            $base=Conectar::conexion();
            session_start();   
            $nombre=$_SESSION["nombreUsuario"]; 
            $base->query("DELETE FROM usuarios WHERE nombreUsuario='$nombre'");
            header("Location:../index.php");
        }
    }
   //Si solo has cerrado sesión destruimos la sesión 
    session_start();
    session_destroy();
    //Sii el usuariole dio a mantener la sesión abierta y ahora al cerrar sesión destruimos la cookie
    setcookie("nomUsuario", "katty",time()-5,'/', 'localhost');
       // echo "se borro";
    header("location:../index.php");

   


?>
