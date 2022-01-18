<?php
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/



    $GLOBALS['BASEPATH'] = __DIR__."/";
    session_start();
    
    
    include_once($GLOBALS['BASEPATH']."Controllers/homeController.php");
    $homeController = new HomeController();
    
    $pageToRender = $homeController->getViewPath($_GET['p']);
    include_once($pageToRender);


    /*dumping variables for debugging*/
    /*
    if($_SESSION['accessToken']){
        echo "<hr>To-Do:";
        include_once($GLOBALS['BASEPATH']."Controllers/listController.php");
        $list = ListController::getByAccessToken($_SESSION['accessToken']);
        $list->dump();
    }

    echo "<hr>GET:";
    var_dump($_GET);

    echo "<hr>POST:";
    var_dump($_POST);

    echo "<hr>SESSION:";
    var_dump($_SESSION);
    */
?>
