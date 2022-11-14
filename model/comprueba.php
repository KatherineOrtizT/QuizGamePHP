    <?php
    
        $autenticar=false;
        if(isset($_POST["enviar"])){ //comprueba si se ha pulsado el boton enviar
            try {
                $base=new PDO ('mysql:host=localhost; dbname=curso_php', 'root', '');
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//le decimos a la base de datos que coja los errores o excepciones como atributos
                $base->exec("SET CHARACTER SET utf8"); //que se puedan usar caracteres utf8
                $sql= "SELECT * from usuarios WHERE nombreUsuario= :nombre"; 
                $resultado =$base -> prepare($sql);
                //creamos login y password con htmlentities convierte cualquier simbolo en html y addslashes escapa cualquier carcter de estos para evitar la inyeccion
                $login=htmlentities(addslashes($_POST["login"])); //en estas variables guardamos lo que introdujo el usuario
                $password=htmlentities(addslashes($_POST["password"]));
                $contador=0;
                $resultado->execute(array(":nombre"=>$login));//no usamos array porque no vamos a imprimir nada solo necesitamos saber si esta o no
                while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                    if(password_verify($password,$registro["contraseña"])){ //Comparamos lo que introdujo el usuario con la encriptación de la base de datos 
                        $contador++;
                    }
                }
               // $numeroRegistro=$resultado->rowCount(); //nos dice si hay o no registros da un 0 si no encontro registros y un 1 si no existe
              
           
                //if($numeroRegistro!=0){
                //
                if($contador!=0){
                  $autenticar=true;  //si tuvo exito y entro cambia a true y creamos una sesion Con el nombre de usuario
                  session_start(); 
                  $_SESSION["nombreUsuario"]=$_POST["login"];
                  if(isset($_POST["recordar"])){ //Si le dio al checkbox recordar creamos una cookie
                        setcookie("nomUsuario",$_POST["login"], time()+3060, '/', 'localhost');// si no marca el recordar no crea ala cookie 'localhost' crea la cookie para todo el "dominio" localhost      
                    } 
                 header("location:../view/Registrados.php"); //y vamos a registrados
                }else{
                    header("location:../index.php"); //Si no tuvo exito volvemos al index
                }
            }catch (Exception $e) {
                die("error".$e->getMessage());
            }
        }

        if(isset($_POST["registrondo"])){  //Comprueba si se ha pulsado en el botón registrar
            $contraUsuario=$_POST["password"];
            $nombreUsuario=$_POST["login"];
            $pass_encriptado=password_hash($contraUsuario,PASSWORD_DEFAULT); //Encrypt amos la contraseña , array("cost"=>12) array como tercer parametro modificamos el coste a 12 es opcional
            try{

                $base=new PDO ('mysql:host=localhost; dbname=curso_php', 'root', '');
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base->exec("SET CHARACTER SET utf8");
                // para insertar necesitamos que todos los campos restantes no sean not null
                $sql= "SELECT nombreUsuario from usuarios"; 
                $resultado =$base -> prepare($sql);
                $resultado->execute(array());
                while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                    if($nombreUsuario==$registro["nombreUsuario"]){ 
                        $autenticar=true;
                    }
                }
                if($autenticar){
                    header("location:../index.php");
                }else{
                    $sql= "INSERT INTO usuarios (nombreUsuario,contraseña) VALUES (:c_art, :seccion)";  
                    $resultado = $base -> prepare($sql); 
                    $resultado->execute(array (":c_art"=>$nombreUsuario,":seccion"=>$pass_encriptado)); // funcion flecha va con un igual
                    //Creamos una sesión y pasamos a la página registrados
                    session_start();
                    $_SESSION["nombreUsuario"]=$_POST["login"];
                    header("location:../view/Registrados.php");
                    if(isset($_POST["recordar"])){ //Si le dio a recordarcreamos Una cookie
                        setcookie("nomUsuario",$_POST["login"], time()+60);// si no marca el recordar no crea ala cookie
                       
                    } 
               
                }
                 $resultado->closeCursor();

               
             } catch (Exception $e) {
                     die ('error' .$e->GetMessage());
            }

        }

    ?>
