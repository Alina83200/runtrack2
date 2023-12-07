<?php
/*
Créez une variable de type string nommée $str et affectez y le texte :
“Les choses que l'on possède finissent par nous posséder."
Créez un algorithme qui parcourt et écrit cette chaine à l’envers.
Ex. : redessop suon rap tnessinif edessop no'l euq sesohc seL
*/

$str = "Les choses que l'on possède finissent par nous posséder.";

$length = 0;
while (isset($str[$length])) {
    $length++;
}
for ($i = $length - 1; $i >= 0; $i--) {
    echo $str[$i];
}