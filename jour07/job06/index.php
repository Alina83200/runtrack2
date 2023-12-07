<?php
/*Créez une fonction nommée “leetSpeak($str)”. Cette fonction prend en paramètre une
chaîne de caractères nommée “$str”.
Elle doit retourner la chaîne de caractères “$str” convertie en leet speak. Cela signifie
qu’elle doit la modifier de sorte à ce que :
● les “A” deviennent des “4”,
● les “B” des “8”,
● les “E” des “3”,
● les “G” des “6”,
● les “L” des “1”,
● les “S” des “5”
● les “T” des “7”.
Cela est valable que l’on crie ou non (majuscules et minuscules). */
function leetSpeak($in)
{
    $out = "";
    for ($i = 0; isset($in[$i]); $i++) {
        if ($in[$i] == "A" or $in[$i] == "a") {
            $out = $out . "4";
        } elseif ($in[$i] == "B" or $in[$i] == "b") {
            $out = $out . "8";
        } elseif ($in[$i] == "E" or $in[$i] == "e") {
            $out = $out . "3";
        } elseif ($in[$i] == "G" or $in[$i] == "g") {
            $out = $out . "6";
        } elseif ($in[$i] == "L" or $in[$i] == "l") {
            $out = $out . "1";
        } elseif ($in[$i] == "S" or $in[$i] == "s") {
            $out = $out . "5";
        } elseif ($in[$i] == "T" or $in[$i] == "t") {
            $out = $out . "7";
        } else {
            $out = $out . $in[$i];
        }
    }
    return $out;
}

echo leetSpeak("Alina");

// 41in4
