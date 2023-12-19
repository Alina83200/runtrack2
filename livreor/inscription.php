<?php

//var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* 
     * Récupération les données du formulaire (fr)
     * Form data recovery (en)
     * Собрать данные формуляра (ru)
     */
    $login = $_POST["login"];

    $password = $_POST["password"];

    /* 
     * Connexion à la base de données (fr)
     * Connection to the database (en)
     * Соединение с базой данных (ru)
     */
    $serveur = "localhost";
    $utilisateur = "root";
    $motDePasse = "";
    $baseDeDonnees = "livre_or";

    $conn = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué: " .

            $conn->connect_error);
    }

    /* 
     * Préparation de la requête d'insertion (fr)
     * Preparing the request for insertion (en)
     * Подготовка базы запросов на интеграцию (ru)
     */
    $sql = "INSERT INTO utilisateurs (`id`, `login`, `password`) VALUES (NULL, '$login', '$password')";
    var_dump($sql);

    /* 
     * Exécuter la requête (fr) 
     * Make a request (en)
     * Сделать запрос (ru)
     */
    if ($conn->query($sql) === TRUE) {

        header("Location: connexion.php");
        exit();
    } else {
        echo "Erreur lors de l'inscription: " . $conn->error;
    }

    /*
     * Fermeture de la connexion à la base de données (fr)
     * Closing the database connection (en)
     * Завершить соединение (ru)
     */
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,200&display=swap"
        rel="stylesheet">

</head>

<body>
    <div class="">
        <div class="">
            <div class="form-container">
                <h3>Créer un compte</h3>
                <!-- Formulaire d'inscription -->

                <form action="inscription.php" method="post" class="form-horizontal">
                    <div class="form-list">
                        <div class="form-group">

                            <input type="text" class="form-control" id="login" name="login" placeholder="Login*"
                                required>

                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password*" required>
                        </div>

                        <div>
                            <button type="submit" class="btn">M'inscrire</button>

                        </div>
                    </div>
                </form>
                <p>
                    <a href="./connexion.php" class="lien">Vos avez un compte</a>
                </p>
            </div>
        </div>
    </div>
</body>


</html>