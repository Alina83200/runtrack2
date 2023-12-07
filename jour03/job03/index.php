<?php
/*Créez une variable de type string nommée $str et affectez y le texte :
“I'm sorry Dave I'm afraid I can't do that”.
Créez un algorithme qui parcourt cette chaîne et affiche uniquement les voyelles.

Ex. : IoyaeIaaiIaoa
*/ 

$str = "I'm sorry Dave I'm afraid I can't do that";

for ($i = 0; $i < strlen($str); $i++) {
    $char = $str[$i];
    // Vérifier si le caractère est une voyelle
    if ($char == 'A' || $char == 'E' || $char == 'I' || $char == 'O' || $char == 'U'  || $char == 'a' || $char == 'e' || $char == 'i' || $char == 'o' || $char == 'u') {
        echo $str[$i];
    }
}