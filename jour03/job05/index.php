<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
/*
Créez une variable de type string nommée $str et affectez y le texte :
“On n’est pas le meilleur quand on le croit mais quand on le sait”.
Créez un dictionnaire (tableau keys/values) nommé $dic qui a comme keys
“consonnes” et “voyelles”. Créez un algorithme qui parcourt, compte et stocke le
nombre d'occurrences de consonnes et de voyelles de $str.
Affichez ces résultats dans un tableau <table> html qui a comme <thead> “Voyelles” et
“Consonnes”.
*/

$str = "On n’est pas le meilleur quand on le croit mais quand on le sait.";

$dic = array(
    "consonnes" => 0,
    "voyelles" => 0
);

$str = strtolower($str);
$length = strlen($str);

for ($i = 0; isset($str[$i]); $i++) {
    $char = $str[$i];

    // Vérifier si le caractère est une voyelle ou une consonne
    if ($char == 'A' || $char == 'E' || $char == 'I' || $char == 'O' || $char == 'U' || $char == 'a' || $char == 'e' || $char == 'i' || $char == 'o' || $char == 'u') {
        $dic["voyelles"]++;
    } elseif (ctype_alpha($char)) {
        $dic["consonnes"]++;
    }
}

// un tableau HTML
echo "<table border='1'>
        <thead>
            <tr>
                <th>Voyelles</th>
                <th>Consonnes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{$dic['voyelles']}</td>
                <td>{$dic['consonnes']}</td>
            </tr>
        </tbody>
      </table>";
?>




</body>
</html>

