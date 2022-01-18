<?php 
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/
    include_once($GLOBALS['BASEPATH']."Models/ToDoClass.php");

    class ListController{

        public static function newList($label, $passPhrase){
            $toDo = new Todo();
            $toDo->create($label,$passPhrase);
            return $toDo;
        }

        public static function getByIdAndPassword($id, $passwd){    
            $toDo = new Todo();      
            $toDo->getByUserAndSystemPassPhrases($passwd,$id);
            return $toDo;
        }

        public static function getByAccessToken($accessToken){
            $toDo = new Todo();      
            $toDo->getByAccessToken($accessToken);
            return $toDo;
        }
        
    }
?>