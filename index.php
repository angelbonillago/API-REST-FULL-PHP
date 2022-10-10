<?php

//Mostrar errores


ini_set('display_errors',1); //visualizar errores desde el navegador
ini_set('log_errors',1);//crear el archivo a nivel local dentro de la carpeta
ini_set("error_log",'C:\xampp\htdocs\api_rest_php\php_error_log');//ruta en donde aparecera el archivo errores

//


//conection a la basededatos
require_once "models/connection.php";

//print_r(Connection::infoDatabase());

//print_r(Connection::connect());


//accedo a RoutesController
require_once 'controllers/routes.controllers.php';

$index = new RoutesController();

$index->index();



?>