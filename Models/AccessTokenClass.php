<?php 
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/
include_once($GLOBALS['BASEPATH']."Core/DBController.php");
include_once($GLOBALS['BASEPATH']."Core/SecurePasswordGenerator.php");
include_once($GLOBALS['BASEPATH']."Models/LogClass.php");
class AccessToken{

    public static function createByToDoId($toDoId){
        $db = DB::connect();
        $toDoId = mysqli_real_escape_string( $db, $toDoId);
        $sqlDelete = "DELETE FROM accessToken WHERE toDo = '$toDoId'";
        mysqli_query($db, $sqlDelete);
        $accessToken = SecurePasswordGenerator::getPasswordByTypeAndLength("COMPATIBLE",64);
        $sqlInsert = "INSERT INTO accessToken (accessToken, toDo) VALUES ('$accessToken','$toDoId')";
        mysqli_query($db, $sqlInsert);
        Log::logger("accessToken","create",$toDoId);
        return $accessToken;
    }
}

?>