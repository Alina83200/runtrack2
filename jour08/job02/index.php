<?php
/*
Créez un cookie nommé “nbvisites”. A chaque fois que la page est visitée, ajoutez 1.
Afficher le contenu du cookie.
Ajoutez un bouton nommé “reset” qui permet de réinitialiser ce compteur.
*/
$nbvisites = 1;

if (isset($_COOKIE['nbvisites'])) {
    $nbvisites = $_COOKIE['nbvisites'];
    $nbvisites++;
}

setcookie('nbvisites', $nbvisites, time() + 3600);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if (isset($_POST['reset'])) {
        setcookie('nbvisites', 0, time() + 3600);
        $nbvisites = 1;
    }
    echo "<h2>Compteur de Visitetes</h2>";
    echo "<p>Nombre de visites : $nbvisites</p>";

    echo "<form action='' method='POST'>";
    echo "<input type='submit' name='reset' value='reinitialiser'>";
    echo "</form>";

    ?>

</body>

</html>