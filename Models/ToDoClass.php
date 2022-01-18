<?php 
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/
    include_once($GLOBALS['BASEPATH']."Core/SecurePasswordGenerator.php");
    include_once($GLOBALS['BASEPATH']."Models/LogClass.php");
    include_once($GLOBALS['BASEPATH']."Models/ItemClass.php");
    include_once($GLOBALS['BASEPATH']."Models/AccessTokenClass.php");

    class ToDo{
        public $id;
        public $label;
        public $accessToken;
        public $userPassPhrase;
        public $systemPassPhrase;
        public $items = [];
        private $db;

        public function __construct()
        {
            include_once($GLOBALS['BASEPATH']."Core/DBController.php");
            $this->db = DB::connect();
        }

        public function create($label, $userPassPhrase){
            $label = mysqli_real_escape_string($this->db, $label);
            $userPassPhrase = mysqli_real_escape_string($this->db, $userPassPhrase);
            $systemPassPhrase = SecurePasswordGenerator::getPasswordByTypeAndLength("COMPATIBLE",16);
            $sqlInsert = "INSERT INTO toDo (label,userPassPhrase,systemPassPhrase) VALUES('$label','$userPassPhrase','$systemPassPhrase')";
            mysqli_query($this->db,$sqlInsert);            
            $toDoId = mysqli_insert_id($this->db);
            $this->createAccessTokenById($toDoId);
            $this->getById($toDoId);
            Log::logger("toDo","create",$toDoId);
        }

        public function createAccessTokenById($toDoId){
            AccessToken::createByToDoId($toDoId);
        }

        public function getById($toDoId){
            $toDoId = mysqli_real_escape_string($this->db, $toDoId);
            $sqlSelect  = "SELECT toDo.*,accessToken.accessToken  FROM toDo LEFT JOIN accessToken on toDo.id = accessToken.toDo WHERE toDo.id = '$toDoId' LIMIT 1";
            $mysqliResult = mysqli_query($this->db, $sqlSelect);
            $this->setDataFromMysqliResult($mysqliResult);
        }

        public function getByAccessToken($accessToken){
            $accessToken = mysqli_real_escape_string($this->db, $accessToken);
            $sqlSelect  = "SELECT toDo.*,accessToken.accessToken  FROM toDo LEFT JOIN accessToken on toDo.id = accessToken.toDo WHERE accessToken.accessToken = '$accessToken' LIMIT 1";
            $mysqliResult = mysqli_query($this->db, $sqlSelect);
            $this->setDataFromMysqliResult($mysqliResult);
        }

        public function getByUserAndSystemPassPhrases($userPassPhrase, $systemPassPhrase){
            $userPassPhrase = mysqli_real_escape_string($this->db, $userPassPhrase);
            $systemPassPhrase = mysqli_real_escape_string($this->db, $systemPassPhrase);
            $sqlSelect  = "SELECT toDo.*,accessToken.accessToken  FROM toDo LEFT JOIN accessToken on toDo.id = accessToken.toDo WHERE toDo.userPassPhrase = '$userPassPhrase' and toDo.systemPassPhrase = '$systemPassPhrase' LIMIT 1";
            $mysqliResult = mysqli_query($this->db, $sqlSelect);
            $this->setDataFromMysqliResult($mysqliResult);
        }

        private function setDataFromMysqliResult($result){
            $toDo = mysqli_fetch_assoc($result);            
            $this->id = $toDo['id'];
            $this->label = $toDo['label'];
            $this->accessToken = $toDo['accessToken'];
            $this->userPassPhrase = $toDo['userPassPhrase'];
            $this->systemPassPhrase = $toDo['systemPassPhrase'];
            $this->items = Item::getAllItemsByToDoId($this->id);
        }

        public function addItem($label){
            $item = Item::saveNew($label,$this->id);
        }

        public function setItemStatus($itemId, $status){
            Item::setItemStatus($itemId, $status);
        }


        public function dump(){
            if($this->id){
                echo "<hr>";
                echo "id: ".$this->id."<br>";
                echo "label: ".$this->label."<br>";
                echo "accessToken: ".$this->accessToken."<br>";
                echo "userPassPhrase: ".$this->userPassPhrase."<br>";
                echo "systemPassPhrase: ".$this->systemPassPhrase."<br>";
                echo "items: ".print_r($this->items)."<br>";
            }
        }
    }
?>