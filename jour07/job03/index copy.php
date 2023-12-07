<?php
/*Créez une fonction nommée “getHello()”.
Cette fonction doit retourner “Hello LaPlateforme!”.
Appelez cette fonction dans votre page en récupérant sa valeur de retour et affichez-la.*/

//function getHello()


function ranger($chambre)
{
    $chambre["etat"] = "ordre";
    return $chambre;
}

$cuisine = ["etat" => "désordre"];
$cuisine = ranger($cuisine);
echo $cuisine["etat"];

$chamabreACoucher = ["etat" => "désordre"];
$chamabreACoucher = ranger($chamabreACoucher);
echo $chamabreACoucher["etat"];

