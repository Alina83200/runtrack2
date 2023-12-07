<?php
$str = "La Plateforme";
$str2 = "Vive";
$str3 = "!";
echo "$str2", "$str", "$str3";
$val = 6;
echo "$val<br/>";
$val = (6 + 4);
echo "$val<br/>";
$myBool = "true";
echo "$myBool<br/>";
$myBool = "false";
echo "$myBool<br/>";

/* Dans le dossier runtrack2/jour01/job02, créez un fichier index.php.
 Dans ce fichier, faites afficher deux fois “Hello LaPlateforme!”
 Commentez chacune de ces lignes d’une façon différente (une ligne, un bloc) */

$str4 = "La Plateforme";
$str5 = "La plateforme";//une ligne
echo "$str4<br/>", "$str5<br/>";

/* En PHP, il existe différents types de variables. Créez des variables de types primitifs
(boolean, entier, chaîne de caractères, nombre à virgule flottante) et affectez-y des
valeurs.
A l’aide de php, générer un tableau html qui contient dans son header trois colonnes
(type, nom, valeur) et dans son body, une ligne pour chacune des variables et de leurs
informations*/

$booleanVar = "true";
$integerVar = 50;
$stringVar = "Salut";
$floatVar = 0.25;

echo '<table border="1">
<thead>
    <tr>
        <th>type</th>
        <th>nom</th>
        <th>valeur</th>
    </tr>
</thead>
<tbody>
<tr>
    <td>$boolean</td>
    <td>booleanVar</td>
    <td>' . $booleanVar . '</td>
</tr>
<tr>
    <td>entier</td>
    <td>integerVar</td>
    <td>' . $integerVar . '</td>
</tr>
<tr>
    <td>chaîne de caractères</td>
    <td>stringVar</td>
    <td>' . $stringVar . '</td>
</tr>
<tr>
    <td>nombre à virgule flottante</td>
    <td>floatVar</td>
    <td>' . $floatVar .'</td>
</tr>
</tbody>
</table>';