<?php 
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/
?>
<div class="pure-u-1 pure-u-md-1-2">
    <div class="pricing-table pricing-table-free">
        <div class="pricing-table-header">
            

            <span class="pricing-table-price">
                NUEVO TO-DO
                <span>Crea una contraseña para acceder</span>
                <span>Guarda el ID secreto en un lugar seguro</span>
            </span>
        </div>
            <form class="pure-form" style="padding: 20px;" method="POST" action="?p=newList">
                <fieldset class="pure-group">
                    <legend>Ingresa un nombre y una contraseña para el To-Do</legend>
                    <input id="listLabel" name="listLabel" type="text" class="pure-input-1" placeholder="Nombre de la Lista" />
                    <input id="listPwd" name="listPwd" type="text" class="pure-input-1" placeholder="Password" />
                    <button type="submit" class="pure-button pure-input-1-2 pure-button-primary">Crear</button>
                </fieldset>
            </form>
    </div>
</div>
