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

    
}
