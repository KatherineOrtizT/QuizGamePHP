<?php
    class Conectar{
        public static function conexion(){
            //Establecemos la conexión con PDO y devolvemos la variablecon conexion
            try {
                $conexion=new PDO ('mysql:host=localhost; dbname=curso_php', 'root', '');
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//le decimos a la base de datos que coja los errores o excepciones como atributos
                $conexion->exec("SET CHARACTER SET utf8"); //que se puedan usar caracteres utf8
            }catch(Exception $e){
                die('Error'.$e->getMessage());
                echo "linea del error" .$e->getLine();
            }
            return $conexion;
        }
    }
?>