<?php
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/

    $GLOBALS['BASEPATH'] = __DIR__."/";
    include_once("Controllers/homeController.php");
    $homeController = new HomeController();
    include_once($homeController->getViewPath($_GET['p']));



    /*dumping*/

    if($homeController->list){
        echo "<hr>To-Do:";
        $homeController->list->dump();
    }

    echo "<hr>GET:";
    var_dump($_GET);

    echo "<hr>POST:";
    var_dump($_POST);
 
?>
