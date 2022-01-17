<?php
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Noviembre 2021
*/

//Tipos de passwords
$typesArray = ["COMPATIBLE", "STANDARD", "SAFE"];

//Longitudes de password
$lengthsArray = array("SMALL"=>8, "MEDIUM"=>12, "LARGE"=>16, "EXTRA_LARGE"=>32);

//Alfabetos
//Alfabeto base en minúsculas
$alphabet = "abcdefghijklmnopqrtuvwxyz";

//Alfabeto compatible, utilizando función de cadenas para concatenar mayúsculas y minúsculas
define("COMPATIBLE_DICTIONARY", $alphabet.strtoupper($alphabet)."0123456789");
define("STANDARD_DICTIONARY", "@#$%&!");
define("SAFE_DICTIONARY", "+-/*=^.:,;~/\|[]{}");

//Variable de salida como array
$PASSWORDS = array();

//iteración para cada tipo de password 
for($i=0; $i<count($typesArray); $i++){
    $type = $typesArray[$i];
    //iteración para cada longitud
    foreach($lengthsArray as $label => $length){
        //Generación de TxL passwords y asignación a array asociativo
        $PASSWORDS[$type][$label] = getPasswordByTypeAndLength($type,$length);
    }
}

//Genera un password de tipo $type y de longitud $length, con valores por default
function getPasswordByTypeAndLength($type = "COMPATIBLE", $length = 8){
    $output = "";
    //iteramos hasta cumplir con la longitud deseada
    do {
        //validamos que el primer caracter sea siempre un caracter compatible
        if(strlen($output) == 0){
            $output.= getRandomCharByType("COMPATIBLE");
        }else{
            //Obtenemos los siguientes caracteres de modo aleatorio para el tipo de password seleccionado
            $output.= getRandomCharByType($type);
        }
    } while(strlen($output) < $length);
    return $output;
}


