<?php
// Inclure le fichier de configuration de la base de données et la gestion de la session
include_once('config.php');

// Requête SQL pour récupérer les commentaires du plus récent au plus ancien
$sql = "SELECT * FROM commentaires ORDER BY date DESC";
$resultat = $connexion->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
</head>

<body>

    <h1>Livre d'or</h1>

    <?php
    // Afficher les commentaires
    while ($commentaire = $resultat->fetch_assoc()) {
        echo "<p>Posté le " . date('d/m/Y', strtotime($commentaire['date'])) . " par " . $commentaire['utilisateur'] . "<br>" . $commentaire['commentaire'] . "</p>";
    }

    // Afficher le lien vers la page d'ajout de commentaire si l'utilisateur est connecté
    if (isset($_SESSION['utilisateur'])) {
        echo '<p><a href="commentaire.php">Ajouter un commentaire</a></p>';
    }

    // Fermer la connexion à la base de données
    $connexion->close();
    ?>

</body>

</html>