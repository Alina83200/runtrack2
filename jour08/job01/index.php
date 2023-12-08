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
    Créez une variable de session nommée “nbvisites”. A chaque fois que la page est
    visitée, ajoutez 1. 
    Afficher le contenu de cette variable.
    Ajoutez un bouton nommé “reset” qui permet de réinitialiser ce compteur.*/

    session_start();

    $_SESSION['nbvisites'] = $_SESSION['nbvisites'] + 1;

    if (isset($_POST['reset'])) {
        $_SESSION['nbvisites'] = 0;
    }

    echo "<h2>Compteur de Visitetes</h2>";
    echo "<p>Nombre de visites : {$_SESSION['nbvisites']}</p>";
    echo "<form action='' method='POST'>";
    echo "<input type='submit' name='reset' value='reinitialiser'>";
    echo "</form>";
    ?>

</body>

</html>