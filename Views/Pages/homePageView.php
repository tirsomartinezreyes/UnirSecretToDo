<?php 
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/
?>
<!doctype html>
<html lang="en">
    <?php include($_GLOBALS["BASEPATH"]."Views/Components/head.php"); ?>
    <body>
        <?php include($_GLOBALS["BASEPATH"]."Views/Components/top.php"); ?>
        
        <div class="l-content">
            <div class="pricing-tables pure-g">
                <?php include_once($_GLOBALS["BASEPATH"]."Views/Components/newListView.php"); ?>
                <?php include_once($_GLOBALS["BASEPATH"]."Views/Components/accessListView.php"); ?>
            </div> <!-- end pricing-tables -->
        </div> <!-- end l-content -->
        
        <?php include($_GLOBALS["BASEPATH"]."Views/Components/footer.php"); ?>
    </body>
</html>