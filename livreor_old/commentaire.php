<?php
// Inclure le fichier de configuration de la base de données et la gestion de la session
include('config.php');
include('session.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Traitement du formulaire d'ajout de commentaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commentaire = $_POST['commentaire'];
    $utilisateur = $_SESSION['utilisateur'];

    // Requête SQL pour insérer le commentaire dans la base de données
    $sql = "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES ('$commentaire', " . $_SESSION['id'] . ", NOW())";
    $resultat = $connexion->query($sql);

    // Rediriger vers la page du livre d'or après l'ajout du commentaire
    header("Location: livre-or.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un commentaire</title>
</head>

<body>

    <h1>Ajouter un commentaire</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" id="commentaire" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Valider">
    </form>

    <p><a href="livre-or.php">Retour au Livre d'or</a></p>

</body>

</html>