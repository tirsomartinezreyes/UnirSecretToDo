<?php
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/


class HomeController{
    public $list;
    public $instance;

    //implementamos el patrón singleton
    public function getInstance(){
        if(!$this->instance){
            $this->instance = new HomeController();
        }
        return $this->instance;
    }
    
    public function getViewPath($page){
        switch ($page) {
            case "newList":
                include_once($_GLOBALS["BASEPATH"]."Controllers/listController.php");
                $list = ListController::newList("Prueba",$_POST['pwd']);
                $this->setList($list);
                return "Views/Pages/listView.php";
                break;

            default:
                return "Views/Pages/homeView.php";
                break;
            }
    }


    public function setList($list){
        $this->list = $list;
    }

}
