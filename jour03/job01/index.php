<?php
/*Créez un tableau contenant les nombres 200, 204, 173, 98, 171, 404, 459.
Parcourez ce tableau et affichez pour chaque nombre “X est paire<br />” ou “X est
impaire<br />”, sur votre page index.php. X prenant tour à tour chacune des valeurs
comprises dans ce tableau.
*/

$numbers = [200, 204, 173, 98, 171, 404, 459];

foreach ($numbers as $element) {

    if($element % 2 == 0){ 
        echo $element . "est paire";  
    } 
    else{ 
        echo $element . "est impaire"; 
    } 
    echo "<br/>";
}




