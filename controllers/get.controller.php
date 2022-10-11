<?php

require_once "models/get.model.php";
class GetController
{

    static public function getData($table,$select,$orderBy,$orderMode)
    {
        $response = GetModel::getData($table,$select,$orderBy,$orderMode);

        $return = new GetController();
        $return->fnResponse($response);
    }

    static public function getDataFilter($table,$select,$link,$equals,$orderBy,$orderMode)
    {

        $response = GetModel::getDataFilter($table,$select,$link,$equals,$orderBy,$orderMode);

        $return = new GetController();
        $return->fnResponse($response);
    }
    
    //respuestas del controlador
    public function fnResponse($response)
    {
        if (!empty($response)) { //si no esta vacio

            $json = array(
                'status' => 200,
                'cantidad' => count($response),
                'results' => $response
            );
        } else {

            $json = array(
                'status' => 404,
                'results' => 'Not Found'
            );
        }
        echo json_encode($json, http_response_code($json['status']));
    }
}
