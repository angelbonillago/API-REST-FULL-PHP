<?php

include_once "connection.php";
//Connection::infoDatabase();

class GetModel
{
    static function getData($table, $select, $orderBy, $orderMode)
    {

        if (empty(Connection::getColumnsData($table))) { //para validar la existencia de la tabla que pasaron por el endpoint.
            return null;
        } else {

            $sql = "SELECT $select FROM $table";

            if ($orderBy != null && $orderMode != null) {
                $sql = "SELECT $select FROM $table ORDER BY $orderBy $orderMode";
            }

            $stmt = Connection::connect()->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }
    }

    static function getDataFilter($table, $select, $link, $equals, $orderBy, $orderMode)
    {
        if (empty(Connection::getColumnsData($table))) { //para validar la existencia de la tabla que pasaron por el endpoint.
            return null;
        } else {

            $sql = "SELECT $select FROM $table WHERE $link = :$link";

            if ($orderBy != null && $orderMode != null) {
                $sql = "SELECT $select FROM $table ORDER BY $orderBy $orderMode";
            }

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(":" . $link, $equals, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }
    }
}
