<?php
/* Inclusion le fichier de configuration de la base de données et la gestion de la session (fr)
 * Включение управления файлами конфигурации базы данных и сеансами (ru)
 * Include database configuration file and session management (en)
 */
include_once('config.php');
/* Vérifieration si l'utilisateur est connecté(fr)
 * Проверка того, вошел ли пользователь в систему(ru)
 * Checking if the user is logged in (en)
 */
if (!isset($_SESSION['user_login'])) {
    header("Location: connexion.php");
    exit();
}

/* Traitement du formulaire d'ajout de commentaire (fr)
 * Обработка формы добавления комментария (ru)
 * Processing the Comment Form (en)
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commentaire = $_POST['commentaire'];
    $utilisateur = $_SESSION['user_login'];

    /* Requête SQL pour insérer le commentaire dans la base de données (fr)
     * SQL-запрос для вставки комментария в базу данных (ru)
     * SQL query to insert a comment into the database (en)
     */
    $sql = "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES ('$commentaire', " . $_SESSION['user_id'] . ", NOW())";
    $resultat = $conn->query($sql);

    /* Rediriger vers la page du livre d'or après l'ajout du commentaire (fr)
     * Перенаправление на страницу гостевой книги после добавления комментария (ru)
     * Redirect to the guestbook page after adding a comment (en)
     */
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
    <link rel="stylesheet" href="profil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,200&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="cont-flex2">
        <div class="container3">
            <div class="card-header">
                <div class="title">

                    <h1>Ajouter un commentaire</h1>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label for="commentaire">Commentaire :</label>
                        <textarea name="commentaire" id="commentaire" rows="4" cols="50" required></textarea><br>
                        <input type="submit" value="Valider">
                    </form>

                    <p><a href="livre-or.php">Retour au Livre d'or</a></p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>