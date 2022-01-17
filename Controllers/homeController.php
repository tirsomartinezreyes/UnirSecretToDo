<?php
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/

function getViewPath($page)
{
    switch ($page) {
        case "list":
            return "Views/Pages/listView.php";
            break;
        default:
            return "Views/Pages/homeView.php";
            break;
    }
}
