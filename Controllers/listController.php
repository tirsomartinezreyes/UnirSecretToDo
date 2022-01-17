<?php 
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/
    include_once($GLOBALS['BASEPATH']."Models/ToDoClass.php");

    class ListController{
        public $a = "";

        public static function newList($label, $passPhrase){
            $toDo = new Todo();
            $toDo->create($label,$passPhrase);
            return $toDo;
        }
    }
?>