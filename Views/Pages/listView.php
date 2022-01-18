<?php 
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/
include_once($_GLOBALS["BASEPATH"]."Controllers/listController.php");
$list = ListController::getByAccessToken($_SESSION['accessToken']);
?>

<!doctype html>
<html lang="en">
    <?php include($_GLOBALS["BASEPATH"]."Views/Components/head.php"); ?>
    <body>
        <?php include($_GLOBALS["BASEPATH"]."Views/Components/top.php"); ?>
        <div class="l-content" style="text-align: center;">
            <div class="pure-g" style="background-color: #ffea85; padding:5px;">
                <div class="pure-u-2-3">
                    <div style="background-color: #ffea85; padding:5px;">
                        <span style="text-transform:uppercase;font-size:xx-large;"><strong><?php echo $list->label; ?></strong></span><br><br>
                            Este es el ID de tu Secret To-Do: 
                            <strong><?php echo $list->systemPassPhrase; ?></strong><br>
                            <small>(Siempre guárdalo y nunca lo pierdas o no podrás volver a accesar a esta lista)</small>
                            <form name="close" action="?p=closeList" method="POST" onsubmit="return confirm('No olvides resguardar el ID antes de cerrar o no podrás a acceder nuevamente')">
                                    <!--
                                        <button id="agregar" name= "" class="button-success pure-button">Success Button</button>
                                        <button class="button-error pure-button">Error Button</button>
                                        <button class="button-warning pure-button">Warning Button</button>
                                    -->
                                <button class="button-error pure-button">Cerrar</button>
                            </form>
                    </div>
                </div>
                
                <div class="pure-u-1-3">
                    <form class="pure-form" style="padding: 20px;" method="POST" action="?p=newItem">
                        <fieldset class="pure-group">
                            <input id="newItem" name="newItem" type="text" class="pure-input-1" placeholder="Agrega una tarea" />
                            <button type="submit" class="pure-button pure-input-1-2 pure-button-primary">Agregar</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div> <!-- end l-content -->
        <center>
        <?php  if(count($list->items)){ ?>
            <br>
            <table class="pure-table">
                <thead>
                    <tr>
                        <th>Tarea</th>
                        <th colspan>Terminado</th>
                        <th colspan>Cambiar Estado</th>
                        <th colspan>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    foreach($list->items as $item){
                        echo '
                        <tr>
                            <td>'.$item->label.'</td>
                            <td>'.($item->isDone?'SI':'NO').'</td>
                            <td></td>
                            <td></td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
            </center>

        <?php } ?>
        <?php include($_GLOBALS["BASEPATH"]."Views/Components/footer.php"); ?>
    </body>
</html>