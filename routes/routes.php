<?php
 //obtenemos la direccion de la API
$routes_array = explode("/", $_SERVER['REQUEST_URI']);
$routes_array = array_filter($routes_array); //filtrado para tener la primera ruta.

if (empty($routes_array)) { //CUANDO NO SE HACEN PETICIONES A LA API
    //echo "vacio";
    $json = array(
        'status' => 404,
        'result' => 'Not found'
    );

    echo json_encode($json, http_response_code($json['status']));

//CUANDO SI SE HACEN PETICIONES A LA API
} elseif (isset($_SERVER['REQUEST_METHOD'])) { //OBTENGO EL METODO QUE LLEGA 'PUT,GET,POST,DELETE,PATCH

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        include 'services/get.php';
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $json = array(
            'status' => 200,
            'result' => 'solicitud POST'
        );

        echo json_encode($json, http_response_code($json['status']));
    }

    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $json = array(
            'status' => 200,
            'result' => 'solicitud DELETE'
        );

        echo json_encode($json, http_response_code($json['status']));
    }

    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $json = array(
            'status' => 200,
            'result' => 'solicitud PUT'
        );

        echo json_encode($json, http_response_code($json['status']));
    }
}

return;
