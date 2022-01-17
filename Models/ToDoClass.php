<?php 
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/
    include_once($GLOBALS['BASEPATH']."Core/SecurePasswordGenerator.php");
    include_once($GLOBALS['BASEPATH']."Models/LogClass.php");

    class ToDo{
        public $id;
        public $label;
        public $items;
        public $accessToken;
        public $userPassPhrase;
        public $systemPassPhrase;
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
            $this->createAccessToken($toDoId);
            $this->getById($toDoId);
            Log::logger("toDo","create",$toDoId);
        }

        public function createAccessToken($toDoId){
            $toDoId = mysqli_real_escape_string($this->db, $toDoId);
            $sqlDelete = "DELETE * FROM accessToken WHERE id = '$toDoId' LIMIT 1";
            mysqli_query($this->db, $sqlDelete);
            $accessToken = SecurePasswordGenerator::getPasswordByTypeAndLength("COMPATIBLE",64);
            $sqlInsert = "INSERT INTO accessToken (accessToken, toDo) VALUES ('$accessToken','$toDoId')";
            mysqli_query($this->db,$sqlInsert);
            Log::logger("accessToken","create",$toDoId);
        }

        public function getById($toDoId){
            $toDoId = mysqli_real_escape_string($this->db, $toDoId);
            $sqlSelect  = "SELECT toDo.*,accessToken.accessToken  FROM toDo LEFT JOIN accessToken on toDo.id = accessToken.toDo WHERE toDo.id = '$toDoId' LIMIT 1";
            $responseSelect = mysqli_query($this->db, $sqlSelect);
            $toDo = mysqli_fetch_assoc($responseSelect);
            $this->id = $toDo['id'];
            $this->label = $toDo['label'];
            $this->accessToken = $toDo['accessToken'];
            $this->userPassPhrase = $toDo['userPassPhrase'];
            $this->systemPassPhrase = $toDo['systemPassPhrase'];
        }

        public function dump(){
            if($this->id){
                echo "<hr>";
                echo "id: ".$this->id."<br>";
                echo "label: ".$this->label."<br>";
                echo "accessToken: ".$this->accessToken."<br>";
                echo "userPassPhrase: ".$this->userPassPhrase."<br>";
                echo "systemPassPhrase: ".$this->systemPassPhrase."<br>";
            }
        }
    }
?>