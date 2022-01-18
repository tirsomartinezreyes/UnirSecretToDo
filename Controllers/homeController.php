<?php
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/

include_once($_GLOBALS["BASEPATH"]."Controllers/listController.php");
class HomeController{
    public static $list;
    public static $instance;

    //implementamos el patrón singleton
    public static function getInstance(){
        if( isset(HomeController::$instance)){
            HomeController::$instance = new HomeController();
        }
        return HomeController::$instance;
    }
    
    public function getViewPath($page){
        switch ($page) {
            case "newList":
                $list = ListController::newList($_POST['listLabel'],$_POST['listPwd']);
                $this->setAccessTokenToSession($list);
                return "Views/Pages/listView.php";
                break;
            
            case "verifyAccessList":
                $list = ListController::getByIdAndPassword($_POST['listId'],$_POST["listPwd"]);
                $this->setAccessTokenToSession($list);
                return "Views/Pages/listView.php";
                break;
            
            case "listView":
                $list = ListController::getByAccessToken($_SESSION['accessToken']);
                return "Views/Pages/listView.php";
                break;
            
            case "closeList":
                $list = ListController::getByAccessToken($_SESSION['accessToken']);
                $list->createAccessTokenById($list->id);
                $this->removeAccessTokenFromSession();
                return "Views/Pages/homeView.php";
                break;

            case "newItem":
                $list = ListController::getByAccessToken($_SESSION['accessToken']);
                $list->addItem($_POST["newItem"]);
                return "Views/Pages/listView.php";
                break;

            default:
                if(isset($_SESSION['accessToken'])){
                    return "Views/Pages/listView.php";
                }else{
                    return "Views/Pages/homeView.php";
                }
                break;
            }
    }

    public function setAccessTokenToSession($list){
        $_SESSION['accessToken'] = $list->accessToken;
    }

    public function removeAccessTokenFromSession(){
        session_unset();
    }
}
