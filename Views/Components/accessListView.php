<?php 
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/
?>

<div class="pure-u-1 pure-u-md-1-2">
    <div class="pricing-table pricing-table-biz pricing-table-selected">
        <div class="pricing-table-header">
            

            <span class="pricing-table-price">
                ACCEDE
                <span>Ingresa el ID secreto </span>
                <span>Ingresa tu contraseña</span>
            </span>
        </div>
        <form class="pure-form" style="padding: 20px;" method="POST" action="?p=verifyAccessList">
            <fieldset class="pure-group">
                <legend>Ingresa ID y contraseña</legend>
                <input id="listId" name="listId" type="text" class="pure-input-1" placeholder="ID" />
                <input id="listPwd" name="listPwd" type="text" class="pure-input-1" placeholder="Password" />
                <button type="submit" class="pure-button pure-input-1-2 pure-button-primary">Acceder</button>
            </fieldset>
        </form>
    </div>
</div>