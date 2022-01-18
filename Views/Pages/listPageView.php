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
    <body style="padding-bottom:100px;">
        <?php include($_GLOBALS["BASEPATH"]."Views/Components/top.php"); ?>
        
        <!-- CABECERA DE LA LISTA -->
        <div class="l-content" style="text-align: center;">
            <div class="pure-g" style="background-color: #ffea85; padding:5px;">
                <div class="pure-u-2-3">
                    <div style="background-color: #ffea85; padding:5px;">
                        <span style="text-transform:uppercase;font-size:xx-large;"><strong><?php echo $list->label; ?></strong></span><br><br>
                            Este es el ID de tu Secret To-Do: 
                            <strong><?php echo $list->systemPassPhrase; ?></strong><br>
                            <small>(Siempre guárdalo y nunca lo pierdas o no podrás volver a accesar a esta lista)</small>
                            <form name="close" action="?p=closeList" method="POST" onsubmit="return confirm('No olvides resguardar el ID antes de cerrar o no podrás a acceder nuevamente')">
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


        <!-- CUERPO DE LA LISTA -->
        <center>
        <?php  if(count($list->items)){ ?>
            <br>
            <table class="pure-table">
                <thead>
                    <tr>
                        <th colspan="4">Tarea</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                    
                    foreach($list->items as $item){
                        echo '
                        <tr>
                            <td>'.($item->isDone?'&check;':'&#9744;').'</td>
                            <td>'.$item->label.'</td>
                            <td>
                                <form name="completeItem_'.$item->id.'" method="POST" action="?p=completeItem">
                                    <input type="hidden" name="item" value="'.$item->id.'" />
                                    <input type="hidden" name="value" value="'.$item->isDone.'" />
                                    <button type="submit" class="pure-button pure-input-1-2 pure-button-primary">'.($item->isDone?'&#9744;':'&check;').'</button></td>
                                </form>
                            </td>
                            <td>
                                <form name="deleteItem_'.$item->id.'" method="POST" action="?p=deleteItem" onsubmit="return confirm(\'¿Deseas eliminar la tarea?\')">
                                        <input type="hidden" name="item" value="'.$item->id.'" />
                                        <button type="submit" class="button-error pure-button">&#10005;</button></td>
                                </form>
                            </td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </center>
        <?php } else{

            echo '<br>Aún no tienes tareas en tu lista';
        }?>


        <?php include($_GLOBALS["BASEPATH"]."Views/Components/footer.php"); ?>
    </body>
</html>