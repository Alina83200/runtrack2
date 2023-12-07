<?php

/*Créez une variable de type string nommée $str et affectez y le texte :
“Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.”
Parcourir cette chaîne en affichant seulement un caractère sur deux.

Ex. : Tu e ntnssrn edsdn etmscmelslre osl li.
*/

$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";

$length = strlen($str);

for ($i = 0; $i < $length; $i += 2) {
    echo $str[$i];
}


