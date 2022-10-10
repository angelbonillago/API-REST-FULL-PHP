<?php
//echo "desde el get.php, la ruta<br>";
//print_r($routes_array);
require_once "controllers/get.controller.php";

$table = $routes_array[1]; //obtengo la ruta que está en la posicion1

//courses?select=id_course -> Se separa en un array, un valor antes del '?' y en el sgte valor, lo que continua
$table = explode("?", $table);
$table = $table[0]; //obtengo la posicion 0 del array.

//Si en la ruta no viene un select definido, entonces se traera todos los campos de la tabla.
$select = $_GET['select'] ?? "*";
$orderBy=$_GET['orderBy'] ?? null;
$orderMode=$_GET['orderMode'] ?? null;

$response = new GetController;
//isset() ->metodo que detectará si por la URL viene los parametros definidos.

//RUTA A RECIBIR : apirest.com/courses?select=id_course,title_course,price_course&linkTo=title_course&equalsTo=Python intermedio
if (isset($_GET['linkTo']) && isset($_GET['equalsTo'])) {

    $response->getDataFilter($table, $select,  $_GET['linkTo'],$_GET['equalsTo'],$orderBy,$orderMode);

}
//RUTA A RECIBIR : apirest.com/courses?select=id_course,title_course,price_course
else {
    $response->getData($table, $select,$orderBy,$orderMode);
}