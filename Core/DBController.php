<?php
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/
class DB
{
    public static function connect()
    {
        $params = include($GLOBALS['BASEPATH']."Config/db.php");
        $connection = mysqli_connect($params["host"], $params["user"], $params["pass"], $params["database"]);
        return $connection;
    }
}
