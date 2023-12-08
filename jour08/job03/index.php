<?php

session_start();

// Traitement du formulaire
if (!empty($_POST['prenom'])) {
    $_SESSION['prenoms'][] = $_POST['prenom'];
} elseif (isset($_POST['reset'])) {
    $_SESSION['prenoms'] = array();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire PHP</title>
</head>

<body>

    <h2>Ajouter un prénom</h2>

    <form method="post">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
        <button type="submit">Ajouter</button>
    </form>

    <h2>Liste des prénoms</h2>
    <ul>
        <?php
        if (isset($_SESSION['prenoms'])) {
            foreach ($_SESSION['prenoms'] as $prenom) {
                echo "<li>$prenom</li>";
            }
        }
        ?>
    </ul>

    <form method="post">
        <button type="submit" name="reset">Réinitialiser</button>
    </form>

</body>

</html>