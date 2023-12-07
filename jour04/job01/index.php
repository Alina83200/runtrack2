<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire GET</title>
</head>
<body>
    
<form action="" metod="GET">
 <label for="nom">Nom :</label>
  <input type="text" id="nom" name="nom"></br>

 <label for="prenom">Prenom :</label>
  <input type="text" id="prenom" name="prenom"></br>
    
 <label for="age">Age :</label>
  <input type="text" id ="age" name="age"></br>

  <input type="submit" value="Envoyer">
</form>

<?php
/*Développez un algorithme qui affiche le nombre d’arguments $_GET.
Tips :
Pour tester votre code, créez un formulaire html <form> de type GET avec différents
champs <input> de type “text” et un <input> de type “submit” pour l’envoi.
Vous pouvez ensuite afficher avec echo directement dans votre page par exemple :
“Le nombre d’argument GET envoyé est : “*/

$nombreArguments = 0;
foreach ($_GET as $value) { 
    if (isset($value)) {
        $nombreArguments++;
    }
}
echo "<br>Le nombre d’argument GET envoyé est : $nombreArguments ";
?>
</body>
</html>