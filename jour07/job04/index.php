<?php
/*Créez une fonction nommée “calcule()” qui prend 3 paramètres :
● le premier, “$a”, est un nombre,
● le deuxième, "$operation", est un caractère (string) contenant le type d’opération
(+, -, *, /, %),
● le troisième, “$b”, est un nombre.
La fonction doit retourner le résultat de l’opération. */

function calcule($a, $operation, $b)
{

    if ($operation == "+") {
        return $a + $b;
    } elseif ($operation == "-") {
        return $a - $b;
    } elseif ($operation == "*") {
        return $a * $b;
    } elseif ($operation == "/") {
        return $a / $b;
    } else {
        return $a % $b;
    }

}

// Tests

$plusOperation = calcule(15, "+", 5);
echo $plusOperation;
echo "<br/>";

$minusOperation = calcule(15, "-", 5);
echo $minusOperation;
echo "<br/>";

$multiplyOperation = calcule(15, "*", 5);
echo $multiplyOperation;
echo "<br/>";

$divisionOperation = calcule(15, "/", 5);
echo $divisionOperation;
echo "<br/>";

$percentOperation = calcule(15, "%", 5);
echo $percentOperation;
echo "<br/>";
