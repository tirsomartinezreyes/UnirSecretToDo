<?php 
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/
    include_once($GLOBALS['BASEPATH']."Core/DBController.php");
    class Log{
        public static function logger($target, $action, $data){
            $db = DB::connect();
            $target = mysqli_real_escape_string($db, $target);
            $action = mysqli_real_escape_string($db, $action);
            $data = mysqli_real_escape_string($db, $data);
            $sqlInsert = "INSERT INTO log (target,action,data) VALUES('$target','$action','$data')";
            mysqli_query($db,$sqlInsert);            
        }
    }
?>