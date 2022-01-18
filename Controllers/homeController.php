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
                return "Views/Pages/listPageView.php";
                break;
            
            case "verifyAccessList":
                $list = ListController::getByIdAndPassword($_POST['listId'],$_POST["listPwd"]);
                $this->setAccessTokenToSession($list);
                return "Views/Pages/listPageView.php";
                break;
            
            case "listView":
                $list = ListController::getByAccessToken($_SESSION['accessToken']);
                return "Views/Pages/listPageView.php";
                break;
            
            case "closeList":
                $list = ListController::getByAccessToken($_SESSION['accessToken']);
                $list->createAccessTokenById($list->id);
                $this->removeAccessTokenFromSession();
                return "Views/Pages/homePageView.php";
                break;

            case "newItem":
                $list = ListController::getByAccessToken($_SESSION['accessToken']);
                $list->addItem($_POST["newItem"]);
                return "Views/Pages/listPageView.php";
                break;
            
            case "completeItem":
                    $list = ListController::getByAccessToken($_SESSION['accessToken']);
                    
                    if($this->itemInList($list,$_POST['item'])){
                        $list->setItemStatus($_POST['item'],!!!$_POST['value']);
                    }
                    
                    return "Views/Pages/listPageView.php";
                    break;
            
            case "deleteItem":
                $list = ListController::getByAccessToken($_SESSION['accessToken']);
                
                if($this->itemInList($list,$_POST['item'])){
                    $list->deleteItem($_POST['item']);
                }
                
                return "Views/Pages/listPageView.php";
                break;

            default:
                if(isset($_SESSION['accessToken'])){
                    return "Views/Pages/listPageView.php";
                }else{
                    return "Views/Pages/homePageView.php";
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

    public function itemInList($list, $idItem){
        if($list){
            if($list->items){
                foreach($list->items as $item){
                    if($item->id == $idItem){
                        return true;
                    }
                }
            }
        }

        return false;
    }
}
