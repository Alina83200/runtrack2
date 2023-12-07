<?php 
//Declaration des variables
$booleanVar = true;
$integerVar = 42;
$stringVar = "Bonjour";
$floatVar = 3.14;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<?php //Generation du tableau HTML
echo'<table border="1">
 <thead>
  <tr>
   <th>Type</th>
   <th>Nom</th>
   <th>Valeur</th>
  </tr>
 </thead>
 <tbody>
  <tr>
   <td>booleén</td>
   <td>booleanVar</td>
   <td>'.$booleanVar.'</td>
  </tr>
  <tr>
   <td>entier</td>
   <td>integerVar</td>
   <td>'.$integerVar.'</td>
  </tr>
  <tr>
   <td>chaine de caracteres</td>
   <td>stringVar</td>
   <td>'.$stringVar.'</td>
  </tr>
  <tr>
   <td>nombre àvirgule flottante</td>
   <td>floatVar</td>
   <td>'.$floatVar.'</td>
 </tr>
</tbody>
</table>';
?>

</body>
</html>