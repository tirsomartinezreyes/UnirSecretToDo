<?php
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Noviembre 2021
*/
//Alfabeto compatible, utilizando función de cadenas para concatenar mayúsculas y minúsculas
define ("ALPHABET","abcdefghijklmnopqrtuvwxyz");
define("COMPATIBLE_DICTIONARY", ALPHABET . strtoupper(ALPHABET) . "0123456789");
define("STANDARD_DICTIONARY", "@#$%&!");
define("SAFE_DICTIONARY", "+-/*=^.:,;~/\|[]{}");

class SecurePasswordGenerator
{
    //Genera un password de tipo $type y de longitud $length, con valores por default
    public static function getPasswordByTypeAndLength($type = "COMPATIBLE", $length = 8)
    {
        $output = "";
        //iteramos hasta cumplir con la longitud deseada
        do {
            //validamos que el primer caracter sea siempre un caracter compatible
            if (strlen($output) == 0) {
                $output .= SecurePasswordGenerator::getRandomCharByType("COMPATIBLE");
            } else {
                //Obtenemos los siguientes caracteres de modo aleatorio para el tipo de password seleccionado
                $output .= SecurePasswordGenerator::getRandomCharByType($type);
            }
        } while (strlen($output) < $length);
        return $output;
    }


    //Genera un caracter aleatorio para un tipo de password $type generando un diccionario ad hoc para tratar de mantener una probabilidad equivalente entre todos los símbolos del alfabeto
    public static function getRandomCharByType($type = "COMPATIBLE")
    {
        $dictionary = "";
        //identificamos el caso del tipo de password requerido
        switch ($type) {
            case "COMPATIBLE":
                //Utilizamos el diccionario compatible
                $dictionary = COMPATIBLE_DICTIONARY;
                break;
            case "STANDARD":
                //utilizamos un diccionario compatible concatenando 5x el diccionario de caracteres para passwords estándar
                $dictionary = COMPATIBLE_DICTIONARY . str_repeat(STANDARD_DICTIONARY, 5);
                break;
            case "SAFE":
                //utilizamos un diccionario compatible concatenando 5x el diccionario de caracteres para passwords estándar y concatenando 2x el diccionario de caracteres para passwords seguros
                $dictionary = COMPATIBLE_DICTIONARY . str_repeat(STANDARD_DICTIONARY, 5) . str_repeat(SAFE_DICTIONARY, 2);
                break;
            default:
                $dictionary = COMPATIBLE_DICTIONARY;
        }

        //para maximizar la equivalencia de probabilidad de cada símbolo, se aleatorizan los caracteres en el diccionario 
        $dictionary = str_shuffle($dictionary);
        $randomChar = $dictionary[rand(0, strlen($dictionary) - 1)];
        return $randomChar;
    }
}
