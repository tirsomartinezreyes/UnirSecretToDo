<?php 
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/

include_once($GLOBALS['BASEPATH']."Core/DBController.php");
class Item{
    public $id;
    public $isDone;
    public $label;
    public $toDo;

    public function __construct($label, $toDo, $isDone, $id){
        $this->label = $label;
        $this->toDo = $toDo;
        $this->isDone = false;
        $this->id = $id;
    }

    public static function saveNew($label, $toDo){
        $db = DB::connect();
        $sqlInsert = "INSERT INTO item (label, toDo) VALUES ('$label','$toDo')";
        $result = mysqli_query($db, $sqlInsert);
        Log::logger("item","create",$toDo);
        return new Item($label, $toDo, false, mysqli_insert_id($db));
    }

    
    public static function delete($id){
        $db = DB::connect();
        $sqlDelete = "DELETE FROM item WHERE item.id= '$id' LIMIT 1";
        $result = mysqli_query($db, $sqlDelete);
        Log::logger("item","delete",$id);
    }

    public static function getAllItemsByToDoId($toDoId){
        $db = DB::connect();
        $toDoId = mysqli_real_escape_string($db, $toDoId);
        $sqlSelect  = "SELECT * FROM item WHERE item.toDo= '$toDoId' LIMIT 1000";
        $mysqliResult = mysqli_query($db, $sqlSelect);

        $items = [];
        while ($row = mysqli_fetch_assoc($mysqliResult) ){
            $item = new Item($row['label'],$row['toDo'],$row['isDone'],$row['id']);
            array_push($items,$item);
        }
        return $items;
    }
}
?>