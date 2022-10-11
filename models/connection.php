<?php
class Connection{
    static public function infoDatabase(){
        $infodb =array(
             "database"=>"apirest_php_prueba",
             "user"=>"root",
             "pass"=>""
             
//apirest_php_prueba
//apirestpermisos

        );
        return $infodb;
    }

    static public function connect(){

        try{

            $link=new PDO(
                "mysql:host=localhost;dbname=".Connection::infoDatabase()["database"],
                Connection::infoDatabase()["user"],
                Connection::infoDatabase()["pass"],
            );
            $link->exec("set names utf8");

        }catch(PDOException $e){

            die("Error: ".$e->getMessage());
        }
        return $link;
    }

    static public function getColumnsData($table){
        //$table -> en esta variable tengo la tabla a validar si existe.

        $database = Connection::infoDatabase()["database"]; //guardo el nombre de la bd a conectarme

        return Connection::connect()->query("SELECT COLUMN_NAME AS item FROM information_schema.columns WHERE table_schema='$database' AND table_name='$table'")
        ->fetchAll(PDO::FETCH_OBJ); //valido si existe la tabla.




    }
    
}
