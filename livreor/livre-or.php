<?php
/* Inclusion le fichier de configuration de la base de données et la gestion de la session (fr)
 * Включение управления файлами конфигурации базы данных и сеансами (ru)
 * Include database configuration file and session management (en)
 */
include_once('config.php');

/* Requête SQL pour récupérer les commentaires du plus récent au plus ancien (fr)
 * SQL-запрос для получения комментариев от новых к старым (ru)
 * SQL query to retrieve comments from newest to oldest (en)
 */
$sql = "SELECT commentaires.*, utilisateurs.login AS utilisateur 
        FROM commentaires 
        LEFT JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id
        ORDER BY commentaires.date DESC";
$resultat = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
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

                    <h1>Livre d'or</h1>

                    <?php
                    /* Demonstration les commentaires (en)
                     * Комментарии (ru)
                     * Comments (en)
                     */
                    while ($commentaire = $resultat->fetch_assoc()) {
                        echo "<p>Posté le " . date('d/m/Y', strtotime($commentaire['date'])) . " par " . $commentaire['utilisateur'] . "<br>" . $commentaire['commentaire'] . "</p>";
                    }

                    /* Afficheration le lien vers la page d'ajout de commentaire si l'utilisateur est connecté (fr)
                     * Отображение ссылки на страницу добавления комментария, если пользователь вошел в систему (ru)
                     * Display the link to the comment adding page if the user is logged in (en)
                     */
                    if (isset($_SESSION['utilisateur'])) {
                        echo '<p><a href="commentaire.php">Ajouter un commentaire</a></p>';
                    }

                    /* Vérifieration si l'utilisateur est connecté(fr)
                     * Проверка того, вошел ли пользователь в систему(ru)
                     * Checking if the user is logged in (en)
                    */
                    if (isset($_SESSION['user_login'])) {
                        echo "<br/>";
                        echo "<a href=\"./commentaire.php\">Rajouter un commentaire</a>";
                        echo "<br/>";
                    }

                    /* Fermeture la connexion à la base de données (fr)
                     * Закрытие соединения с базой данных (ru)
                     * Closing the database connection (en)
                     */
                    $conn->close();
                    ?>



                </div>
            </div>
        </div>
    </div>
</body>

</html>