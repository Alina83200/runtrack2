<form action="" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom"></br>
    <label for="prenom">Prenom :</label>
    <input type="text" id="prenom" name="prenom"></br>
    <input type="submit" value="Envoyer">
</form>

<?php
$nombrePostArguments = 0;
foreach ($_POST as $postElement) {
    if (isset($postElement)) {
        $nombrePostArguments++;
    }
}
// Afficher le message
echo 'Le nombre d\'arguments POST envoyé est : ' . $nombrePostArguments;
?>