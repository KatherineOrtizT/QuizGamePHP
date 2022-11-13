<?php
   class Database {
    private $base;
    private $preguntas;

    public function __construct(){ //generamos el constructor de pregunta
        require_once("conectar.php");
        $this->base=Conectar::conexion(); //guardamos conectar 
        $this->preguntas=array(); //declatamos que preguntas es array en nuestro objeto
    }
    
        public function get_pregunta($dato){
            $sql='Select * from '.$dato; //crear la sentencia
            $sentencia=$this->base->prepare($sql);
            $sentencia->execute(array());
            $preguntas =$sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $preguntas;
            $this->base=null;//para cerrar conecciones 
        }
        public function get_puntosUsuario($dato){
            $sql="SELECT * from puntuaciones where nombreUsuario='$dato' ORDER BY puntuacion desc limit 5" ;//crear la sentencia
            $sentencia=$this->base->prepare($sql);
            $sentencia->execute(array());
            $puntos =$sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $puntos;
            $this->base=null;//para cerrar conecciones 
        }
        public function setPuntos($usuario,$puntos,$juego){
            $sql="INSERT INTO puntuaciones (nombreUsuario,puntuacion,juego)values (:usu,:pun, :juego)"; //crear la sentencia
            $sentencia=$this->base->prepare($sql);
            $sentencia->execute(array(":usu"=>$usuario, ":pun"=>$puntos,":juego"=>$juego));
            $this->base=null;
        }
        public function setMejoresPuntos(){
            $sql="SELECT * from puntuaciones ORDER BY puntuacion desc limit 5"; //crear la sentencia
            $sentencia=$this->base->prepare($sql);
            $sentencia->execute(array());
            $puntos =$sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $puntos;
            $this->base=null;
        }
        public function setperfil($ruta,$usu){
            $sql="UPDATE usuarios SET imagen=:img WHERE nombreUsuario=:usu "; //crear la sentencia
            $sentencia=$this->base->prepare($sql);
            $sentencia->execute(array(":img"=>$ruta,":usu"=>$usu));
            $this->base=null;
        }
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