//Genera un caracter aleatorio para un tipo de password $type generando un diccionario ad hoc para tratar de mantener una probabilidad equivalente entre todos los símbolos del alfabeto
function getRandomCharByType($type = "COMPATIBLE"){
    $dictionary = "";
    //identificamos el caso del tipo de password requerido
    switch ($type){
        case "COMPATIBLE":
            //Utilizamos el diccionario compatible
            $dictionary = COMPATIBLE_DICTIONARY;
            break;
        case "STANDARD":
            //utilizamos un diccionario compatible concatenando 5x el diccionario de caracteres para passwords estándar
            $dictionary = COMPATIBLE_DICTIONARY.str_repeat(STANDARD_DICTIONARY,5);
            break;
        case "SAFE":
            //utilizamos un diccionario compatible concatenando 5x el diccionario de caracteres para passwords estándar y concatenando 2x el diccionario de caracteres para passwords seguros
            $dictionary = COMPATIBLE_DICTIONARY.str_repeat(STANDARD_DICTIONARY,5).str_repeat(SAFE_DICTIONARY,2);
            break;
        default:
            $dictionary = COMPATIBLE_DICTIONARY;
    }

    //para maximizar la equivalencia de probabilidad de cada símbolo, se aleatorizan los caracteres en el diccionario 
    $dictionary = str_shuffle($dictionary);
    $randomChar = $dictionary[rand(0,strlen($dictionary)-1)];
    return $randomChar;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive pricing table.">
    <title>Generador de passwords &ndash; UNIR</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/grids-responsive-min.css">
    <style>body{color:#526066}.subtitle{font-size:0.5em;}h2,h3{letter-spacing:.25em;text-transform:uppercase;font-weight:600}p{line-height:1.6em}.l-content{margin:0 auto}.l-box{padding:.5em 2em}.pure-menu{box-shadow:0 1px 1px rgba(0,0,0,.1)}.pure-menu-link{padding:.5em .7em}.banner{background-color:#000;text-align:center;background-size:cover;height:200px;width:100%;margin-bottom:3em;display:table}.banner-head{display:table-cell;vertical-align:middle;margin-bottom:0;font-size:2em;color:#fff;font-weight:500;text-shadow:0 1px 1px #000}.information,.pricing-tables{max-width:980px;margin:0 auto}.pricing-tables{margin-bottom:3.125em;text-align:center}.pricing-table{border:1px solid #ddd;margin:0 .5em 2em;padding:0 0 3em}.pricing-table-free .pricing-table-header{background:#519251}.pricing-table-biz .pricing-table-header{background:#2c4985}.pricing-table-header{background:#111;color:#fff}.pricing-table-header h2{margin:0;padding-top:2em;font-size:1em;font-weight:400}.pricing-table-price{font-size:2.5em;margin:.2em 0 0;font-weight:100}.pricing-table-price span{display:block;text-transform:uppercase;font-size:.2em;padding-bottom:2em;font-weight:400;color:rgba(255,255,255,.5)}.pricing-table-list{list-style-type:none;margin:0;padding:0;text-align:center}.pricing-table-list li{font-size:0.9em;font-family: 'Courier New', monospace;padding:.8em 0;background:#f7f7f7;border-bottom:1px solid #e7e7e7;overflow-wrap:anywhere;padding-left:2%;padding-right:2%;min-height:30px;vertical-align:middle}.button-choose{border:1px solid #ccc;background:#fff;color:#333;border-radius:2em;font-weight:700;position:relative;bottom:-1.5em}.information-head{color:#000;font-weight:500}.footer{background:#111;color:#888;text-align:center}.footer a{color:#ddd}@media (min-width:767px){.banner-head{font-size:4em}.pricing-table{margin-bottom:0}}@media (min-width:480px){.banner{height:400px}.banner-head{font-size:3em}}</style>
</head>

<!doctype html>
<html lang="en">
<body>

<div class="banner">
    <h1 class="banner-head">
        GENERADOR DE CONTRASEÑAS.<br>
        <span class="subtitle">Escoge el nivel y longitud deseado</span><br/>
    </h1>
</div>

<div class="l-content">
    <div class="pricing-tables pure-g">
        <div class="pure-u-1 pure-u-md-1-3">
            <div class="pricing-table pricing-table-free">
                <div class="pricing-table-header">
                    

                    <span class="pricing-table-price">
                        COMPATIBLE 
                        <span>Alfabeto y números</span>
                        <span>Entropía de 48 a 91 bits</span>
                    </span>
                </div>

                <ul class="pricing-table-list">
                    <?php 
                    foreach($PASSWORDS['COMPATIBLE'] as $key => $value){
                        echo "<li>".$value."</li>";
                    }
                    ?>
                </ul>

                <button class="button-choose pure-button" onClick="location.reload()">Generar nuevo</button>
            </div>
        </div>

        <div class="pure-u-1 pure-u-md-1-3">
            <div class="pricing-table pricing-table-biz pricing-table-selected">
                <div class="pricing-table-header">
                    

                    <span class="pricing-table-price">
                        ESTÁNDAR <span>+ Símbolos comunes</span>
                        <span>Entropía de 50 a 195 bits</span>
                    </span>
                </div>

                <ul class="pricing-table-list">
                    <?php 
                        foreach($PASSWORDS['STANDARD'] as $key => $value){
                            echo "<li>".$value."</li>";
                        }
                    ?>
                </ul>

                <button class="button-choose pure-button" onClick="location.reload()">Generar nuevo</button>
            </div>
        </div>

        <div class="pure-u-1 pure-u-md-1-3">
            <div class="pricing-table pricing-table-enterprise">
                <div class="pricing-table-header">

                    <span class="pricing-table-price">
                        SEGURO <span>+ símbolos poco comunes</span>
                        <span>Entropía de 51 a 205 bits</span>
                    </span>
                </div>

                <ul class="pricing-table-list">
                    <?php 
                        foreach($PASSWORDS['SAFE'] as $key => $value){
                            echo "<li>".$value."</li>";
                        }
                    ?>
                </ul>

                <button class="button-choose pure-button" onClick="location.reload()">Generar nuevo</button>
            </div>
        </div>
    </div> <!-- end pricing-tables -->

</div> <!-- end l-content -->

<div class="footer l-box">
    <p>
        <a href="https://www.linkedin.com/in/tirso/">Tirso Martínez Reyes</a> Universidad Internacional de la Rioja. <a href="https://cloud.google.com/solutions/modern-password-security-for-users.pdf" target="blank">Consulta el paper de Google sobre contraseñas seguras </a>
    </p>
</div>

</body>
</html>