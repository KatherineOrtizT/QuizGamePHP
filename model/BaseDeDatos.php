<?php
   class Database {
    private $base;
    private $preguntas;

    public function __construct(){ //generamos el constructor de pregunta
        require_once("conectar.php");
        $this->base=Conectar::conexion(); //guardamos conectar 
        $this->preguntas=array(); //declatamos que preguntas es array en nuestro objeto
    }
        //Da la tabla con todos los datos de la pregunta
        public function get_pregunta($dato){
            $sql='Select * from '.$dato; //crear la sentencia
            $sentencia=$this->base->prepare($sql);
            $sentencia->execute(array());
            $preguntas =$sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $preguntas;
            $this->base=null;//para cerrar conecciones 
        }
        //Recibe un parámetro con el nombre de usuario y te da las 5 mejores puntuaciones del usuario ordenadas descendentemente
        public function get_puntosUsuario($dato){
            $sql="SELECT * from puntuaciones where nombreUsuario='$dato' ORDER BY puntuacion desc limit 5" ;//crear la sentencia
            $sentencia=$this->base->prepare($sql);
            $sentencia->execute(array());
            $puntos =$sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $puntos;
            $this->base=null;//para cerrar conecciones 
        }
        //Recibe un parámetro con el nombre del usuario y te da el número de partidas jugadas
        public function get_partidas($dato){
            $sql="SELECT count(*) as total from puntuaciones where nombreUsuario='$dato'" ;//crear la sentencia
            $sentencia=$this->base->prepare($sql);
            $sentencia->execute(array());
            $partidas =$sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $partidas;
            $this->base=null;//para cerrar conecciones 
        }
        //Recibe 3 parámetros a insertar en la tabla después de cada partida el nombre del usuario los puntos y el juegos
        public function setPuntos($usuario,$puntos,$juego){
            if($puntos==5){
                $puntos="05";
            }
            $sql="INSERT INTO puntuaciones (nombreUsuario,puntuacion,juego)values (:usu,:pun, :juego)"; //crear la sentencia
            $sentencia=$this->base->prepare($sql);
            $sentencia->execute(array(":usu"=>$usuario, ":pun"=>$puntos,":juego"=>$juego));
            $this->base=null;
        }
        //Da las 5 mejores puntuaciones de todos los jugadores de todos los juegos
        public function setMejoresPuntos(){
            $sql="SELECT * from puntuaciones ORDER BY puntuacion desc limit 5"; //crear la sentencia
            $sentencia=$this->base->prepare($sql);
            $sentencia->execute(array());
            $puntos =$sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $puntos;
            $this->base=null;
        }
        //Da un array con las puntuaciones de los usuarios
        public function setUltimosJugadores(){
            $sql="SELECT * from puntuaciones"; //crear la sentencia
            $sentencia=$this->base->prepare($sql);
            $sentencia->execute(array());
            $puntos =$sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $puntos;
            $this->base=null;
        }
        //Recibe el nombre de usuario el nombre de la imagen y lo sube a la tabla del usuario
        public function setperfil($ruta,$usu){
            $sql="UPDATE usuarios SET imagen=:img WHERE nombreUsuario=:usu "; //crear la sentencia
            $sentencia=$this->base->prepare($sql);
            $sentencia->execute(array(":img"=>$ruta,":usu"=>$usu));
            $this->base=null;
        }
        //Recibe un parámetro con el nombre del usuario y devuelve el nombre de la imagen de perfil
        public function getperfil($usuario){
            $sql="SELECT imagen from usuarios where nombreUsuario=:usu"; //crear la sentencia
            $sentencia=$this->base->prepare($sql);
            $sentencia->execute(array(":usu"=>$usuario));
            $puntos =$sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $puntos;
            $this->base=null;
        }
        
    }
?>